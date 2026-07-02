<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BufferService
{
    private $clientId;
    private $clientSecret;
    private $accessToken;
    private $apiUrl = 'https://api.bufferapp.com/1';

    public function __construct()
    {
        $this->clientId = env('BUFFER_CLIENT_ID');
        $this->clientSecret = env('BUFFER_CLIENT_SECRET');
        $this->accessToken = env('BUFFER_ACCESS_TOKEN');
    }

    /**
     * Exchange authorization code for access token
     */
    public function getAccessToken($code)
    {
        try {
            $response = Http::asForm()->post('https://api.bufferapp.com/1/oauth2/token.json', [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'code' => $code,
                'grant_type' => 'authorization_code',
                'redirect_uri' => env('BUFFER_REDIRECT_URI', 'https://sofellabs.com/buffer/callback')
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $this->accessToken = $data['access_token'];
                Log::info('✅ Buffer access token obtained successfully');
                return $data;
            }

            Log::error('❌ Buffer token error: ' . $response->body());
            return null;

        } catch (\Exception $e) {
            Log::error('❌ Buffer token error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Refresh access token
     */
    public function refreshAccessToken($refreshToken)
    {
        try {
            $response = Http::asForm()->post('https://api.bufferapp.com/1/oauth2/token.json', [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'refresh_token' => $refreshToken,
                'grant_type' => 'refresh_token'
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $this->accessToken = $data['access_token'];
                Log::info('✅ Buffer token refreshed successfully');
                return $data;
            }

            Log::error('❌ Buffer refresh error: ' . $response->body());
            return null;

        } catch (\Exception $e) {
            Log::error('❌ Buffer refresh error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get connected profiles
     */
    public function getProfiles()
    {
        try {
            if (empty($this->accessToken)) {
                Log::error('❌ Buffer access token is missing');
                return null;
            }

            $response = Http::withQueryParameters([
                'access_token' => $this->accessToken
            ])->get($this->apiUrl . '/profiles.json');

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('❌ Buffer profiles error: ' . $response->body());
            return null;

        } catch (\Exception $e) {
            Log::error('❌ Buffer error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Post to Buffer
     */
    public function post($message, $link = null, $imageUrl = null, $profiles = null)
    {
        try {
            Log::info('=== 📤 BUFFER POST ===');
            
            if (empty($this->accessToken)) {
                Log::error('❌ Buffer access token is missing');
                return null;
            }

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

            $postData = [
                'text' => $message,
                'profile_ids' => $profileIds,
                'top' => true,
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
                'access_token' => $this->accessToken
            ])->post($this->apiUrl . '/updates/create.json', $postData);

            if ($response->successful()) {
                Log::info('✅ Buffer post successful');
                return $response->json();
            }

            Log::error('❌ Buffer post failed: ' . $response->body());
            return null;

        } catch (\Exception $e) {
            Log::error('❌ Buffer error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get authorization URL for OAuth flow
     */
    public function getAuthorizationUrl()
    {
        $params = http_build_query([
            'client_id' => $this->clientId,
            'redirect_uri' => env('BUFFER_REDIRECT_URI', 'https://sofellabs.com/buffer/callback'),
            'response_type' => 'code',
            'state' => 'buffer_auth'
        ]);

        return 'https://api.bufferapp.com/1/oauth2/authorize.json?' . $params;
    }
}