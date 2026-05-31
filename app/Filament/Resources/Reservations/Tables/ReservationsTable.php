<?php

namespace App\Filament\Resources\Reservations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class ReservationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('unit.name')
                    ->searchable(),
                TextColumn::make('preferred_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('preferred_time')
                    ->time()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'success',
                        'cancelled' => 'danger',
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
                Action::make('confirm')
                    ->label('Konfirmasi')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->action(function ($record) {
                        $record->update(['status' => 'confirmed']);
                        Notification::make()
                            ->title('Reservasi berhasil dikonfirmasi')
                            ->success()
                            ->send();
                    }),
                Action::make('cancel')
                    ->label('Batalkan')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->form([
                        \Filament\Forms\Components\Textarea::make('admin_note')
                            ->label('Alasan Pembatalan')
                            ->required(),
                    ])
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->action(function ($record, array $data) {
                        $record->update([
                            'status' => 'cancelled',
                            'admin_note' => $data['admin_note'],
                        ]);
                        Notification::make()
                            ->title('Reservasi berhasil dibatalkan')
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
                        $dateStr = $record->preferred_date?->format('d-m-Y') ?? '';
                        $timeStr = $record->preferred_time ?? '';
                        $message = rawurlencode("Halo {$record->user->name}, saya admin Araia Property ingin mengonfirmasi jadwal kunjungan survei Anda untuk unit {$record->unit->name} pada tanggal {$dateStr} jam {$timeStr}.");
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
