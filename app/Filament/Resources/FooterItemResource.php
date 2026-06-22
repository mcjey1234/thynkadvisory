<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterItemResource\Pages;
use App\Models\FooterItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FooterItemResource extends Resource
{
    protected static ?string $model = FooterItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    protected static ?string $navigationGroup = 'Footer Management';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Footer Items';
    protected static ?string $pluralLabel = 'Footer Items';
    protected static ?string $label = 'Footer Item';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Footer Item')
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->required()
                            ->options([
                                'menu' => 'Menu Link',
                                'social' => 'Social Media',
                                'copyright' => 'Copyright Text',
                            ])
                            ->label('Item Type')
                            ->helperText('Select what type of footer item this is')
                            ->live()
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                // Clear fields based on type
                                if ($state === 'copyright') {
                                    $set('url', null);
                                    $set('icon', null);
                                    $set('platform', null);
                                }
                            }),
                        // Menu fields
                        Forms\Components\TextInput::make('label')
                            ->maxLength(255)
                            ->label('Label')
                            ->placeholder('Home, About, Services...')
                            ->helperText('The text users will see'),
                        Forms\Components\TextInput::make('url')
                            ->maxLength(255)
                            ->label('URL')
                            ->placeholder('/about')
                            ->helperText('URL path (e.g., /about, /services)')
                            ->visible(fn (Forms\Get $get) => $get('type') !== 'copyright'),
                        // Social fields
                        Forms\Components\TextInput::make('icon')
                            ->maxLength(100)
                            ->label('Icon (Font Awesome)')
                            ->placeholder('fa-facebook, fa-twitter...')
                            ->helperText('Font Awesome icon class')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'social'),
                        Forms\Components\TextInput::make('platform')
                            ->maxLength(50)
                            ->label('Platform')
                            ->placeholder('Facebook, Twitter, Instagram...')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'social'),
                        // Copyright fields
                        Forms\Components\Textarea::make('content')
                            ->label('Copyright Text')
                            ->placeholder('© 2026 Sofel Labs. All rights reserved.')
                            ->helperText('The copyright text that appears at the bottom')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'copyright'),
                        // Common fields
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                        Forms\Components\TextInput::make('display_order')
                            ->numeric()
                            ->label('Display Order')
                            ->default(0)
                            ->helperText('Lower number appears first'),
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
                    ->width(50)
                    ->toggleable(),
                Tables\Columns\BadgeColumn::make('type')
                    ->label('Type')
                    ->colors([
                        'primary' => 'menu',
                        'success' => 'social',
                        'warning' => 'copyright',
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('label')
                    ->searchable()
                    ->sortable()
                    ->label('Label/Content')
                    ->formatStateUsing(function ($record) {
                        if ($record->type === 'copyright') {
                            return substr($record->content, 0, 50) . '...';
                        }
                        return $record->label;
                    }),
                Tables\Columns\TextColumn::make('url')
                    ->searchable()
                    ->label('URL')
                    ->color('blue')
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('platform')
                    ->label('Platform')
                    ->toggleable()
                    ->color('gray'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Created')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('type', 'asc')
            ->defaultSort('display_order', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'menu' => 'Menu',
                        'social' => 'Social Media',
                        'copyright' => 'Copyright',
                    ])
                    ->label('Item Type'),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status')
                    ->placeholder('All'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('toggleActive')
                        ->label('Toggle Active')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function (FooterItem $record) {
                            $record->update(['is_active' => !$record->is_active]);
                        })
                        ->visible(fn (FooterItem $record) => true),
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
                        }),
                    Tables\Actions\BulkAction::make('deactivate')
                        ->label('Deactivate Selected')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(function ($records) {
                            $records->each->update(['is_active' => false]);
                        }),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFooterItems::route('/'),
            'create' => Pages\CreateFooterItem::route('/create'),
            'edit' => Pages\EditFooterItem::route('/{record}/edit'),
        ];
    }
}