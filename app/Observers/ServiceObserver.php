<?php

namespace App\Observers;

use App\Models\Service;
use App\Models\Subscription;
use App\Mail\NewServiceNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ServiceObserver
{
    public function created(Service $service): void
    {
        Log::info('=== 🔔 OBSERVER CREATED METHOD CALLED ===');
        Log::info('Service ID: ' . $service->id);
        Log::info('Service Title: ' . $service->title);
        
        // Check if service is active
        if (!$service->is_active) {
            Log::info('Service is not active, skipping notifications');
            return;
        }
        
        // Check for subscribers
        $subscribers = Subscription::where('status', 'active')->get();
        Log::info('Active subscribers found: ' . $subscribers->count());
        
        if ($subscribers->isEmpty()) {
            Log::info('No subscribers to notify');
            return;
        }
        
        // Send emails
        foreach ($subscribers as $subscriber) {
            try {
                Log::info('Sending email to: ' . $subscriber->email);
                Mail::to($subscriber->email)->send(
                    new NewServiceNotification($service, 'created', $subscriber)
                );
                Log::info('✅ Email sent to: ' . $subscriber->email);
            } catch (\Exception $e) {
                Log::error('❌ Failed to send to ' . $subscriber->email . ': ' . $e->getMessage());
            }
        }
    }

    public function updated(Service $service): void
    {
        Log::info('=== 🔔 OBSERVER UPDATED METHOD CALLED ===');
        Log::info('Service ID: ' . $service->id);
        
        $dirty = $service->getDirty();
        Log::info('Changed fields: ' . json_encode($dirty));
        
        if (isset($dirty['title']) || isset($dirty['description']) || isset($dirty['is_active'])) {
            Log::info('Important fields changed - sending notifications');
            // Check for subscribers and send emails...
            $subscribers = Subscription::where('status', 'active')->get();
            foreach ($subscribers as $subscriber) {
                try {
                    Mail::to($subscriber->email)->send(
                        new NewServiceNotification($service, 'updated', $subscriber)
                    );
                    Log::info('✅ Update email sent to: ' . $subscriber->email);
                } catch (\Exception $e) {
                    Log::error('❌ Failed to send update email: ' . $e->getMessage());
                }
            }
        }
    }
}
