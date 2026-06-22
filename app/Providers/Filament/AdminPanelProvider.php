<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            // 1. Brand Color Palette Overrides (Teal / Lime / Orange)
            ->colors([
                'primary' => Color::hex('#47C89F'),   // Teal Green — main brand color
                'success' => Color::hex('#9ACA43'),   // Lime Green — used for success states
                'warning' => Color::hex('#EE6F20'),   // Orange — used for warnings / accents
                'gray' => Color::Zinc,
            ])
            ->font('Inter')
            // 2. Dual-Branding Logo Engine (Auto-Toggles on Theme Switch)
            ->brandLogo(fn () => view('filament.admin.logo', ['mode' => 'light']))
            ->darkModeBrandLogo(fn () => view('filament.admin.logo', ['mode' => 'dark']))
            ->brandLogoHeight('3.5rem')
            ->favicon(asset('favicon.ico'))
            // 3. Structural Classic Layout Engine
            ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('20rem')          // Increased to 20rem to give your text plenty of room!
            ->darkMode(true)
            ->navigationGroups([
                'Header Management',
                'Navigation Management',
                'Content Management',
                'Footer Management',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}