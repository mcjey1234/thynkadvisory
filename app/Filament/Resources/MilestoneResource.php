<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MilestoneResource\Pages;
use App\Models\Milestone;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MilestoneResource extends Resource
{
    protected static ?string $model = Milestone::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationGroup = 'Navigation Management';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Milestones';
    protected static ?string $pluralLabel = 'Milestones';
    protected static ?string $label = 'Milestone';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Milestone Information')
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('year')
                                    ->required()
                                    ->maxLength(10)
                                    ->label('Year')
                                    ->placeholder('2024'),
                                Forms\Components\TextInput::make('month')
                                    ->maxLength(20)
                                    ->label('Month')
                                    ->placeholder('January'),
                                Forms\Components\TextInput::make('day')
                                    ->maxLength(10)
                                    ->label('Day')
                                    ->placeholder('15'),
                            ]),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('Title')
                            ->placeholder('Company Founded'),
                        Forms\Components\RichEditor::make('description')
                            ->label('Description')
                            ->placeholder('Describe this milestone...')
                            ->columnSpanFull(),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('icon')
                                    ->maxLength(100)
                                    ->label('Icon')
                                    ->placeholder('fa-rocket')
                                    ->helperText('Font Awesome icon class'),
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->directory('milestones')
                                    ->label('Image'),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true),
                                Forms\Components\TextInput::make('display_order')
                                    ->numeric()
                                    ->label('Display Order')
                                    ->default(0)
                                    ->helperText('Lower number appears first'),
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
                    ->width(50),
                Tables\Columns\TextColumn::make('year')
                    ->sortable()
                    ->label('Year')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('month')
                    ->label('Month')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('day')
                    ->label('Day')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->label('Title'),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->circular()
                    ->width(40)
                    ->height(40),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active')
                    ->sortable(),
            ])
            ->defaultSort('display_order', 'asc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
                Tables\Filters\SelectFilter::make('year')
                    ->options(function () {
                        return Milestone::distinct()
                            ->pluck('year', 'year')
                            ->toArray();
                    })
                    ->label('Year'),
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
                        ->action(function (Milestone $record) {
                            $record->update(['is_active' => !$record->is_active]);
                        })
                        ->visible(fn (Milestone $record) => true),
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
            'index' => Pages\ListMilestones::route('/'),
            'create' => Pages\CreateMilestone::route('/create'),
            'edit' => Pages\EditMilestone::route('/{record}/edit'),
        ];
    }
}