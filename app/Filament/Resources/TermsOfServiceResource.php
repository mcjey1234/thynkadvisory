<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TermsOfServiceResource\Pages;
use App\Models\TermsOfService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TermsOfServiceResource extends Resource
{
    protected static ?string $model = TermsOfService::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';
    protected static ?string $navigationGroup = 'Navigation Management';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Terms of Service';
    protected static ?string $pluralLabel = 'Terms of Service';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Terms of Service')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Content')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->required()
                                            ->maxLength(255)
                                            ->label('Page Title')
                                            ->placeholder('Terms of Service'),
                                        Forms\Components\TextInput::make('subtitle')
                                            ->maxLength(255)
                                            ->label('Subtitle')
                                            ->placeholder('Our Terms & Conditions'),
                                        Forms\Components\TextInput::make('version')
                                            ->required()
                                            ->maxLength(50)
                                            ->label('Version')
                                            ->placeholder('1.0')
                                            ->default('1.0'),
                                        Forms\Components\DatePicker::make('effective_date')
                                            ->required()
                                            ->label('Effective Date')
                                            ->default(now()),
                                    ]),
                                Forms\Components\RichEditor::make('content')
                                    ->required()
                                    ->label('Terms of Service Content')
                                    ->placeholder('Write your terms of service content here...')
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'strike',
                                        'link',
                                        'heading',
                                        'bulletList',
                                        'orderedList',
                                        'blockquote',
                                        'codeBlock',
                                        'table',
                                    ])
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Settings')
                            ->icon('heroicon-o-cog')
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true)
                                    ->helperText('Only one terms of service can be active at a time'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->label('Title')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('version')
                    ->badge()
                    ->color('info')
                    ->label('Version'),
                Tables\Columns\TextColumn::make('effective_date')
                    ->date()
                    ->sortable()
                    ->label('Effective Date'),
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
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTermsOfServices::route('/'),
            'create' => Pages\CreateTermsOfService::route('/create'),
            'edit' => Pages\EditTermsOfService::route('/{record}/edit'),
        ];
    }
}