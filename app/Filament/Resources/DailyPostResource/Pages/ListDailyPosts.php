<?php

namespace App\Filament\Resources\DailyPostResource\Pages;

use App\Filament\Resources\DailyPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDailyPosts extends ListRecords
{
    protected static string $resource = DailyPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('New Daily Post')
                ->icon('heroicon-o-plus'),
        ];
    }
}
