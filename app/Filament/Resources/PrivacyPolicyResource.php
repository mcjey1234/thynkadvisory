<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrivacyPolicyResource\Pages;
use App\Models\PrivacyPolicy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PrivacyPolicyResource extends Resource
{
    protected static ?string $model = PrivacyPolicy::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Navigation Management';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Privacy Policy';
    protected static ?string $pluralLabel = 'Privacy Policy';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Privacy Policy')
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
                                            ->placeholder('Privacy Policy'),
                                        Forms\Components\TextInput::make('subtitle')
                                            ->maxLength(255)
                                            ->label('Subtitle')
                                            ->placeholder('Your Privacy Matters to Us'),
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
                                    ->label('Privacy Policy Content')
                                    ->placeholder('Write your privacy policy content here...')
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
                        Forms\Components\Tabs\Tab::make('Cookies Info')
                            ->icon('heroicon-o-cookie')
                            ->schema([
                                Forms\Components\RichEditor::make('cookies_info')
                                    ->label('Cookie Information')
                                    ->placeholder('Explain how you use cookies...')
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'link',
                                        'bulletList',
                                        'orderedList',
                                    ])
                                    ->columnSpanFull(),
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true)
                                    ->helperText('Only one privacy policy can be active at a time'),
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
            'index' => Pages\ListPrivacyPolicies::route('/'),
            'create' => Pages\CreatePrivacyPolicy::route('/create'),
            'edit' => Pages\EditPrivacyPolicy::route('/{record}/edit'),
        ];
    }
}