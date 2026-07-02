<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Header Management';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Banners';
    protected static ?string $pluralLabel = 'Banners';
    protected static ?string $label = 'Banner';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Banner Information')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('banners')
                            ->required()
                            ->label('Banner Image')
                            ->helperText('Recommended size: 1920 x 600px or larger. Supports JPG, PNG, WebP. Max 10MB.')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(10240) // 10MB
                            ->imageResizeTargetWidth('1920')
                            ->imageResizeTargetHeight('600')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:5')
                            ->panelLayout('grid')
                            ->uploadingMessage('Uploading banner...')
                            ->rules([
                                'dimensions:min_width=1080,min_height=300,max_width=3840,max_height=1200',
                            ])
                            ->validationMessages([
                                'dimensions' => 'Image must be between 1080x300 and 3840x1200 pixels',
                                'max' => 'Image size must be less than 10MB',
                                'mimes' => 'Only JPG, PNG, and WebP images are allowed',
                            ])
                            ->columnSpanFull()
                            ->multiple(false) // IMPORTANT: Force single file upload
                            ->maxFiles(1), // IMPORTANT: Limit to 1 file
                        
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->maxLength(255)
                                    ->label('Banner Title')
                                    ->placeholder('Enter banner title (optional)...')
                                    ->helperText('Used for internal reference only'),
                                
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true)
                                    ->helperText('Only active banners will appear on the site'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->circular()
                    ->width(80)
                    ->height(80)
                    ->stacked(),
                
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->label('Title')
                    ->placeholder('No title')
                    ->limit(30),
                
                Tables\Columns\BadgeColumn::make('image_size')
                    ->label('Dimensions')
                    ->getStateUsing(function ($record) {
                        if ($record && $record->image) {
                            $path = storage_path('app/public/' . $record->image);
                            if (file_exists($path)) {
                                $size = getimagesize($path);
                                if ($size) {
                                    return $size[0] . 'x' . $size[1];
                                }
                            }
                        }
                        return 'Unknown';
                    })
                    ->colors([
                        'success' => function ($state) {
                            $parts = explode('x', $state);
                            if (count($parts) == 2) {
                                $width = (int)$parts[0];
                                return $width >= 1920;
                            }
                            return false;
                        },
                        'warning' => function ($state) {
                            $parts = explode('x', $state);
                            if (count($parts) == 2) {
                                $width = (int)$parts[0];
                                return $width >= 1080 && $width < 1920;
                            }
                            return false;
                        },
                        'danger' => function ($state) {
                            $parts = explode('x', $state);
                            if (count($parts) == 2) {
                                $width = (int)$parts[0];
                                return $width < 1080;
                            }
                            return false;
                        },
                    ]),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Created')
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Updated')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status')
                    ->placeholder('All'),
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
                        ->action(function (Banner $record) {
                            $record->update(['is_active' => !$record->is_active]);
                            \Filament\Notifications\Notification::make()
                                ->title('Banner ' . ($record->is_active ? 'Activated' : 'Deactivated'))
                                ->success()
                                ->send();
                        }),
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
                            \Filament\Notifications\Notification::make()
                                ->title('Banners Activated')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\BulkAction::make('deactivate')
                        ->label('Deactivate Selected')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(function ($records) {
                            $records->each->update(['is_active' => false]);
                            \Filament\Notifications\Notification::make()
                                ->title('Banners Deactivated')
                                ->warning()
                                ->send();
                        }),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}