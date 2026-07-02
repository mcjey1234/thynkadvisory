<?php

namespace App\Filament\Resources\DailyPostResource\Pages;

use App\Filament\Resources\DailyPostResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDailyPost extends CreateRecord
{
    protected static string $resource = DailyPostResource::class;

    protected function afterCreate(): void
    {
        // Auto-post to social media if published
        if ($this->record->is_published && !$this->record->scheduled_at) {
            // Your Buffer posting logic here
        }
    }
}
