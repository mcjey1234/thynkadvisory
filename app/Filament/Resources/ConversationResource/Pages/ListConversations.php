<?php

namespace App\Filament\Resources\ConversationResource\Pages;

use App\Filament\Resources\ConversationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConversations extends ListRecords
{
    protected static string $resource = ConversationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('mark_all_read')
                ->label('Mark All as Read')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->action(function () {
                    \App\Models\Conversation::where('is_read', false)->update(['is_read' => true]);
                    \Filament\Notifications\Notification::make()
                        ->title('All conversations marked as read')
                        ->success()
                        ->send();
                }),
        ];
    }
}
