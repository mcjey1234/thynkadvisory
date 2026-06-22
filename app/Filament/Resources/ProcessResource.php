<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProcessResource\Pages;
use App\Models\Process;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProcessResource extends Resource
{
    protected static ?string $model = Process::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Processes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Process')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Content')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('step_number')
                                            ->label('Step Number')
                                            ->placeholder('01')
                                            ->maxLength(50)
                                            ->helperText('Example: 01, 02, 03'),
                                        Forms\Components\TextInput::make('title')
                                            ->required()
                                            ->maxLength(255)
                                            ->label('Step Title')
                                            ->placeholder('Discovery Phase'),
                                    ]),
                                Forms\Components\RichEditor::make('description')
                                    ->required()
                                    ->label('Description')
                                    ->placeholder('Describe this step in detail...')
                                    ->columnSpanFull()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'strike',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ]),
                            ]),
                        Forms\Components\Tabs\Tab::make('Icon & Image')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Forms\Components\TextInput::make('icon')
                                    ->label('Font Awesome Icon')
                                    ->placeholder('fas fa-search')
                                    ->helperText('Enter Font Awesome icon class (e.g., fas fa-search, fas fa-route)')
                                    ->maxLength(100)
                                    ->columnSpanFull(),
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->directory('processes')
                                    ->label('Step Image')
                                    ->imageResizeTargetWidth('800')
                                    ->imageResizeTargetHeight('600')
                                    ->helperText('Recommended: 800 x 600px. Will be displayed on the step card.')
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Settings')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Toggle::make('is_active')
                                            ->label('Show on Website')
                                            ->default(true)
                                            ->helperText('Toggle to show/hide this step'),
                                        Forms\Components\TextInput::make('display_order')
                                            ->numeric()
                                            ->label('Display Order')
                                            ->default(0)
                                            ->helperText('Lower numbers appear first'),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('step_number')
                    ->label('Step')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('success'),
                    
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->circular()
                    ->width(40)
                    ->height(40)
                    ->defaultImageUrl('https://ui-avatars.com/api/?name=Step&background=47C89F&color=fff'),
                    
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->label('Title')
                    ->weight('bold'),
                    
                // FIXED: Use TextColumn without icon() method
                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon')
                    ->searchable()
                    ->toggleable()
                    ->limit(20)
                    ->formatStateUsing(fn ($state) => $state ?: '—'),
                    
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('display_order')
                    ->numeric()
                    ->sortable()
                    ->label('Order'),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Created')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('display_order', 'asc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProcesses::route('/'),
            'create' => Pages\CreateProcess::route('/create'),
            'edit' => Pages\EditProcess::route('/{record}/edit'),
        ];
    }
}