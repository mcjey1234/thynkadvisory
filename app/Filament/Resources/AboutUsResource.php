<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutUsResource\Pages;
use App\Models\AboutUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AboutUsResource extends Resource
{
    protected static ?string $model = AboutUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationGroup = 'Navigation Management';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'About Us';
    protected static ?string $pluralLabel = 'About Us';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('About Us')
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
                                            ->placeholder('About Us'),
                                        Forms\Components\TextInput::make('subtitle')
                                            ->maxLength(255)
                                            ->label('Subtitle')
                                            ->placeholder('Transforming Learning Through Gamification'),
                                    ]),
                                Forms\Components\RichEditor::make('description')
                                    ->required()
                                    ->label('Description')
                                    ->placeholder('Write about your company...')
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Mission & Vision')
                            ->icon('heroicon-o-rocket-launch')
                            ->schema([
                                Forms\Components\Textarea::make('mission')
                                    ->label('Mission')
                                    ->placeholder('Our mission is...')
                                    ->rows(3)
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('vision')
                                    ->label('Vision')
                                    ->placeholder('Our vision is...')
                                    ->rows(3)
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('about_values')
                                    ->label('Values')
                                    ->placeholder('Innovation | Excellence | Integrity | Collaboration | Impact')
                                    ->rows(2)
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Images')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->directory('about')
                                    ->label('Main Image')
                                    ->imageResizeTargetWidth('800')
                                    ->imageResizeTargetHeight('600')
                                    ->helperText('Recommended: 800 x 600px'),
                                Forms\Components\FileUpload::make('background_image')
                                    ->image()
                                    ->directory('about')
                                    ->label('Background Image')
                                    ->imageResizeTargetWidth('1920')
                                    ->imageResizeTargetHeight('600')
                                    ->helperText('Recommended: 1920 x 600px'),
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true),
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
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->circular()
                    ->width(50)
                    ->height(50),
                Tables\Columns\TextColumn::make('subtitle')
                    ->searchable()
                    ->label('Subtitle')
                    ->limit(40),
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
            'index' => Pages\ListAboutUs::route('/'),
            'create' => Pages\CreateAboutUs::route('/create'),
            'edit' => Pages\EditAboutUs::route('/{record}/edit'),
        ];
    }
}