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

            // Get or create contact
            $contact = Contact::firstOrCreate(
                ['session_id' => $sessionId],
                [
                    'name' => 'Guest',
                    'email' => 'guest-' . $sessionId . '@chat.sofellabs.com',
                    'subject' => 'Chat Session',
                    'message' => 'Started chat session',
                    'ip_address' => $ipAddress,
                    'user_agent' => $userAgent,
                    'status' => 'unread',
                    'is_read' => false,
                ]
            );

            // Try to extract info from message
            $this->extractInfoFromMessage($contact, $message);

            // Check if user has provided valid info
            $hasValidName = $contact->name && $contact->name !== 'Guest';
            $hasValidEmail = $contact->email && strpos($contact->email, 'guest-') !== 0 && filter_var($contact->email, FILTER_VALIDATE_EMAIL);

            // If user doesn't have valid info, prompt for missing info
            if (!$hasValidName || !$hasValidEmail) {
                $promptResponse = $this->promptForMissingInfo($contact);
                
                Conversation::create([
                    'contact_id' => $contact->id,
                    'user_message' => $message,
                    'ai_response' => $promptResponse,
                    'session_id' => $sessionId,
                    'ip_address' => $ipAddress,
                    'user_agent' => $userAgent,
                    'is_read' => false,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => $promptResponse,
                    'contact_id' => $contact->id,
                    'session_id' => $sessionId,
                    'needs_info' => true,
                ]);
            }

            // If user has valid info, proceed with normal chat
            $history = Conversation::where('contact_id', $contact->id)
                ->orderBy('created_at', 'asc')
                ->take(5)
                ->get();

            $fullContext = $this->knowledgeBase->getFullContext();
            $teamInfo = isset($fullContext['team']) ? $fullContext['team'] : array();
            $servicesInfo = isset($fullContext['services']) ? $fullContext['services'] : array();
            $aboutInfo = isset($fullContext['about']) ? $fullContext['about'] : array();

            $prompt = $this->buildFocusedPrompt($message, $contact, $history, $teamInfo, $servicesInfo, $aboutInfo);

            try {
                $aiResponse = $this->geminiService->generateText($prompt, 600, 0.8);
                
                if (empty($aiResponse)) {
                    throw new \Exception('Gemini returned empty response');
                }
            } catch (\Exception $e) {
                Log::error('Gemini error: ' . $e->getMessage());
                $aiResponse = $this->getFallbackResponse($message, $teamInfo, $servicesInfo);
            }

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
                'needs_info' => false,
            ]);

        } catch (\Exception $e) {
            Log::error('Chat error: ' . $e->getMessage());
            
            return response()->json([
                'success' => true,
                'message' => "I'm here to help. What can I assist you with today?",
            ]);
        }
    }

    /**
     * Prompt user for missing information - flexible and natural
     */
    private function promptForMissingInfo($contact)
    {
        $hasName = $contact->name && $contact->name !== 'Guest';
        $hasEmail = $contact->email && strpos($contact->email, 'guest-') !== 0;

        // If both are missing
        if (!$hasName && !$hasEmail) {
            return "Hi there! Could you please share your name and email address so I can assist you better?";
        }

        // If only name is missing
        if (!$hasName && $hasEmail) {
            return "Thanks for sharing your email! Could you please tell me your name?";
        }

        // If only email is missing
        if ($hasName && !$hasEmail) {
            return "Nice to meet you, " . $contact->name . "! Could you please share your email address?";
        }

        return "Thanks for providing your details! How can I help you today?";
    }

    private function buildFocusedPrompt($message, $contact, $history, $teamInfo, $servicesInfo, $aboutInfo)
    {
        $name = ($contact->name && $contact->name !== 'Guest') ? $contact->name : 'Guest';
        $hasName = $name !== 'Guest';
        $hasEmail = ($contact->email && strpos($contact->email, 'guest-') !== 0);

        // Build history
        $historyText = '';
        if ($history->count() > 0) {
            $historyText = "Previous conversation:\n";
            foreach ($history as $item) {
                $historyText .= "User: " . $item->user_message . "\n";
                $historyText .= "You: " . $item->ai_response . "\n\n";
            }
        }

        // Build team text
        $teamText = "TEAM MEMBERS:\n";
        foreach ($teamInfo as $member) {
            $teamText .= "- " . $member['name'] . ": " . $member['position'] . "\n";
            if (!empty($member['bio'])) {
                $teamText .= "  Bio: " . substr($member['bio'], 0, 150) . "...\n";
            }
        }

        // Build services text
        $servicesText = "SERVICES:\n";
        foreach ($servicesInfo as $service) {
            $servicesText .= "- " . $service['title'] . ": " . $service['description'] . "\n";
        }

        // Build about text
        $aboutText = "ABOUT SOFEL LABS:\n";
        $aboutText .= "Mission: " . (isset($aboutInfo['mission']) ? $aboutInfo['mission'] : 'N/A') . "\n";
        $aboutText .= "Vision: " . (isset($aboutInfo['vision']) ? $aboutInfo['vision'] : 'N/A') . "\n";

        $prompt = "You are Sofel AI, a friendly assistant for Sofel Labs.\n\n";
        $prompt .= $aboutText . "\n";
        $prompt .= $servicesText . "\n";
        $prompt .= $teamText . "\n";
        $prompt .= "User: " . $name . " (HasName: " . ($hasName ? 'Yes' : 'No') . ", HasEmail: " . ($hasEmail ? 'Yes' : 'No') . ")\n\n";
        $prompt .= $historyText;
        $prompt .= "User's question: " . $message . "\n\n";
        $prompt .= "Instructions:\n";
        $prompt .= "1. Answer based on the information above. Be warm and conversational.\n";
        $prompt .= "2. If asked about team members, give their names and roles from the TEAM MEMBERS section.\n";
        $prompt .= "3. If they ask about booking, provide this link: [Schedule your free consultation](https://cal.com/jared-ogutu-swvv6o)\n";
        $prompt .= "4. If they want a human agent, give them:\n";
        $prompt .= "   - Phone: +254 700 123 456\n";
        $prompt .= "   - Email: info@sofellabs.com\n";
        $prompt .= "   - Booking link: [Book a consultation](https://cal.com/jared-ogutu-swvv6o)\n";
        $prompt .= "   - Also offer to help with: services, gamification, compliance training, instructional design\n";
        $prompt .= "5. Keep responses under 200 words.\n\n";
        $prompt .= "Your response:";

        return $prompt;
    }

    private function getFallbackResponse($message, $teamInfo, $servicesInfo)
    {
        $message = strtolower($message);
        
        if (str_contains($message, 'team') || str_contains($message, 'member')) {
            $response = "We have an amazing team! Here are our key members:\n";
            $teamSlice = array_slice($teamInfo, 0, 5);
            foreach ($teamSlice as $member) {
                $response .= "- " . $member['name'] . ": " . $member['position'] . "\n";
            }
            return $response . "\nWould you like to know more about any specific team member?";
        }
        
        if (str_contains($message, 'service')) {
            $response = "We offer these services:\n";
            foreach ($servicesInfo as $service) {
                $response .= "- " . $service['title'] . ": " . $service['description'] . "\n";
            }
            return $response . "\nWhich service interests you most?";
        }
        
        if (str_contains($message, 'book') || str_contains($message, 'consultation')) {
            return "I'd love to help you book a consultation. You can schedule a meeting here:\n[Schedule your free consultation](https://cal.com/jared-ogutu-swvv6o)";
        }
        
        if (str_contains($message, 'human') || str_contains($message, 'agent') || str_contains($message, 'live person') || str_contains($message, 'talk to someone') || str_contains($message, 'person')) {
            return "I understand you'd like to connect with a human agent. I can certainly help you with that!\n\n" .
                   "You can reach our team directly using the contact information below:\n" .
                   "Phone: +254 700 123 456\n" .
                   "Email: info@sofellabs.com\n\n" .
                   "You can also schedule a meeting with our team here:\n" .
                   "[Book a consultation](https://cal.com/jared-ogutu-swvv6o)\n\n" .
                   "In the meantime, I'd be happy to help you with:\n" .
                   "• Information about our services\n" .
                   "• How gamification works\n" .
                   "• Compliance training solutions\n" .
                   "• Instructional design process\n" .
                   "• Or anything else about Sofel Labs\n\n" .
                   "What would you like to know?";
        }
        
        return "I'm here to help. What would you like to know about Sofel Labs? I can tell you about our team, services, or how we can help with instructional design and gamification.";
    }

    private function extractInfoFromMessage($contact, $message)
    {
        // First, check if this is a simple name (single word, no spaces, no @, no .com)
        $trimmedMessage = trim($message);
        $isSimpleName = (
            strlen($trimmedMessage) >= 2 && 
            strlen($trimmedMessage) <= 30 && 
            !str_contains($trimmedMessage, '@') && 
            !str_contains($trimmedMessage, '.com') &&
            !str_contains($trimmedMessage, '.') &&
            !str_contains($trimmedMessage, ' ') &&
            preg_match('/^[a-zA-Z]+$/', $trimmedMessage)
        );

        // Extract name - check if it's a simple name first
        if (($contact->name === 'Guest' || empty($contact->name)) && $isSimpleName) {
            $contact->name = ucfirst(strtolower($trimmedMessage));
            $contact->save();
            Log::info('Extracted simple name: ' . $contact->name);
        }

        // If it's not a simple name, try patterns
        if ($contact->name === 'Guest' || empty($contact->name)) {
            $patterns = array(
                '/my name is ([a-zA-Z\s]+)/i',
                '/i am ([a-zA-Z\s]+)/i',
                "/i'm ([a-zA-Z\s]+)/i",
                '/im ([a-zA-Z\s]+)/i',
                '/this is ([a-zA-Z\s]+)/i',
                '/name is ([a-zA-Z\s]+)/i',
                '/call me ([a-zA-Z\s]+)/i',
                '/my name ([a-zA-Z\s]+)/i',
            );
            
            foreach ($patterns as $pattern) {
                if (preg_match($pattern, $message, $matches)) {
                    $name = trim($matches[1]);
                    if (strlen($name) > 1 && !str_contains($name, '@') && !str_contains($name, '.com')) {
                        $contact->name = ucfirst(strtolower($name));
                        $contact->save();
                        Log::info('Extracted name from pattern: ' . $contact->name);
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

        return response()->json(array(
            'success' => true,
            'conversations' => $conversations
        ));
    }
}