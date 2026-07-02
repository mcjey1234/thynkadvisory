<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\TeamMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Navigation Management';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Team Members';
    protected static ?string $pluralLabel = 'Team Members';
    protected static ?string $label = 'Team Member';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Personal Information')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->label('Full Name')
                                    ->placeholder('Enter full name'),
                                Forms\Components\TextInput::make('position')
                                    ->required()
                                    ->maxLength(255)
                                    ->label('Position')
                                    ->placeholder('e.g., Software Developer'),
                            ]),
                        Forms\Components\RichEditor::make('description')
                            ->label('Personal Description / Bio')
                            ->placeholder('Write a personal description about this team member...')
                            ->columnSpanFull()
                            ->helperText('This is the personal bio shown on the website.'),
                        Forms\Components\Textarea::make('bio')
                            ->label('Skills / Additional Info')
                            ->placeholder('e.g., Database Analyst · Quality Assurance')
                            ->rows(2)
                            ->columnSpanFull()
                            ->helperText('List additional skills separated by · (dot)'),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('team')
                            ->label('Profile Image')
                            ->imageResizeTargetWidth('400')
                            ->imageResizeTargetHeight('400')
                            ->helperText('Recommended: 400 x 400px'),
                    ]),
                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->maxLength(255)
                                    ->label('Email')
                                    ->placeholder('name@thynkadvisory.com'),
                                Forms\Components\TextInput::make('phone')
                                    ->maxLength(50)
                                    ->label('Phone')
                                    ->placeholder('+254 700 000 000'),
                            ]),
                    ]),
                Forms\Components\Section::make('Social Media Links')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('linkedin')
                                    ->maxLength(255)
                                    ->label('LinkedIn')
                                    ->placeholder('https://linkedin.com/in/username'),
                                Forms\Components\TextInput::make('twitter')
                                    ->maxLength(255)
                                    ->label('Twitter/X')
                                    ->placeholder('https://twitter.com/username'),
                                Forms\Components\TextInput::make('facebook')
                                    ->maxLength(255)
                                    ->label('Facebook')
                                    ->placeholder('https://facebook.com/username'),
                            ]),
                    ]),
                Forms\Components\Section::make('Settings')
                    ->schema([
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
                Tables\Columns\ImageColumn::make('image')
                    ->label('Photo')
                    ->circular()
                    ->width(50)
                    ->height(50),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Name')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('position')
                    ->searchable()
                    ->sortable()
                    ->label('Position'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label('Email')
                    ->toggleable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('bio')
                    ->label('Skills')
                    ->limit(30)
                    ->toggleable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('display_order', 'asc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
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
                        ->action(function (TeamMember $record) {
                            $record->update(['is_active' => !$record->is_active]);
                        })
                        ->visible(fn (TeamMember $record) => true),
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
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}