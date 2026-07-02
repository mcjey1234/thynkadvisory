<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3';
    protected static ?string $navigationGroup = 'Header Management';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Menus';
    protected static ?string $pluralLabel = 'Menus';
    protected static ?string $label = 'Menu';
    protected static ?string $recordTitleAttribute = 'label';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Menu')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('General')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->maxLength(255)
                                            ->label('Menu Name (Slug)')
                                            ->placeholder('Enter menu name')
                                            ->helperText('Used as identifier. Example: about, services')
                                            ->unique(ignoreRecord: true)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                                $set('name', Str::slug($state));
                                            }),
                                        Forms\Components\TextInput::make('label')
                                            ->required()
                                            ->maxLength(255)
                                            ->label('Display Label')
                                            ->placeholder('Enter display text')
                                            ->helperText('What users will see. Example: About Us'),
                                    ]),
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('url')
                                            ->maxLength(255)
                                            ->label('URL')
                                            ->placeholder('/about or https://example.com')
                                            ->helperText('Leave empty for dropdown menus with children'),
                                        Forms\Components\TextInput::make('icon')
                                            ->maxLength(100)
                                            ->label('Icon')
                                            ->placeholder('fas fa-home')
                                            ->helperText('Font Awesome icon. Example: fas fa-home, fas fa-user'),
                                    ]),
                            ]),
                        Forms\Components\Tabs\Tab::make('Structure')
                            ->icon('heroicon-o-folder')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Select::make('parent_id')
                                            ->label('Parent Menu')
                                            ->options(function () {
                                                return Menu::where('parent_id', 0)
                                                    ->where('position', 'header')
                                                    ->pluck('label', 'id')
                                                    ->toArray();
                                            })
                                            ->default(0)
                                            ->helperText('Select parent menu to create a submenu'),
                                        Forms\Components\Select::make('menu_type')
                                            ->options([
                                                'main' => 'Main Menu',
                                                'sub' => 'Sub Menu',
                                                'footer' => 'Footer Menu',
                                            ])
                                            ->default('main')
                                            ->label('Menu Type')
                                            ->required()
                                            ->helperText('How this menu item is categorized'),
                                    ]),
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Select::make('position')
                                            ->options([
                                                'header' => 'Header',
                                                'footer' => 'Footer',
                                                'sidebar' => 'Sidebar',
                                            ])
                                            ->default('header')
                                            ->label('Display Position')
                                            ->required()
                                            ->helperText('Where this menu appears on the site'),
                                        Forms\Components\Select::make('target')
                                            ->options([
                                                '_self' => 'Same Window',
                                                '_blank' => 'New Window',
                                            ])
                                            ->default('_self')
                                            ->label('Link Target')
                                            ->helperText('How the link opens'),
                                    ]),
                            ]),
                        Forms\Components\Tabs\Tab::make('Settings')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Toggle::make('is_active')
                                            ->label('Active')
                                            ->default(true)
                                            ->helperText('Inactive menus won\'t appear on the site'),
                                        Forms\Components\TextInput::make('display_order')
                                            ->numeric()
                                            ->label('Display Order')
                                            ->default(0)
                                            ->helperText('Lower numbers appear first'),
                                    ]),
                                Forms\Components\Grid::make(1)
                                    ->schema([
                                        Forms\Components\Placeholder::make('preview')
                                            ->label('Preview')
                                            ->content(function ($record) {
                                                if ($record && $record->url) {
                                                    return '<a href="' . url($record->url) . '" target="_blank" style="color: #6366f1;">View Menu URL →</a>';
                                                }
                                                return 'No URL set';
                                            }),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('display_order')
                    ->numeric()
                    ->sortable()
                    ->label('#')
                    ->toggleable()
                    ->width(50),
                Tables\Columns\TextColumn::make('label')
                    ->searchable()
                    ->sortable()
                    ->label('Label')
                    ->weight('bold')
                    ->html()
                    ->formatStateUsing(function ($state, $record) {
                        $prefix = '';
                        if ($record->parent_id > 0) {
                            $prefix = '└─ ';
                        }
                        return $prefix . $state;
                    }),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Slug')
                    ->color('gray')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable()
                    ->label('URL')
                    ->color('blue')
                    ->toggleable()
                    ->limit(30)
                    ->html()
                    ->formatStateUsing(function ($state) {
                        if ($state) {
                            return '<span style="color: #6366f1;">' . $state . '</span>';
                        }
                        return '<span style="color: #9ca3af;">No URL</span>';
                    }),
                Tables\Columns\TextColumn::make('parent.label')
                    ->label('Parent')
                    ->sortable()
                    ->toggleable()
                    ->color('gray')
                    ->formatStateUsing(function ($state) {
                        return $state ?: 'Root';
                    }),
                Tables\Columns\BadgeColumn::make('menu_type')
                    ->label('Type')
                    ->colors([
                        'primary' => 'main',
                        'success' => 'sub',
                        'warning' => 'footer',
                    ])
                    ->formatStateUsing(function ($state) {
                        return ucfirst($state);
                    })
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\BadgeColumn::make('position')
                    ->label('Position')
                    ->colors([
                        'primary' => 'header',
                        'success' => 'footer',
                        'warning' => 'sidebar',
                    ])
                    ->formatStateUsing(function ($state) {
                        return ucfirst($state);
                    })
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('children_count')
                    ->label('Children')
                    ->counts('children')
                    ->badge()
                    ->color('primary')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Created')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('display_order', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('menu_type')
                    ->options([
                        'main' => 'Main',
                        'sub' => 'Sub',
                        'footer' => 'Footer',
                    ])
                    ->label('Menu Type'),
                Tables\Filters\SelectFilter::make('position')
                    ->options([
                        'header' => 'Header',
                        'footer' => 'Footer',
                        'sidebar' => 'Sidebar',
                    ])
                    ->label('Position'),
                Tables\Filters\SelectFilter::make('parent_id')
                    ->options(function () {
                        return Menu::where('parent_id', 0)
                            ->pluck('label', 'id')
                            ->toArray();
                    })
                    ->label('Parent Menu'),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status')
                    ->placeholder('All')
                    ->trueLabel('Active')
                    ->falseLabel('Inactive'),
                Tables\Filters\SelectFilter::make('has_children')
                    ->label('Has Children')
                    ->options([
                        'yes' => 'Has Children',
                        'no' => 'No Children',
                    ])
                    ->query(function ($query, $data) {
                        if ($data['value'] === 'yes') {
                            return $query->has('children');
                        } elseif ($data['value'] === 'no') {
                            return $query->doesntHave('children');
                        }
                        return $query;
                    }),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('toggleActive')
                        ->label('Toggle Active')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function (Menu $record) {
                            $record->update(['is_active' => !$record->is_active]);
                            Filament\Notifications\Notification::make()
                                ->title('Menu ' . ($record->is_active ? 'Activated' : 'Deactivated'))
                                ->success()
                                ->send();
                        })
                        ->visible(fn (Menu $record) => true),
                    Tables\Actions\Action::make('duplicate')
                        ->label('Duplicate')
                        ->icon('heroicon-o-document-duplicate')
                        ->color('gray')
                        ->action(function (Menu $record) {
                            $newMenu = $record->replicate();
                            $newMenu->name = $record->name . '-copy';
                            $newMenu->label = $record->label . ' (Copy)';
                            $newMenu->display_order = $record->display_order + 1;
                            $newMenu->save();
                            Filament\Notifications\Notification::make()
                                ->title('Menu Duplicated Successfully')
                                ->success()
                                ->send();
                        }),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('activate')
                        ->label('Activate Selected')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function ($records) {
                            $records->each->update(['is_active' => true]);
                            Filament\Notifications\Notification::make()
                                ->title('Menus Activated')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\BulkAction::make('deactivate')
                        ->label('Deactivate Selected')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(function ($records) {
                            $records->each->update(['is_active' => false]);
                            Filament\Notifications\Notification::make()
                                ->title('Menus Deactivated')
                                ->warning()
                                ->send();
                        }),
                    Tables\Actions\BulkAction::make('moveToHeader')
                        ->label('Move to Header')
                        ->icon('heroicon-o-arrow-up')
                        ->action(function ($records) {
                            $records->each->update(['position' => 'header']);
                            Filament\Notifications\Notification::make()
                                ->title('Menus Moved to Header')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\BulkAction::make('moveToFooter')
                        ->label('Move to Footer')
                        ->icon('heroicon-o-arrow-down')
                        ->action(function ($records) {
                            $records->each->update(['position' => 'footer']);
                            Filament\Notifications\Notification::make()
                                ->title('Menus Moved to Footer')
                                ->success()
                                ->send();
                        }),
                ]),
            ])
            ->recordUrl(null);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}