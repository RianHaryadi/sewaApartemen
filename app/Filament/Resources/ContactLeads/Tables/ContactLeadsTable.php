<?php

namespace App\Filament\Resources\ContactLeads\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;

class ContactLeadsTable
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
                TextColumn::make('type')
                    ->searchable(),
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
                Action::make('whatsapp')
                    ->label('Hubungi WA')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->color('success')
                    ->visible(fn ($record) => !empty($record->phone))
                    ->url(function ($record) {
                        $phone = $record->phone;
                        if (!$phone) return '#';
                        $phone = preg_replace('/[^0-9]/', '', $phone);
                        if (str_starts_with($phone, '0')) {
                            $phone = '62' . substr($phone, 1);
                        }
                        
                        if ($record->type === 'selling') {
                            $message = "Halo Kak {$record->name}, terima kasih sudah menghubungi Araia Property. Kami menerima pengajuan Kakak untuk *titip jual unit apartemen*. Boleh kami konfirmasi detail unit yang ingin dititipkan?";
                        } elseif ($record->type === 'leasing') {
                            $message = "Halo Kak {$record->name}, terima kasih sudah menghubungi Araia Property. Kami menerima pengajuan Kakak untuk *titip sewa (leasing) apartemen*. Boleh kami konfirmasi detail unit yang ingin disewakan?";
                        } else {
                            $message = "Halo Kak {$record->name}, terima kasih sudah menghubungi Araia Property. Kami menerima pertanyaan Kakak di website. Ada yang bisa kami bantu jelaskan lebih lanjut?";
                        }
                        
                        return "https://wa.me/{$phone}?text=" . rawurlencode($message);
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
