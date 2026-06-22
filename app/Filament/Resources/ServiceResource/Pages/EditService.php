<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Models\Subscription;
use App\Mail\NewServiceNotification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Filament\Notifications\Notification;

class EditService extends EditRecord
{
    protected static string $resource = ServiceResource::class;

    protected function afterSave(): void
    {
        $service = $this->record;
        
        // Check if important fields changed
        $dirty = $service->getDirty();
        if (isset($dirty['title']) || isset($dirty['description']) || isset($dirty['is_active'])) {
            Log::info('=== 🔔 SERVICE UPDATED FROM ADMIN ===');
            Log::info('Service ID: ' . $service->id);
            Log::info('Service Title: ' . $service->title);
            Log::info('Changed fields: ' . json_encode($dirty));
            
            // Only send if service is active and not already notified
            if ($service->is_active && $service->notified_at === null) {
                $subscribers = Subscription::where('status', 'active')->get();
                Log::info('Active subscribers: ' . $subscribers->count());
                
                if (!$subscribers->isEmpty()) {
                    $sentCount = 0;
                    foreach ($subscribers as $subscriber) {
                        try {
                            Mail::to($subscriber->email)->send(
                                new NewServiceNotification($service, 'updated', $subscriber)
                            );
                            $sentCount++;
                            Log::info('✅ Update email sent to: ' . $subscriber->email);
                        } catch (\Exception $e) {
                            Log::error('❌ Failed to send to ' . $subscriber->email . ': ' . $e->getMessage());
                        }
                    }
                    
                    // Mark as notified
                    $service->notified_at = now();
                    $service->save();
                    
                    Log::info('✅ Sent ' . $sentCount . ' update emails for service: ' . $service->title);
                    
                    if ($sentCount > 0) {
                        Notification::make()
                            ->title('Service Updated & Notifications Sent!')
                            ->body($sentCount . ' subscribers have been notified about the update.')
                            ->success()
                            ->send();
                    }
                }
            }
        }
    }
}
