<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Projects';
    protected static ?string $pluralLabel = 'Projects';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Project Details')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('Project Title'),
                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->label('Description'),
                        Forms\Components\Select::make('category')
                            ->required()
                            ->options([
                                'mobile' => '📱 Mobile App',
                                'web' => '🌐 Web App',
                                'design' => '🎨 Design',
                                'other' => '📦 Other',
                            ])
                            ->label('Category'),
                        Forms\Components\TextInput::make('client_name')
                            ->label('Client Name')
                            ->placeholder('e.g., UNICEF, UNDP, etc.'),
                        Forms\Components\TextInput::make('industry')
                            ->label('Industry')
                            ->placeholder('e.g., Education, Healthcare, etc.'),
                    ])->columns(2),

                Forms\Components\Section::make('Project Links')
                    ->schema([
                        Forms\Components\TextInput::make('url')
                            ->url()
                            ->label('Project URL')
                            ->placeholder('https://example.com'),
                        Forms\Components\TextInput::make('github_url')
                            ->url()
                            ->label('GitHub URL')
                            ->placeholder('https://github.com/...'),
                        Forms\Components\TextInput::make('playstore_url')
                            ->url()
                            ->label('Play Store URL')
                            ->placeholder('https://play.google.com/...'),
                        Forms\Components\TextInput::make('appstore_url')
                            ->url()
                            ->label('App Store URL')
                            ->placeholder('https://apps.apple.com/...'),
                    ])->columns(2),

                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('thumbnail')
                            ->image()
                            ->directory('project-thumbnails')
                            ->label('Thumbnail Image')
                            ->helperText('Recommended: 1200x630px'),
                    ]),

                Forms\Components\Section::make('Publishing')
                    ->schema([
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured Project')
                            ->default(false),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Publish Date')
                            ->default(now()),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Image')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->label('Title')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn ($state) => match($state) {
                        'mobile' => 'info',
                        'web' => 'success',
                        'design' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => match($state) {
                        'mobile' => '📱 Mobile',
                        'web' => '🌐 Web',
                        'design' => '🎨 Design',
                        default => '📦 Other',
                    })
                    ->label('Category'),
                Tables\Columns\TextColumn::make('client_name')
                    ->label('Client')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('⭐ Featured'),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Published'),
                Tables\Columns\TextColumn::make('views')
                    ->numeric()
                    ->sortable()
                    ->label('👁️ Views'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Added'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'mobile' => '📱 Mobile App',
                        'web' => '🌐 Web App',
                        'design' => '🎨 Design',
                        'other' => '📦 Other',
                    ])
                    ->label('Category'),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published Status'),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\Action::make('view_project')
                        ->label('View Project')
                        ->icon('heroicon-o-eye')
                        ->color('info')
                        ->url(fn ($record) => '/projects/' . $record->id)
                        ->openUrlInNewTab(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->recordUrl(null);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
