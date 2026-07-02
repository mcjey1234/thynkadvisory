<?php

namespace App\Filament\Resources\ScormProjectResource\Pages;

use App\Filament\Resources\ScormProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScormProject extends EditRecord
{
    protected static string $resource = ScormProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
