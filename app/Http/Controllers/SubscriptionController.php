<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    /**
     * Store a new subscription
     */
    public function subscribe(Request $request)
    {
        try {
            Log::info('Subscription request received: ' . $request->email);

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:255',
                'name' => 'nullable|string|max:255',
                'source' => 'nullable|string|max:50',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $email = $request->email;
            $name = $request->name ?? null;
            $source = $request->source ?? 'website';

            // Check if already subscribed
            $existing = Subscription::where('email', $email)->first();

            if ($existing) {
                if ($existing->status === 'active') {
                    return response()->json([
                        'success' => false,
                        'message' => 'You are already subscribed!',
                        'already_subscribed' => true
                    ], 409);
                } else {
                    // Reactivate subscription
                    $existing->reactivate();
                    $existing->source = $source;
                    $existing->save();

                    Log::info('Subscription reactivated: ' . $email);

                    return response()->json([
                        'success' => true,
                        'message' => 'Welcome back! You have been resubscribed.',
                        'reactivated' => true
                    ]);
                }
            }

            // Create new subscription
            $subscription = Subscription::create([
                'email' => $email,
                'name' => $name,
                'source' => $source,
                'status' => 'active',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'subscribed_at' => now(),
            ]);

            Log::info('New subscription created: ' . $email);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing! You\'ll receive our latest updates.',
                'subscription_id' => $subscription->id
            ]);

        } catch (\Exception $e) {
            Log::error('Subscription error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show unsubscribe page
     */
    public function unsubscribePage(Request $request)
    {
        $email = $request->email;
        $subscription = Subscription::where('email', $email)->first();
        
        return view('subscriptions.unsubscribe', compact('email', 'subscription'));
    }

    /**
     * Process unsubscribe - Redirects to home with message
     */
    public function unsubscribe(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->route('home')
                    ->with('error', 'Invalid email address.');
            }

            $email = $request->email;
            $subscription = Subscription::where('email', $email)->first();

            if (!$subscription) {
                return redirect()->route('home')
                    ->with('error', 'Email not found in our subscription list.');
            }

            $subscription->unsubscribe();

            Log::info('User unsubscribed: ' . $email);

            // Redirect to home with success message
            return redirect()->route('home')
                ->with('success', 'You have been unsubscribed successfully from Sofel Labs updates.');

        } catch (\Exception $e) {
            Log::error('Unsubscribe error: ' . $e->getMessage());
            return redirect()->route('home')
                ->with('error', 'Something went wrong. Please try again.');
        }
    }

    /**
     * Get subscription status (API)
     */
    public function checkStatus(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $subscription = Subscription::where('email', $request->email)->first();

            return response()->json([
                'success' => true,
                'subscribed' => $subscription && $subscription->status === 'active',
                'subscription' => $subscription
            ]);

        } catch (\Exception $e) {
            Log::error('Check status error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong.'
            ], 500);
        }
    }
}
