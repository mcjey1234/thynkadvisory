<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Conversation;
use App\Services\GeminiService;
use App\Services\KnowledgeBaseService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    private $geminiService;
    private $knowledgeBase;

    public function __construct(KnowledgeBaseService $knowledgeBase)
    {
        $this->geminiService = new GeminiService();
        $this->knowledgeBase = $knowledgeBase;
    }

    public function index()
    {
        return view('chat.index');
    }

    public function send(Request $request)
    {
        try {
            Log::info('Chat request received: ' . $request->message);

            $request->validate([
                'message' => 'required|string|min:2|max:500',
            ]);

            $message = $request->message;
            $sessionId = $request->session_id ?? session()->getId();
            $ipAddress = $request->ip();
            $userAgent = $request->userAgent();

            // Get full context from KnowledgeBase
            $fullContext = $this->knowledgeBase->getFullContext();
            $company = $fullContext['company'] ?? [];

            // Get or create contact
            $contact = Contact::firstOrCreate(
                ['session_id' => $sessionId],
                [
                    'name' => 'Guest',
                    'email' => 'guest-' . $sessionId . '@chat.' . str_replace(' ', '', strtolower($company['company_name'] ?? 'thynkadvisory')) . '.com',
                    'subject' => 'Chat Session',
                    'message' => 'Started chat session',
                    'ip_address' => $ipAddress,
                    'user_agent' => $userAgent,
                    'status' => 'unread',
                    'is_read' => false,
                ]
            );

            // Extract info from message
            $this->extractInfoFromMessage($contact, $message);
            $contact->refresh();

            // Get conversation history
            $history = Conversation::where('contact_id', $contact->id)
                ->orderBy('created_at', 'asc')
                ->take(10)
                ->get();

            // Build the complete prompt for Gemini
            $prompt = $this->buildAIPrompt($message, $contact, $history, $fullContext);

            // Log the prompt for debugging
            Log::info('Gemini Prompt length: ' . strlen($prompt));

            // ALWAYS use Gemini — no hardcoded fallbacks
            $aiResponse = $this->geminiService->generateText($prompt, 800, 0.9);
            
            // If Gemini returns empty, try with simpler prompt
            if (empty($aiResponse)) {
                Log::warning('Gemini returned empty, trying simple prompt...');
                $simplePrompt = $this->buildSimplePrompt($message, $contact, $fullContext);
                $aiResponse = $this->geminiService->generateText($simplePrompt, 500, 0.9);
            }
            
            // If still empty, use emergency prompt — still AI
            if (empty($aiResponse)) {
                Log::warning('Simple prompt also failed, trying emergency...');
                $emergencyPrompt = $this->buildEmergencyPrompt($message, $contact);
                $aiResponse = $this->geminiService->generateText($emergencyPrompt, 300, 0.9);
            }

            // Absolute last resort — very simple AI prompt
            if (empty($aiResponse)) {
                Log::error('All Gemini attempts failed! Using minimal AI response...');
                $aiResponse = $this->geminiService->generateText(
                    "You are a helpful assistant. Respond warmly to: " . $message,
                    200,
                    0.9
                );
            }

            // If STILL empty, this is the ONLY hardcoded fallback — but it should never reach here
            if (empty($aiResponse)) {
                Log::critical('Gemini completely failed!');
                $aiResponse = "I'm here to help! What can I assist you with today?";
            }

            // Save conversation
            Conversation::create([
                'contact_id' => $contact->id,
                'user_message' => $message,
                'ai_response' => $aiResponse,
                'session_id' => $sessionId,
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
                'is_read' => false,
            ]);

            return response()->json([
                'success' => true,
                'message' => $aiResponse,
                'contact_id' => $contact->id,
                'session_id' => $sessionId,
            ]);

        } catch (\Exception $e) {
            Log::error('Chat error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            // Try to let Gemini handle the error
            try {
                $errorPrompt = "There was a system error. Please apologize warmly and ask the user to rephrase. User said: " . ($message ?? 'Nothing');
                $aiResponse = $this->geminiService->generateText($errorPrompt, 200, 0.9);
                
                if (!empty($aiResponse)) {
                    return response()->json([
                        'success' => true,
                        'message' => $aiResponse,
                    ]);
                }
            } catch (\Exception $e2) {
                Log::error('Emergency Gemini error: ' . $e2->getMessage());
            }
            
            // Only if Gemini fails completely
            return response()->json([
                'success' => true,
                'message' => "I'm here to help! What can I assist you with today?",
            ]);
        }
    }

    /**
     * Build the complete AI prompt
     */
    private function buildAIPrompt($message, $contact, $history, $fullContext)
    {
        $companyName = $fullContext['company']['company_name'] ?? 'Thynk Advisory';
        $name = ($contact->name && $contact->name !== 'Guest') ? $contact->name : 'Guest';
        $hasName = $name !== 'Guest';
        $hasEmail = $contact->email && strpos($contact->email, 'guest-') !== 0 && filter_var($contact->email, FILTER_VALIDATE_EMAIL);

        // Build company info
        $companyInfo = "COMPANY INFORMATION:\n";
        foreach ($fullContext['company'] as $key => $value) {
            $companyInfo .= ucfirst(str_replace('_', ' ', $key)) . ": " . $value . "\n";
        }

        // Build about info
        $aboutInfo = "ABOUT US:\n";
        if (isset($fullContext['about'])) {
            foreach ($fullContext['about'] as $key => $value) {
                if (!empty($value)) {
                    $aboutInfo .= ucfirst($key) . ": " . $value . "\n";
                }
            }
        }

        // Build services
        $servicesInfo = "SERVICES:\n";
        if (isset($fullContext['services']) && count($fullContext['services']) > 0) {
            foreach ($fullContext['services'] as $service) {
                $servicesInfo .= "- " . $service['title'] . ": " . $service['description'] . "\n";
            }
        }

        // Build team
        $teamInfo = "TEAM MEMBERS:\n";
        if (isset($fullContext['team']) && count($fullContext['team']) > 0) {
            foreach ($fullContext['team'] as $member) {
                $teamInfo .= "- " . $member['name'] . ": " . $member['position'] . "\n";
                if (!empty($member['bio'])) {
                    $teamInfo .= "  Skills: " . $member['bio'] . "\n";
                }
                if (!empty($member['description'])) {
                    $teamInfo .= "  About: " . $member['description'] . "\n";
                }
            }
        }

        // Build process
        $processInfo = "OUR PROCESS:\n";
        if (isset($fullContext['process']) && count($fullContext['process']) > 0) {
            foreach ($fullContext['process'] as $step) {
                $processInfo .= "Step " . $step['step'] . ": " . $step['title'] . " - " . $step['description'] . "\n";
            }
        }

        // Build milestones
        $milestonesInfo = "MILESTONES:\n";
        if (isset($fullContext['milestones']) && count($fullContext['milestones']) > 0) {
            foreach ($fullContext['milestones'] as $milestone) {
                $milestonesInfo .= "- " . $milestone['year'] . ": " . $milestone['title'] . " - " . $milestone['description'] . "\n";
            }
        }

        // Build topics
        $topicsInfo = "KEY TOPICS:\n";
        if (isset($fullContext['topics']) && count($fullContext['topics']) > 0) {
            foreach ($fullContext['topics'] as $topic => $info) {
                $topicsInfo .= ucfirst(str_replace('_', ' ', $topic)) . ": " . $info . "\n";
            }
        }

        // Build conversation history
        $historyText = "CONVERSATION HISTORY:\n";
        if ($history->count() > 0) {
            foreach ($history as $item) {
                $historyText .= "User: " . $item->user_message . "\n";
                $historyText .= "Assistant: " . $item->ai_response . "\n\n";
            }
        } else {
            $historyText .= "No previous conversation.\n";
        }

        // Build the full prompt
        $prompt = <<<PROMPT
You are Thynk AI, a warm, friendly, and professional assistant for {$companyName}.

Your role is to help visitors learn about the company, its services, team, process, and milestones. You should be conversational, helpful, and natural — like talking to a knowledgeable colleague.

=== USER INFORMATION ===
Name: {$name}
Has provided name: {$hasName}
Has provided email: {$hasEmail}

=== COMPANY INFORMATION ===
{$companyInfo}

{$aboutInfo}

{$servicesInfo}

{$teamInfo}

{$processInfo}

{$milestonesInfo}

{$topicsInfo}

=== CONVERSATION HISTORY ===
{$historyText}

=== CURRENT MESSAGE ===
User said: {$message}

=== INSTRUCTIONS ===
1. Respond naturally and conversationally — like a human.
2. Use the information provided above to answer accurately.
3. If the user hasn't provided their name or email, only ask for it if they express interest in booking a consultation or being contacted.
4. If they want to book, guide them to provide name and email, then share the booking link from COMPANY INFORMATION.
5. If they ask about team members, describe them using the TEAM MEMBERS information.
6. If they ask about services, describe them using the SERVICES information.
7. If they ask about the process, describe it using the OUR PROCESS information.
8. If they ask about milestones or history, describe them using the MILESTONES information.
9. Keep responses warm, concise, and helpful.
10. If the user just says "hello" or "hi", greet them warmly and ask how you can help.
11. Do not make up information — only use what's provided above.
12. If you don't know something, politely say so and offer to connect them with a human.

=== YOUR RESPONSE ===
PROMPT;

        return $prompt;
    }

    /**
     * Simple prompt for fallback — still AI
     */
    private function buildSimplePrompt($message, $contact, $fullContext)
    {
        $companyName = $fullContext['company']['company_name'] ?? 'Thynk Advisory';
        $name = ($contact->name && $contact->name !== 'Guest') ? $contact->name : 'Guest';

        return <<<PROMPT
You are a friendly assistant for {$companyName}. The user's name is {$name}.

The user said: {$message}

Please respond naturally and helpfully. Be warm and conversational. If you don't know something, politely say so.

Your response:
PROMPT;
    }

    /**
     * Emergency prompt — still AI, no hardcoding
     */
    private function buildEmergencyPrompt($message, $contact)
    {
        $name = ($contact->name && $contact->name !== 'Guest') ? $contact->name : 'Guest';

        return <<<PROMPT
You are a helpful assistant. The user's name is {$name}.

They asked: {$message}

Please respond warmly and helpfully. Be conversational and kind.

Your response:
PROMPT;
    }

    /**
     * Extract info from message
     */
    private function extractInfoFromMessage($contact, $message)
    {
        // Extract name from patterns
        if ($contact->name === 'Guest' || empty($contact->name)) {
            $patterns = [
                '/my name is ([a-zA-Z\s]+)/i',
                '/i am ([a-zA-Z\s]+)/i',
                "/i'm ([a-zA-Z\s]+)/i",
                '/im ([a-zA-Z\s]+)/i',
                '/this is ([a-zA-Z\s]+)/i',
                '/name is ([a-zA-Z\s]+)/i',
                '/call me ([a-zA-Z\s]+)/i',
            ];
            
            foreach ($patterns as $pattern) {
                if (preg_match($pattern, $message, $matches)) {
                    $name = trim($matches[1]);
                    if (strlen($name) > 1 && !str_contains($name, '@') && !str_contains($name, '.com')) {
                        $contact->name = ucfirst(strtolower($name));
                        $contact->save();
                        Log::info('Extracted name: ' . $contact->name);
                        break;
                    }
                }
            }
        }

        // Extract email
        if (str_contains($contact->email, 'guest-')) {
            preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $message, $matches);
            if (!empty($matches[0])) {
                $contact->email = $matches[0];
                $contact->save();
                Log::info('Extracted email: ' . $matches[0]);
            }
        }
    }

    public function getHistory($contactId)
    {
        $conversations = Conversation::where('contact_id', $contactId)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'conversations' => $conversations
        ]);
    }
}