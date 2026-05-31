<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('role')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'admin' => 'success',
                        'user' => 'info',
                        default => 'gray',
                    }),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
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
                Action::make('make_admin')
                    ->label('Jadikan Admin')
                    ->icon('heroicon-o-shield-check')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->role !== 'admin')
                    ->action(function ($record) {
                        $record->update(['role' => 'admin']);
                        if (method_exists($record, 'syncRoles')) {
                            $record->syncRoles(['admin']);
                        }
                        Notification::make()
                            ->title('User berhasil dijadikan Admin')
                            ->success()
                            ->send();
                    }),
                Action::make('make_user')
                    ->label('Jadikan User')
                    ->icon('heroicon-o-user')
                    ->color('gray')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->role === 'admin')
                    ->action(function ($record) {
                        $record->update(['role' => 'user']);
                        if (method_exists($record, 'syncRoles')) {
                            $record->syncRoles(['user']);
                        }
                        Notification::make()
                            ->title('Admin berhasil dijadikan User biasa')
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
