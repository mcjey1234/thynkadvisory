<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Models\Subscription;
use App\Mail\NewServiceNotification;
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
        
        // Send notifications
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
        
        // Mark as notified
        $service->notified_at = now();
        $service->save();
        
        Log::info('✅ Sent ' . $sentCount . ' emails for new service: ' . $service->title);
        
        // Show success notification in admin
        if ($sentCount > 0) {
            Notification::make()
                ->title('Service Created & Notifications Sent!')
                ->body($sentCount . ' subscribers have been notified about this service.')
                ->success()
                ->send();
        }
    }
}
