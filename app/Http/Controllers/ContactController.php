<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AutoReplyMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use App\Services\GeminiService;

class ContactController extends BaseController
{
    public function index()
    {
        return view('contact.index');
    }

    public function submit(Request $request)
    {
        Log::info('Contact form submitted', $request->all());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        try {
            // 1. Save to database
            $contact = Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'status' => 'unread',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            Log::info('Contact saved', ['contact_id' => $contact->id]);

            // 2. Generate AI Reply using Gemini
            $aiReply = $this->generateGeminiReply($validated);

            // 3. Send auto-reply to user
            $this->sendAutoReply($validated, $aiReply);

            // 4. Notify admin
            $this->notifyAdmin($validated);

            return redirect()->route('contact')
                ->with('success', 'Thank you for your message! We have sent an automated response to your email.');

        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage());
            
            return redirect()->route('contact')
                ->with('error', 'Sorry, there was a problem. Please try again later.');
        }
    }

    private function generateGeminiReply($data)
    {
        try {
            $gemini = new GeminiService();
            
            $prompt = "You are a professional customer service representative for Sofel Labs, an instructional design and gamification company.\n\n" .
                       "Reply to this customer inquiry:\n" .
                       "Name: {$data['name']}\n" .
                       "Subject: {$data['subject']}\n" .
                       "Message: {$data['message']}\n\n" .
                       "Instructions:\n" .
                       "- Be warm, professional, and helpful\n" .
                       "- Acknowledge their specific question\n" .
                       "- Offer a free consultation\n" .
                       "- Keep it concise (2-3 paragraphs)\n" .
                       "- Do not use markdown or special formatting";

            $response = $gemini->generateText($prompt);

            if ($response) {
                Log::info('Gemini AI reply generated successfully');
                return $response;
            } else {
                return $this->getFallbackReply($data['name']);
            }

        } catch (\Exception $e) {
            Log::error('Gemini AI error: ' . $e->getMessage());
            return $this->getFallbackReply($data['name']);
        }
    }

    private function getFallbackReply($name)
    {
        return "Thank you for your message, {$name}. We've received your inquiry and our team will review it shortly. We'll get back to you within 24 hours with a detailed response.\n\nBest regards,\nSofel Labs Team";
    }

    private function sendAutoReply($data, $aiReply)
{
    try {
        Mail::to($data['email'])->send(new AutoReplyMail(
            $data['name'], 
            $data['email'],    // ADD THIS
            $aiReply,
            'website'          // ADD THIS
        ));
        Log::info('Auto-reply sent to: ' . $data['email']);
    } catch (\Exception $e) {
        Log::error('Auto-reply failed: ' . $e->getMessage());
    }
}

    private function notifyAdmin($data)
    {
        try {
            Mail::send([], [], function ($message) use ($data) {
                $message->to('mcjey103@gmail.com')
                        ->subject('New Contact Form: ' . $data['subject'])
                        ->html("
                            <h2>New Contact Form Submission</h2>
                            <p><strong>Name:</strong> {$data['name']}</p>
                            <p><strong>Email:</strong> {$data['email']}</p>
                            <p><strong>Phone:</strong> " . ($data['phone'] ?? 'N/A') . "</p>
                            <p><strong>Subject:</strong> {$data['subject']}</p>
                            <p><strong>Message:</strong><br>" . nl2br($data['message']) . "</p>
                            <hr>
                            <p><a href='" . url('/admin/contacts') . "'>View in Admin Panel</a></p>
                        ");
            });
        } catch (\Exception $e) {
            Log::error('Admin notification failed: ' . $e->getMessage());
        }
    }
}