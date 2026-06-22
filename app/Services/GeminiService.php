<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    private $apiKey;
    private $model;
    private $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
        $this->model = env('GEMINI_MODEL', 'gemini-2.5-flash'); // Updated
        $this->apiUrl = "https://generativelanguage.googleapis.com/v1beta/models/{$this->model}:generateContent";
    }

    public function generateText($prompt, $maxTokens = 500, $temperature = 0.7)
    {
        try {
            $response = Http::timeout(30)->post($this->apiUrl . '?key=' . $this->apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => $temperature,
                    'maxOutputTokens' => $maxTokens,
                    'topP' => 0.95,
                    'topK' => 64,
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                    return $data['candidates'][0]['content']['parts'][0]['text'];
                }
                
                Log::error('Gemini response missing text: ' . json_encode($data));
                return null;
            }

            Log::error('Gemini API error: ' . $response->status() . ' - ' . $response->body());
            return null;

        } catch (\Exception $e) {
            Log::error('Gemini exception: ' . $e->getMessage());
            return null;
        }
    }

    public function testConnection()
    {
        try {
            $response = Http::timeout(10)->post($this->apiUrl . '?key=' . $this->apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => 'Say "Hello! Gemini is working."']
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.1,
                    'maxOutputTokens' => 50,
                    'topK' => 64,
                ]
            ]);

            return $response->successful();
        } catch (\Exception $e) {
            Log::error('Test connection failed: ' . $e->getMessage());
            return false;
        }
    }
}