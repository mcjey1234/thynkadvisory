<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Carbon\Carbon;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Response;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'Contact Submissions';
    protected static ?string $pluralLabel = 'Contact Submissions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Message Details')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->disabled()
                                    ->label('Name')
                                    ->extraAttributes(['class' => 'font-bold']),
                                Forms\Components\TextInput::make('email')
                                    ->disabled()
                                    ->label('Email')
                                    ->extraAttributes(['class' => 'text-primary-600']),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('phone')
                                    ->disabled()
                                    ->label('Phone'),
                                Forms\Components\TextInput::make('subject')
                                    ->disabled()
                                    ->label('Subject')
                                    ->extraAttributes(['class' => 'font-semibold']),
                            ]),
                        Forms\Components\Textarea::make('message')
                            ->disabled()
                            ->label('Message')
                            ->rows(8)
                            ->extraAttributes(['class' => 'bg-gray-50 p-4 rounded-lg']),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->disabled()
                                    ->label('Status')
                                    ->options([
                                        'unread' => 'Unread',
                                        'read' => 'Read',
                                        'replied' => 'Replied',
                                    ])
                                    ->formatStateUsing(fn ($state) => ucfirst($state)),
                                Forms\Components\TextInput::make('created_at')
                                    ->disabled()
                                    ->label('Submitted At')
                                    ->formatStateUsing(function ($state) {
                                        if ($state instanceof Carbon) {
                                            return $state->format('M d, Y h:i A');
                                        }
                                        try {
                                            return Carbon::parse($state)->format('M d, Y h:i A');
                                        } catch (\Exception $e) {
                                            return $state;
                                        }
                                    }),
                            ]),
                        Forms\Components\TextInput::make('ip_address')
                            ->disabled()
                            ->label('IP Address'),
                        Forms\Components\TextInput::make('user_agent')
                            ->disabled()
                            ->label('User Agent')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Name')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->label('Email')
                    ->icon('heroicon-o-envelope')
                    ->copyable()
                    ->copyMessage('Email copied!'),
                Tables\Columns\TextColumn::make('subject')
                    ->searchable()
                    ->sortable()
                    ->label('Subject')
                    ->limit(30),
                Tables\Columns\TextColumn::make('message')
                    ->label('Message Preview')
                    ->limit(40),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->sortable()
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->color(fn ($state) => match ($state) {
                        'unread' => 'danger',
                        'read' => 'warning',
                        'replied' => 'success',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y h:i A')
                    ->sortable()
                    ->label('Submitted'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'unread' => 'Unread',
                        'read' => 'Read',
                        'replied' => 'Replied',
                    ])
                    ->label('Status'),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('from')
                            ->label('From Date'),
                        Forms\Components\DatePicker::make('to')
                            ->label('To Date'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn ($q) => $q->whereDate('created_at', '>=', $data['from']))
                            ->when($data['to'], fn ($q) => $q->whereDate('created_at', '<=', $data['to']));
                    }),
            ])
            ->headerActions([
                // Print Button
                Action::make('print')
                    ->label('Print')
                    ->icon('heroicon-o-printer')
                    ->color('gray')
                    ->action(function () {
                        return redirect()->route('filament.admin.resources.contacts.print');
                    }),
                // Export Button
                Action::make('export')
                    ->label('Export CSV')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->action(function () {
                        return static::export();
                    }),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->label('View')
                        ->icon('heroicon-o-eye')
                        ->color('info'),
                    Action::make('print_single')
                        ->label('Print')
                        ->icon('heroicon-o-printer')
                        ->color('gray')
                        ->url(fn ($record) => route('filament.admin.resources.contacts.print', $record)),
                    Tables\Actions\Action::make('mark_as_read')
                        ->label('Mark as Read')
                        ->icon('heroicon-o-check-circle')
                        ->color('warning')
                        ->visible(fn ($record) => $record->status === 'unread')
                        ->action(function ($record) {
                            $record->markAsRead();
                            Notification::make()
                                ->title('Marked as Read')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\Action::make('mark_as_replied')
                        ->label('Mark as Replied')
                        ->icon('heroicon-o-check-badge')
                        ->color('success')
                        ->visible(fn ($record) => $record->status !== 'replied')
                        ->action(function ($record) {
                            $record->status = 'replied';
                            $record->save();
                            Notification::make()
                                ->title('Marked as Replied')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\Action::make('reply')
                        ->label('Reply via Email')
                        ->icon('heroicon-o-envelope')
                        ->color('primary')
                        ->url(fn ($record) => 'mailto:' . $record->email . '?subject=Re: ' . urlencode($record->subject) . '&body=' . urlencode("Hi " . $record->name . ",\n\nThank you for contacting us. We have received your message and will get back to you shortly.\n\nBest regards,\nSofel Labs Team"))
                        ->openUrlInNewTab(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('mark_as_read')
                        ->label('Mark as Read')
                        ->icon('heroicon-o-check-circle')
                        ->action(function ($records) {
                            $records->each->markAsRead();
                            Notification::make()
                                ->title('Marked as Read')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\BulkAction::make('mark_as_replied')
                        ->label('Mark as Replied')
                        ->icon('heroicon-o-check-badge')
                        ->action(function ($records) {
                            $records->each(function ($record) {
                                $record->status = 'replied';
                                $record->save();
                            });
                            Notification::make()
                                ->title('Marked as Replied')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\BulkAction::make('export_selected')
                        ->label('Export Selected')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->action(function ($records) {
                            return static::exportSelected($records);
                        }),
                ]),
            ])
            ->recordUrl(null)
            ->poll('30s');
    }

    /**
     * Export all contacts to CSV
     */
    public static function export()
    {
        $contacts = Contact::all();
        return static::generateCSV($contacts);
    }

    /**
     * Export selected contacts to CSV
     */
    public static function exportSelected($records)
    {
        return static::generateCSV($records);
    }

    /**
     * Generate CSV file
     */
    public static function generateCSV($contacts)
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts_' . date('Y-m-d') . '.csv"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function () use ($contacts) {
            $file = fopen('php://output', 'w');

            // Add UTF-8 BOM for Excel compatibility
            fputs($file, "\xEF\xBB\xBF");

            // Headers
            fputcsv($file, [
                'ID',
                'Name',
                'Email',
                'Phone',
                'Subject',
                'Message',
                'Status',
                'IP Address',
                'Submitted At'
            ]);

            // Data rows
            foreach ($contacts as $contact) {
                fputcsv($file, [
                    $contact->id,
                    $contact->name,
                    $contact->email,
                    $contact->phone ?? 'N/A',
                    $contact->subject,
                    $contact->message,
                    ucfirst($contact->status),
                    $contact->ip_address ?? 'N/A',
                    $contact->created_at->format('M d, Y h:i A')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'view' => Pages\ViewContact::route('/{record}'),
            'print' => Pages\PrintContacts::route('/print'),
            'print_single' => Pages\PrintContact::route('/print/{record}'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        try {
            return static::getModel()::where('status', 'unread')->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }
}