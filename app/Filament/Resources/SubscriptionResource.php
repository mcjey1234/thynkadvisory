<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriptionResource\Pages;
use App\Models\Subscription;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class SubscriptionResource extends Resource
{
    protected static ?string $model = Subscription::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 7;
    protected static ?string $navigationLabel = 'Subscriptions';
    protected static ?string $pluralLabel = 'Subscriptions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Subscription Details')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('email')
                                    ->required()
                                    ->email()
                                    ->maxLength(255)
                                    ->disabled()
                                    ->label('Email Address'),
                                Forms\Components\TextInput::make('name')
                                    ->maxLength(255)
                                    ->label('Name'),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'active' => 'Active',
                                        'unsubscribed' => 'Unsubscribed',
                                    ])
                                    ->required()
                                    ->label('Status'),
                                Forms\Components\TextInput::make('source')
                                    ->maxLength(50)
                                    ->label('Source'),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('ip_address')
                                    ->disabled()
                                    ->label('IP Address'),
                                Forms\Components\TextInput::make('user_agent')
                                    ->disabled()
                                    ->label('User Agent'),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DateTimePicker::make('subscribed_at')
                                    ->disabled()
                                    ->label('Subscribed At'),
                                Forms\Components\DateTimePicker::make('unsubscribed_at')
                                    ->disabled()
                                    ->label('Unsubscribed At'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->label('Email')
                    ->weight('bold')
                    ->icon('heroicon-o-envelope'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Name'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'active',
                        'danger' => 'unsubscribed',
                    ])
                    ->label('Status')
                    ->sortable(),
                Tables\Columns\TextColumn::make('source')
                    ->sortable()
                    ->label('Source')
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('subscribed_at')
                    ->dateTime('M d, Y h:i A')
                    ->sortable()
                    ->label('Subscribed'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y h:i A')
                    ->sortable()
                    ->label('Created')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'unsubscribed' => 'Unsubscribed',
                    ])
                    ->label('Status'),
                Tables\Filters\SelectFilter::make('source')
                    ->options([
                        'website' => 'Website',
                        'chat' => 'Chat',
                        'contact' => 'Contact Form',
                    ])
                    ->label('Source'),
                Tables\Filters\Filter::make('subscribed_at')
                    ->form([
                        Forms\Components\DatePicker::make('from')
                            ->label('From Date'),
                        Forms\Components\DatePicker::make('to')
                            ->label('To Date'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn ($q) => $q->whereDate('subscribed_at', '>=', $data['from']))
                            ->when($data['to'], fn ($q) => $q->whereDate('subscribed_at', '<=', $data['to']));
                    }),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->label('View')
                        ->icon('heroicon-o-eye'),
                    Tables\Actions\Action::make('unsubscribe')
                        ->label('Unsubscribe')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->visible(fn ($record) => $record->status === 'active')
                        ->action(function ($record) {
                            $record->unsubscribe();
                            Notification::make()
                                ->title('User Unsubscribed')
                                ->body('The user has been unsubscribed successfully.')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\Action::make('reactivate')
                        ->label('Reactivate')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->visible(fn ($record) => $record->status === 'unsubscribed')
                        ->action(function ($record) {
                            $record->reactivate();
                            Notification::make()
                                ->title('User Reactivated')
                                ->body('The user has been reactivated successfully.')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('unsubscribe_bulk')
                        ->label('Unsubscribe Selected')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(function ($records) {
                            $count = $records->where('status', 'active')->count();
                            $records->each->unsubscribe();
                            Notification::make()
                                ->title($count . ' users unsubscribed')
                                ->success()
                                ->send();
                        }),
                ]),
            ])
            ->recordUrl(null)
            ->poll('30s');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscriptions::route('/'),
            'view' => Pages\ViewSubscription::route('/{record}'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        try {
            return static::getModel()::where('status', 'active')->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'success';
    }
}