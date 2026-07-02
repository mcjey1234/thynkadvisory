<?php

namespace App\Filament\Resources\ConversationResource\Pages;

use App\Filament\Resources\ConversationResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewConversation extends ViewRecord
{
    protected static string $resource = ConversationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('mark_read')
                ->label('Mark as Read')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->visible(fn () => !$this->record->is_read)
                ->action(function () {
                    $this->record->update(['is_read' => true]);
                    $this->refresh();
                }),
            Actions\Action::make('mark_unread')
                ->label('Mark as Unread')
                ->icon('heroicon-o-x-circle')
                ->color('warning')
                ->visible(fn () => $this->record->is_read)
                ->action(function () {
                    $this->record->update(['is_read' => false]);
                    $this->refresh();
                }),
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Auto mark as read when viewed
        if (!$this->record->is_read) {
            $this->record->update(['is_read' => true]);
        }
        return $data;
    }
}
