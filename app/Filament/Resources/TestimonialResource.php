<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Testimonials';
    protected static ?string $pluralLabel = 'Testimonials';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Client Information')
                    ->schema([
                        Forms\Components\TextInput::make('client_name')
                            ->required()
                            ->maxLength(255)
                            ->label('Client Name'),
                        Forms\Components\TextInput::make('client_role')
                            ->maxLength(255)
                            ->label('Role/Title')
                            ->placeholder('e.g., Project Director'),
                        Forms\Components\TextInput::make('client_company')
                            ->maxLength(255)
                            ->label('Company/Organization')
                            ->placeholder('e.g., UNDP, UNICEF'),
                    ])->columns(2),

                Forms\Components\Section::make('Testimonial')
                    ->schema([
                        Forms\Components\Textarea::make('testimonial_text')
                            ->required()
                            ->rows(4)
                            ->label('Testimonial Content')
                            ->helperText('The client\'s feedback in their own words'),
                    ]),

                Forms\Components\Section::make('Avatar & Rating')
                    ->schema([
                        Forms\Components\TextInput::make('avatar_initials')
                            ->maxLength(5)
                            ->label('Avatar Initials')
                            ->helperText('e.g., MK (leave blank to auto-generate from name)'),
                        Forms\Components\FileUpload::make('avatar_image')
                            ->image()
                            ->directory('testimonial-avatars')
                            ->label('Avatar Image')
                            ->helperText('Upload a client photo or logo (recommended: 100x100px)'),
                        Forms\Components\Select::make('rating')
                            ->options([
                                5 => '★★★★★ (5)',
                                4 => '★★★★☆ (4)',
                                3 => '★★★☆☆ (3)',
                                2 => '★★☆☆☆ (2)',
                                1 => '★☆☆☆☆ (1)',
                            ])
                            ->default(5)
                            ->label('Rating'),
                        Forms\Components\TextInput::make('project_type')
                            ->maxLength(255)
                            ->label('Project Type')
                            ->placeholder('e.g., Mobile App, Web Development, GIS'),
                    ])->columns(2),

                Forms\Components\Section::make('Publishing')
                    ->schema([
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured Testimonial')
                            ->default(false)
                            ->helperText('Featured testimonials appear first on the homepage'),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                        Forms\Components\TextInput::make('display_order')
                            ->numeric()
                            ->default(0)
                            ->label('Display Order')
                            ->helperText('Lower numbers appear first'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar_image')
                    ->label('Avatar')
                    ->circular()
                    ->size(40)
                    ->getStateUsing(function ($record) {
                        if ($record->avatar_image) {
                            return asset('storage/' . $record->avatar_image);
                        }
                        return null;
                    })
                    ->defaultImageUrl(function ($record) {
                        return 'https://ui-avatars.com/api/?name=' . urlencode($record->client_name) . '&background=39FF14&color=0F172A&size=40';
                    }),
                Tables\Columns\TextColumn::make('client_name')
                    ->searchable()
                    ->sortable()
                    ->label('Client')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('client_role')
                    ->searchable()
                    ->label('Role')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('testimonial_text')
                    ->limit(60)
                    ->label('Testimonial')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->formatStateUsing(fn ($state) => str_repeat('★', $state) . str_repeat('☆', 5 - $state))
                    ->label('Rating')
                    ->toggleable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('⭐ Featured')
                    ->toggleable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Published')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('display_order')
                    ->numeric()
                    ->sortable()
                    ->label('Order')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('display_order', 'asc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published Status'),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured'),
                Tables\Filters\SelectFilter::make('rating')
                    ->options([
                        5 => '★★★★★',
                        4 => '★★★★☆',
                        3 => '★★★☆☆',
                        2 => '★★☆☆☆',
                        1 => '★☆☆☆☆',
                    ])
                    ->label('Rating'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->label('Edit')
                        ->icon('heroicon-o-pencil'),
                    Tables\Actions\Action::make('feature')
                        ->label('Make Featured')
                        ->icon('heroicon-o-star')
                        ->color('warning')
                        ->visible(fn ($record) => !$record->is_featured)
                        ->action(function ($record) {
                            $record->update(['is_featured' => true]);
                            Notification::make()
                                ->title('Testimonial Featured')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\Action::make('unfeature')
                        ->label('Remove Featured')
                        ->icon('heroicon-o-star')
                        ->color('gray')
                        ->visible(fn ($record) => $record->is_featured)
                        ->action(function ($record) {
                            $record->update(['is_featured' => false]);
                            Notification::make()
                                ->title('Testimonial Unfeatured')
                                ->warning()
                                ->send();
                        }),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('feature_bulk')
                        ->label('Feature Selected')
                        ->icon('heroicon-o-star')
                        ->action(function ($records) {
                            $records->each->update(['is_featured' => true]);
                            Notification::make()
                                ->title('Selected testimonials featured')
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
