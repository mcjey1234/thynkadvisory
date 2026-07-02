<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScormProjectResource\Pages;
use App\Models\ScormProject;
use App\Services\ScormService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class ScormProjectResource extends Resource
{
    protected static ?string $model = ScormProject::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'SCORM Projects';
    protected static ?string $pluralLabel = 'SCORM Projects';

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
                        Forms\Components\TextInput::make('client_name')
                            ->label('Client Name')
                            ->placeholder('e.g., UNICEF, UNDP, etc.'),
                        Forms\Components\TextInput::make('industry')
                            ->label('Industry')
                            ->placeholder('e.g., Education, Healthcare, etc.'),
                    ])->columns(2),

                Forms\Components\Section::make('SCORM Content')
                    ->schema([
                        Forms\Components\FileUpload::make('scorm_file_path')
                            ->acceptedFileTypes(['application/zip', 'application/x-zip-compressed', 'application/octet-stream'])
                            ->directory('scorm-uploads')
                            ->label('SCORM Package (ZIP)')
                            ->helperText('Upload a SCORM 1.2 or 2004 compliant ZIP file')
                            ->preserveFilenames()
                            ->maxSize(102400), // 100MB
                        Forms\Components\TextInput::make('url')
                            ->url()
                            ->label('External URL')
                            ->helperText('OR enter a URL to your hosted SCORM course'),
                        Forms\Components\FileUpload::make('thumbnail')
                            ->image()
                            ->directory('scorm-thumbnails')
                            ->label('Thumbnail Image'),
                    ]),

                Forms\Components\Section::make('Publishing')
                    ->schema([
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Publish Date')
                            ->default(now()),
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
                Tables\Columns\TextColumn::make('client_name')
                    ->label('Client')
                    ->searchable(),
                Tables\Columns\TextColumn::make('industry')
                    ->label('Industry')
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('extracted_path')
                    ->label('Extracted')
                    ->toggleable()
                    ->badge()
                    ->color(fn ($state) => $state ? 'success' : 'danger')
                    ->formatStateUsing(fn ($state) => $state ? '✅ Yes' : '❌ No'),
                Tables\Columns\TextColumn::make('views')
                    ->numeric()
                    ->sortable()
                    ->label('👁️ Views'),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Published'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Added'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published Status'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\Action::make('extract_now')
                        ->label('Extract SCORM')
                        ->icon('heroicon-o-arrow-path')
                        ->color('success')
                        ->visible(fn ($record) => $record->scorm_file_path && !$record->extracted_path)
                        ->action(function ($record) {
                            try {
                                $scormService = new ScormService();
                                $folderName = 'course_' . time() . '_' . uniqid();
                                
                                $launchFile = $scormService->extractScormPackage($record->scorm_file_path, $folderName);
                                
                                if ($launchFile) {
                                    $record->extracted_path = $folderName;
                                    $record->launch_file = $launchFile;
                                    $record->save();
                                    
                                    Notification::make()
                                        ->title('Extracted Successfully!')
                                        ->body('SCORM package extracted. Launch file: ' . $launchFile)
                                        ->success()
                                        ->send();
                                } else {
                                    Notification::make()
                                        ->title('Extraction Failed')
                                        ->body('Could not extract the SCORM package. Check the logs for details.')
                                        ->danger()
                                        ->send();
                                }
                            } catch (\Exception $e) {
                                Notification::make()
                                    ->title('Error')
                                    ->body($e->getMessage())
                                    ->danger()
                                    ->send();
                            }
                        }),
                    Tables\Actions\Action::make('view_project')
                        ->label('View Project')
                        ->icon('heroicon-o-eye')
                        ->url(fn ($record) => route('scorm.show', $record->id))
                        ->openUrlInNewTab(),
                    Tables\Actions\DeleteAction::make()
                        ->before(function ($record) {
                            if ($record->extracted_path) {
                                Storage::deleteDirectory('public/scorm-courses/' . $record->extracted_path);
                            }
                        }),
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
            'index' => Pages\ListScormProjects::route('/'),
            'create' => Pages\CreateScormProject::route('/create'),
            'edit' => Pages\EditScormProject::route('/{record}/edit'),
        ];
    }
}
