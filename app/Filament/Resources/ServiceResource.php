<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use App\Models\Subscription;
use App\Mail\NewServiceNotification;
use App\Services\BufferService;  // ← Changed to BufferService
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Filament\Notifications\Notification;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Navigation Management';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Services (What We Do)';
    protected static ?string $pluralLabel = 'Services';
    protected static ?string $label = 'Service';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('Service Title')
                    ->placeholder('Enter service title...'),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->label('Description')
                    ->placeholder('Enter detailed description...')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('icon')
                    ->label('Icon (Font Awesome)')
                    ->placeholder('fa-android')
                    ->helperText('Example: fa-android, fa-apple, fa-laptop-code')
                    ->maxLength(100),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('services')
                    ->label('Image'),
                Forms\Components\Toggle::make('is_active')
                    ->label('Show on Website')
                    ->default(true),
                Forms\Components\TextInput::make('display_order')
                    ->numeric()
                    ->label('Display Order')
                    ->default(0)
                    ->helperText('Lower number appears first'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('display_order')
                    ->numeric()
                    ->sortable()
                    ->label('#'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->label('Service'),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->circular(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
                Tables\Columns\TextColumn::make('linkedin_posted')
                    ->dateTime()
                    ->sortable()
                    ->label('Social Media Posted')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('notified_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Notified')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Created'),
            ])
            ->defaultSort('display_order', 'asc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
                Tables\Filters\TernaryFilter::make('notified_at')
                    ->label('Notified')
                    ->placeholder('All')
                    ->trueLabel('Notified')
                    ->falseLabel('Pending'),
                Tables\Filters\TernaryFilter::make('linkedin_posted')
                    ->label('Social Media Posted')
                    ->placeholder('All')
                    ->trueLabel('Posted')
                    ->falseLabel('Not Posted'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('send_notification')
                    ->label('Send Notification')
                    ->icon('heroicon-o-envelope')
                    ->color('success')
                    ->action(function ($record) {
                        self::sendNotificationToSubscribers($record, 'manual');
                        Notification::make()
                            ->title('Notification Sent')
                            ->body('Emails sent to all subscribers about this service.')
                            ->success()
                            ->send();
                    })
                    ->visible(fn ($record) => $record->is_active && $record->notified_at === null),
                Tables\Actions\Action::make('post_to_buffer')
                    ->label('Post to Social Media')
                    ->icon('heroicon-o-share')
                    ->color('info')
                    ->action(function ($record) {
                        $result = self::postToBuffer($record);
                        if ($result) {
                            Notification::make()
                                ->title('Posted to Social Media!')
                                ->body('Service posted to Buffer successfully.')
                                ->success()
                                ->send();
                        } else {
                            Notification::make()
                                ->title('Failed to Post')
                                ->body('Check logs for details.')
                                ->danger()
                                ->send();
                        }
                    })
                    ->visible(fn ($record) => $record->is_active && $record->linkedin_posted === null),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('send_notifications')
                        ->label('Send Notifications')
                        ->icon('heroicon-o-envelope')
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                if ($record->is_active && $record->notified_at === null) {
                                    self::sendNotificationToSubscribers($record, 'bulk');
                                }
                            }
                            Notification::make()
                                ->title('Notifications Sent')
                                ->body('Emails sent to subscribers about selected services.')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\BulkAction::make('post_to_buffer_bulk')
                        ->label('Post All to Social Media')
                        ->icon('heroicon-o-share')
                        ->color('info')
                        ->action(function ($records) {
                            $posted = 0;
                            foreach ($records as $record) {
                                if ($record->is_active && $record->linkedin_posted === null) {
                                    if (self::postToBuffer($record)) {
                                        $posted++;
                                    }
                                }
                            }
                            Notification::make()
                                ->title($posted . ' services posted to Social Media!')
                                ->success()
                                ->send();
                        }),
                ]),
            ]);
    }

    /**
     * Post service to Buffer
     */
    public static function postToBuffer($service)
    {
        try {
            Log::info('=== 📤 POSTING TO BUFFER: ' . $service->title . ' ===');
            
            $buffer = new BufferService();
            $serviceUrl = url('/services/detail/' . $service->id);
            
            $message = "🚀 New Service at Sofel Labs!\n\n" .
                       "📌 " . $service->title . "\n" .
                       "💡 " . substr(strip_tags($service->description), 0, 150) . "...\n\n" .
                       "Learn more: " . $serviceUrl . "\n\n" .
                       "#SofelLabs #InstructionalDesign #Gamification #eLearning #AfricaTech";
            
            $result = $buffer->post($message, $serviceUrl);
            
            if ($result) {
                $service->linkedin_posted = now();
                $service->save();
                Log::info('✅ Buffer post successful for: ' . $service->title);
                return true;
            }
            
            Log::error('❌ Buffer post failed for: ' . $service->title);
            return false;
            
        } catch (\Exception $e) {
            Log::error('❌ Buffer post error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send notification to subscribers
     */
    public static function sendNotificationToSubscribers($service, $action = 'created')
    {
        Log::info('=== 📧 SENDING NOTIFICATIONS FOR: ' . $service->title . ' ===');
        
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
                    new NewServiceNotification($service, $action, $subscriber)
                );
                $sentCount++;
                Log::info('✅ Email sent to: ' . $subscriber->email);
            } catch (\Exception $e) {
                Log::error('❌ Failed to send to ' . $subscriber->email . ': ' . $e->getMessage());
            }
        }
        
        $service->notified_at = now();
        $service->save();
        
        Log::info('✅ Sent ' . $sentCount . ' emails for service: ' . $service->title);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}