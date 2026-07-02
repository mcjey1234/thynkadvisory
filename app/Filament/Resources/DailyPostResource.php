<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DailyPostResource\Pages;
use App\Models\DailyPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class DailyPostResource extends Resource
{
    protected static ?string $model = DailyPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Daily Posts';
    protected static ?string $pluralLabel = 'Daily Posts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Post Content')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('Title'),
                        Forms\Components\Textarea::make('content')
                            ->required()
                            ->rows(3)
                            ->label('Content'),
                        Forms\Components\Select::make('type')
                            ->options([
                                'tip' => '💡 Tip',
                                'insight' => '🧠 Insight',
                                'news' => '📰 News',
                                'quote' => '💬 Quote',
                                'update' => '🔄 Update',
                            ])
                            ->default('tip')
                            ->label('Post Type'),
                        Forms\Components\TextInput::make('icon')
                            ->label('Emoji Icon')
                            ->placeholder('💡'),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('daily-posts')
                            ->label('Featured Image'),
                    ])->columns(2),

                Forms\Components\Section::make('Publishing')
                    ->schema([
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                        Forms\Components\DatePicker::make('post_date')
                            ->label('Post Date')
                            ->default(today()),
                        Forms\Components\DateTimePicker::make('scheduled_at')
                            ->label('Schedule for Auto-Post')
                            ->helperText('Leave blank to publish immediately'),
                    ])->columns(2),
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
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'tip' => 'success',
                        'insight' => 'info',
                        'news' => 'warning',
                        'quote' => 'gray',
                        default => 'gray',
                    })
                    ->label('Type'),
                Tables\Columns\TextColumn::make('content')
                    ->limit(50)
                    ->label('Preview'),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Published')
                    ->sortable(),
                Tables\Columns\TextColumn::make('post_date')
                    ->date('M d, Y')
                    ->sortable()
                    ->label('Date'),
                Tables\Columns\TextColumn::make('posted_at')
                    ->dateTime('M d, Y h:i A')
                    ->sortable()
                    ->label('Posted'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('post_date', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published Status'),
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'tip' => '💡 Tip',
                        'insight' => '🧠 Insight',
                        'news' => '📰 News',
                        'quote' => '💬 Quote',
                    ])
                    ->label('Type'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\Action::make('publish_now')
                        ->label('Publish Now')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->visible(fn ($record) => !$record->posted_at)
                        ->action(function ($record) {
                            $record->posted_at = now();
                            $record->save();
                            Notification::make()
                                ->title('Published!')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('publish_bulk')
                        ->label('Publish Selected')
                        ->icon('heroicon-o-check-circle')
                        ->action(function ($records) {
                            $records->each->update(['posted_at' => now()]);
                            Notification::make()
                                ->title('Published!')
                                ->success()
                                ->send();
                        }),
                ]),
            ])
            ->recordUrl(null);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDailyPosts::route('/'),
            'create' => Pages\CreateDailyPost::route('/create'),
            'edit' => Pages\EditDailyPost::route('/{record}/edit'),
        ];
    }
}
