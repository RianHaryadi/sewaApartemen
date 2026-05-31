<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;
use App\Models\Booking;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Placeholder::make('conflict_warning')
                    ->label('')
                    ->content(function (?Booking $record): ?HtmlString {
                        if (!$record || $record->status !== 'pending') {
                            return null;
                        }
                        $count = Booking::where('unit_id', $record->unit_id)
                            ->where('status', 'pending')
                            ->where('id', '!=', $record->id)
                            ->count();
                        if ($count > 0) {
                            return new HtmlString("
                                <div class='p-4 text-sm text-amber-800 rounded-lg bg-amber-50 dark:bg-gray-800 dark:text-amber-300 border border-amber-200 dark:border-amber-900' role='alert'>
                                    <span class='font-medium'>⚠️ Perhatian:</span> Ada <strong>{$count} booking pending lainnya</strong> untuk unit ini. Menyetujui (Approved) booking ini akan secara otomatis menolak (Rejected) booking lainnya.
                                </div>
                            ");
                        }
                        return null;
                    })
                    ->visible(function (?Booking $record): bool {
                        if (!$record || $record->status !== 'pending') {
                            return false;
                        }
                        return Booking::where('unit_id', $record->unit_id)
                            ->where('status', 'pending')
                            ->where('id', '!=', $record->id)
                            ->exists();
                    })
                    ->columnSpanFull(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('unit_id')
                    ->relationship('unit', 'name')
                    ->required(),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected'])
                    ->default('pending')
                    ->required(),
                Textarea::make('note')
                    ->columnSpanFull(),
                Textarea::make('admin_note')
                    ->columnSpanFull(),
            ]);
    }
}

