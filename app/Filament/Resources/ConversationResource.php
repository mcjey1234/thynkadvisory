<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConversationResource\Pages;
use App\Models\Conversation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;

class ConversationResource extends Resource
{
    protected static ?string $model = Conversation::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 6;
    protected static ?string $navigationLabel = 'AI Conversations';
    protected static ?string $pluralLabel = 'AI Conversations';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Conversation Details')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('contact.name')
                                    ->disabled()
                                    ->label('Contact Name'),
                                Forms\Components\TextInput::make('contact.email')
                                    ->disabled()
                                    ->label('Email'),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('contact.phone')
                                    ->disabled()
                                    ->label('Phone'),
                                Forms\Components\TextInput::make('contact.subject')
                                    ->disabled()
                                    ->label('Subject'),
                            ]),
                        Forms\Components\Textarea::make('user_message')
                            ->disabled()
                            ->label('User Message')
                            ->rows(3)
                            ->extraAttributes(['class' => 'bg-gray-50 p-3 rounded-lg']),
                        Forms\Components\Textarea::make('ai_response')
                            ->disabled()
                            ->label('AI Response')
                            ->rows(4)
                            ->extraAttributes(['class' => 'bg-gray-50 p-3 rounded-lg border-l-4 border-green-500']),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('is_read')
                                    ->disabled()
                                    ->label('Read Status')
                                    ->options([
                                        '0' => 'Unread',
                                        '1' => 'Read',
                                    ])
                                    ->formatStateUsing(fn ($state) => $state ? 'Read' : 'Unread'),
                                Forms\Components\TextInput::make('created_at')
                                    ->disabled()
                                    ->label('Created At')
                                    ->formatStateUsing(function ($state) {
                                        if (empty($state)) {
                                            return 'N/A';
                                        }
                                        try {
                                            return Carbon::parse($state)->format('M d, Y h:i A');
                                        } catch (\Exception $e) {
                                            return $state;
                                        }
                                    }),
                            ]),
                        Forms\Components\TextInput::make('session_id')
                            ->disabled()
                            ->label('Session ID')
                            ->columnSpanFull(),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('ip_address')
                                    ->disabled()
                                    ->label('IP Address'),
                                Forms\Components\TextInput::make('user_agent')
                                    ->disabled()
                                    ->label('User Agent'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('contact.name')
                    ->searchable()
                    ->sortable()
                    ->label('Contact')
                    ->weight('bold')
                    ->html()
                    ->formatStateUsing(function ($state, $record) {
                        if (!$record->contact) {
                            return $state ?? 'Guest';
                        }

                        $unreadCount = Conversation::where('contact_id', $record->contact_id)
                            ->where('is_read', false)
                            ->count();

                        $badge = $unreadCount > 0
                            ? ' <span style="background:#EF4444;color:white;padding:2px 10px;border-radius:10px;font-size:10px;margin-left:6px;">' . $unreadCount . ' new</span>'
                            : '';

                        return ($state ?? 'Guest') . $badge;
                    }),
                Tables\Columns\TextColumn::make('contact.email')
                    ->searchable()
                    ->sortable()
                    ->label('Email')
                    ->icon('heroicon-o-envelope')
                    ->formatStateUsing(fn ($state, $record) => $record->contact?->email ?? 'N/A'),
                Tables\Columns\TextColumn::make('contact.phone')
                    ->searchable()
                    ->sortable()
                    ->label('Phone')
                    ->toggleable()
                    ->formatStateUsing(fn ($state, $record) => $record->contact?->phone ?? 'N/A'),
                Tables\Columns\TextColumn::make('message_count')
                    ->label('Messages')
                    ->getStateUsing(function ($record) {
                        return Conversation::where('contact_id', $record->contact_id)->count();
                    })
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('last_message')
                    ->label('Last Message')
                    ->limit(40)
                    ->getStateUsing(function ($record) {
                        $last = Conversation::where('contact_id', $record->contact_id)
                            ->latest()
                            ->first();
                        return $last ? $last->user_message : 'No messages';
                    }),
                Tables\Columns\IconColumn::make('has_unread')
                    ->label('Unread')
                    ->boolean()
                    ->getStateUsing(function ($record) {
                        return Conversation::where('contact_id', $record->contact_id)
                            ->where('is_read', false)
                            ->exists();
                    })
                    ->trueIcon('heroicon-o-exclamation-circle')
                    ->falseIcon('heroicon-o-check-circle')
                    ->trueColor('danger')
                    ->falseColor('success'),
                Tables\Columns\TextColumn::make('last_activity')
                    ->label('Last Activity')
                    ->getStateUsing(function ($record) {
                        $last = Conversation::where('contact_id', $record->contact_id)
                            ->latest()
                            ->first();
                        return $last ? $last->created_at->diffForHumans() : 'N/A';
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y h:i A')
                    ->sortable()
                    ->label('First Contact')
                    ->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('has_unread')
                    ->label('Has Unread')
                    ->placeholder('All')
                    ->trueLabel('Has Unread')
                    ->falseLabel('All Read')
                    ->queries(
                        true: fn (Builder $query) => $query->whereHas('contact', function ($q) {
                            $q->whereHas('conversations', function ($sub) {
                                $sub->where('is_read', false);
                            });
                        }),
                        false: fn (Builder $query) => $query->whereHas('contact', function ($q) {
                            $q->whereHas('conversations', function ($sub) {
                                $sub->where('is_read', true);
                            });
                        }),
                        blank: fn (Builder $query) => $query,
                    ),
                Tables\Filters\SelectFilter::make('contact')
                    ->relationship('contact', 'name')
                    ->label('Contact'),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('from')
                            ->label('From Date'),
                        Forms\Components\DatePicker::make('to')
                            ->label('To Date'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn ($q) => $q->whereDate('created_at', '>=', $data['from']))
                            ->when($data['to'], fn ($q) => $q->whereDate('created_at', '<=', $data['to']));
                    }),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('view_chat')
                        ->label('View Chat History')
                        ->icon('heroicon-o-chat-bubble-left-right')
                        ->color('info')
                        ->modalHeading(fn ($record) => 'Chat History: ' . ($record->contact->name ?? 'Guest'))
                        ->modalContent(function ($record) {
                            $conversations = Conversation::where('contact_id', $record->contact_id)
                                ->orderBy('created_at', 'asc')
                                ->get();
                            
                            return view('filament.resources.conversation-resource.components.chat-modal', [
                                'conversations' => $conversations,
                                'contact' => $record->contact,
                            ]);
                        })
                        ->modalSubmitAction(false)
                        ->modalCancelActionLabel('Close')
                        ->modalWidth('4xl'),
                    Tables\Actions\Action::make('mark_all_read')
                        ->label('Mark All as Read')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->visible(fn ($record) => Conversation::where('contact_id', $record->contact_id)->where('is_read', false)->exists())
                        ->action(function ($record) {
                            Conversation::where('contact_id', $record->contact_id)->update(['is_read' => true]);
                            Notification::make()
                                ->title('All conversations marked as read')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\Action::make('delete_all')
                        ->label('Delete All Conversations')
                        ->color('danger')
                        ->icon('heroicon-o-trash')
                        ->requiresConfirmation()
                        ->action(function ($record) {
                            Conversation::where('contact_id', $record->contact_id)->delete();
                            Notification::make()
                                ->title('All conversations deleted')
                                ->success()
                                ->send();
                        }),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('mark_all_read_bulk')
                        ->label('Mark All as Read')
                        ->icon('heroicon-o-check-circle')
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                Conversation::where('contact_id', $record->contact_id)->update(['is_read' => true]);
                            }
                            Notification::make()
                                ->title('All conversations marked as read')
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
            'index' => Pages\ListConversations::route('/'),
            'view' => Pages\ViewConversation::route('/{record}'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        try {
            return Conversation::where('is_read', false)->count();
        } catch (\Exception $e) {
            return '0';
        }
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }
}
