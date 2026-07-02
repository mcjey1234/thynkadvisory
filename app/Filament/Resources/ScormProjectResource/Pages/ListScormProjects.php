<?php

namespace App\Filament\Resources\ScormProjectResource\Pages;

use App\Filament\Resources\ScormProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListScormProjects extends ListRecords
{
    protected static string $resource = ScormProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('New SCORM Project')
                ->icon('heroicon-o-plus'),
        ];
    }
}
