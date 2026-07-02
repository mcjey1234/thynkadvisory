<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Models\Subscription;
use App\Mail\NewServiceNotification;
use App\Services\BufferService;  // ← Changed to BufferService
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Filament\Notifications\Notification;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;

    protected function afterCreate(): void
    {
        $service = $this->record;
        
        Log::info('=== 🔔 SERVICE CREATED FROM ADMIN ===');
        Log::info('Service ID: ' . $service->id);
        Log::info('Service Title: ' . $service->title);
        
        // Check if service is active
        if (!$service->is_active) {
            Log::info('Service is not active, skipping notifications');
            return;
        }
        
        // Send email notifications to subscribers
        $this->sendNotifications($service);
        
        // Auto-post to Buffer (LinkedIn + other platforms)
        $this->postToSocialMedia($service);
        
        // Show success notification
        Notification::make()
            ->title('Service Created!')
            ->body('Service created successfully. ' . 
                   ($service->linkedin_posted ? 'Posted to Social Media! ✅' : ''))
            ->success()
            ->send();
    }

    private function sendNotifications($service)
    {
        $subscribers = Subscription::where('status', 'active')->get();
        Log::info('Active subscribers: ' . $subscribers->count());
        
        if ($subscribers->isEmpty()) {
            Log::info('No subscribers to notify');
            return;
        }
        
        $sentCount = 0;
        foreach ($subscribers as $subscriber) {
            try {
                Mail::to($subscriber->email)->send(
                    new NewServiceNotification($service, 'created', $subscriber)
                );
                $sentCount++;
                Log::info('✅ Email sent to: ' . $subscriber->email);
            } catch (\Exception $e) {
                Log::error('❌ Failed to send to ' . $subscriber->email . ': ' . $e->getMessage());
            }
        }
        
        $service->notified_at = now();
        $service->save();
        
        Log::info('✅ Sent ' . $sentCount . ' emails for new service: ' . $service->title);
    }

    private function postToSocialMedia($service)
    {
        try {
            Log::info('=== 📤 AUTO-POSTING TO BUFFER ===');
            
            $buffer = new BufferService();
            
            // Use service ID for URL
            $serviceUrl = url('/services/detail/' . $service->id);
            
            // Buffer has character limits (LinkedIn: 3000, Twitter: 280)
            $message = "🚀 New Service at Sofel Labs!\n\n" .
                       "📌 " . $service->title . "\n" .
                       "💡 " . substr(strip_tags($service->description), 0, 150) . "...\n\n" .
                       "Learn more: " . $serviceUrl . "\n\n" .
                       "#SofelLabs #InstructionalDesign #Gamification #eLearning #AfricaTech";
            
            // Post to Buffer (will go to all connected social media accounts)
            $result = $buffer->post($message, $serviceUrl);
            
            if ($result) {
                $service->linkedin_posted = now();
                $service->save();
                Log::info('✅ Buffer auto-post successful for: ' . $service->title);
            } else {
                Log::error('❌ Buffer auto-post failed for: ' . $service->title);
            }
            
        } catch (\Exception $e) {
            Log::error('❌ Buffer auto-post error: ' . $e->getMessage());
        }
    }
}