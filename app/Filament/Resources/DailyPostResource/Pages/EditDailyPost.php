<?php

namespace App\Filament\Resources\DailyPostResource\Pages;

use App\Filament\Resources\DailyPostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDailyPost extends EditRecord
{
    protected static string $resource = DailyPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
