<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('unit.name')
                    ->searchable()
                    ->description(function (\App\Models\Booking $record): ?string {
                        if ($record->status !== 'pending') {
                            return null;
                        }
                        $count = \App\Models\Booking::where('unit_id', $record->unit_id)
                            ->where('status', 'pending')
                            ->where('id', '!=', $record->id)
                            ->count();
                        return $count > 0 ? "⚠️ Ada {$count} booking pending lainnya untuk unit ini" : null;
                    }),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([

            ])
            ->recordActions([
                Action::make('approve')
                    ->label('Setujui')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->action(function ($record) {
                        $record->update(['status' => 'approved']);
                        Notification::make()
                            ->title('Booking berhasil disetujui')
                            ->success()
                            ->send();
                    }),
                Action::make('reject')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->form([
                        \Filament\Forms\Components\Textarea::make('admin_note')
                            ->label('Alasan Penolakan')
                            ->required(),
                    ])
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->action(function ($record, array $data) {
                        $record->update([
                            'status' => 'rejected',
                            'admin_note' => $data['admin_note'],
                        ]);
                        Notification::make()
                            ->title('Booking berhasil ditolak')
                            ->danger()
                            ->send();
                    }),
                Action::make('whatsapp')
                    ->label('Hubungi WA')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->color('success')
                    ->visible(fn ($record) => !empty($record->user->phone))
                    ->url(function ($record) {
                        $phone = $record->user->phone;
                        if (!$phone) return '#';
                        $phone = preg_replace('/[^0-9]/', '', $phone);
                        if (str_starts_with($phone, '0')) {
                            $phone = '62' . substr($phone, 1);
                        }
                        $message = rawurlencode("Halo {$record->user->name}, saya admin Araia Property ingin mengonfirmasi pengajuan booking Anda untuk unit {$record->unit->name}.");
                        return "https://wa.me/{$phone}?text={$message}";
                    })
                    ->openUrlInNewTab(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
