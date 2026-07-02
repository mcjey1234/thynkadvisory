<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BufferService
{
    private $apiToken;
    private $apiUrl = 'https://api.bufferapp.com/1';

    public function __construct()
    {
        $this->apiToken = env('BUFFER_API_TOKEN');
    }

    /**
     * Get all connected social media accounts
     */
    public function getProfiles()
    {
        try {
            $response = Http::withQueryParameters([
                'access_token' => $this->apiToken
            ])->get($this->apiUrl . '/profiles.json');

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('❌ Failed to get Buffer profiles: ' . $response->body());
            return null;

        } catch (\Exception $e) {
            Log::error('❌ Buffer error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Post to social media via Buffer
     */
    public function post($message, $link = null, $imageUrl = null, $profiles = null)
    {
        try {
            Log::info('=== 📤 BUFFER POST START ===');
            
            if (empty($this->apiToken)) {
                Log::error('❌ Buffer API token is missing');
                return null;
            }

            // If no profiles specified, get all connected profiles
            if (empty($profiles)) {
                $profiles = $this->getProfiles();
                if (!$profiles) {
                    Log::error('❌ No Buffer profiles found');
                    return null;
                }
                $profileIds = collect($profiles)->pluck('id')->toArray();
            } else {
                $profileIds = is_array($profiles) ? $profiles : [$profiles];
            }

            // Build the post content
            $postData = [
                'text' => $message,
                'profile_ids' => $profileIds,
                'top' => true, // Add to top of queue
            ];

            if ($link) {
                $postData['media'] = [
                    [
                        'link' => $link
                    ]
                ];
            }

            if ($imageUrl) {
                $postData['media'] = [
                    [
                        'photo' => $imageUrl
                    ]
                ];
            }

            $response = Http::withQueryParameters([
                'access_token' => $this->apiToken
            ])->post($this->apiUrl . '/updates/create.json', $postData);

            Log::info('Response status: ' . $response->status());

            if ($response->successful()) {
                Log::info('✅ Posted to Buffer successfully');
                Log::info('Response: ' . $response->body());
                return $response->json();
            }

            Log::error('❌ Buffer post failed: ' . $response->body());
            return null;

        } catch (\Exception $e) {
            Log::error('❌ Buffer error: ' . $e->getMessage());
            Log::error('Trace: ' . $e->getTraceAsString());
            return null;
        }
    }

    /**
     * Post a service announcement
     */
    public function postService($service)
    {
        $serviceUrl = url('/services/detail/' . $service->id);
        
        // Buffer has character limits (LinkedIn: 3000, Twitter: 280)
        $message = "🚀 New Service at Sofel Labs!\n\n" .
                   "📌 " . $service->title . "\n" .
                   "💡 " . substr(strip_tags($service->description), 0, 150) . "...\n\n" .
                   "Learn more: " . $serviceUrl . "\n\n" .
                   "#SofelLabs #InstructionalDesign #Gamification #eLearning #AfricaTech";

        return $this->post($message, $serviceUrl);
    }

    /**
     * Create a scheduled post
     */
    public function schedulePost($message, $scheduledAt, $link = null, $profiles = null)
    {
        try {
            if (empty($profiles)) {
                $profiles = $this->getProfiles();
                if (!$profiles) {
                    return null;
                }
                $profileIds = collect($profiles)->pluck('id')->toArray();
            } else {
                $profileIds = is_array($profiles) ? $profiles : [$profiles];
            }

            $postData = [
                'text' => $message,
                'profile_ids' => $profileIds,
                'scheduled_at' => $scheduledAt, // ISO 8601 format
            ];

            if ($link) {
                $postData['media'] = [
                    [
                        'link' => $link
                    ]
                ];
            }

            $response = Http::withQueryParameters([
                'access_token' => $this->apiToken
            ])->post($this->apiUrl . '/updates/create.json', $postData);

            if ($response->successful()) {
                Log::info('✅ Scheduled post created successfully');
                return $response->json();
            }

            Log::error('❌ Failed to schedule post: ' . $response->body());
            return null;

        } catch (\Exception $e) {
            Log::error('❌ Buffer schedule error: ' . $e->getMessage());
            return null;
        }
    }
}