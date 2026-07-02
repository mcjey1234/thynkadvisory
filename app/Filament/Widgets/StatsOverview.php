<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\Service;
use App\Models\Process;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Services', Service::count())
                ->description('Active services')
                ->descriptionIcon('heroicon-m-cog-6-tooth')
                ->color('primary'),
            Stat::make('Process Steps', Process::count())
                ->description('Active process steps')
                ->descriptionIcon('heroicon-m-arrow-path')
                ->color('success'),
            Stat::make('Messages', Contact::count())
                ->description(Contact::where('is_read', false)->count() . ' unread')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('warning'),
        ];
    }
}