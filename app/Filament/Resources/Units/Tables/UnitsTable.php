<?php

namespace App\Filament\Resources\Units\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class UnitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('type')
                    ->badge(),
                TextColumn::make('tower')
                    ->searchable(),
                TextColumn::make('floor')
                    ->searchable(),
                TextColumn::make('room_number')
                    ->searchable(),
                TextColumn::make('size_sqm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('price')
                    ->money('IDR', locale: 'id')
                    ->sortable(),
                TextColumn::make('listing_type')
                    ->badge(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'available' => 'success',
                        'booked' => 'warning',
                        'sold' => 'danger',
                        default => 'gray',
                    }),
                ToggleColumn::make('is_featured'),
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
                Action::make('set_available')
                    ->label('Setel Tersedia')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status !== 'available')
                    ->action(function ($record) {
                        $record->update(['status' => 'available']);
                        Notification::make()
                            ->title('Unit berhasil disetel Tersedia')
                            ->success()
                            ->send();
                    }),
                Action::make('set_booked')
                    ->label('Setel Tersewa')
                    ->icon('heroicon-o-key')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status !== 'booked')
                    ->action(function ($record) {
                        $record->update(['status' => 'booked']);
                        Notification::make()
                            ->title('Unit berhasil disetel Tersewa')
                            ->success()
                            ->send();
                    }),
                Action::make('set_sold')
                    ->label('Setel Terjual')
                    ->icon('heroicon-o-currency-dollar')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status !== 'sold')
                    ->action(function ($record) {
                        $record->update(['status' => 'sold']);
                        Notification::make()
                            ->title('Unit berhasil disetel Terjual')
                            ->success()
                            ->send();
                    }),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
