<?php

namespace App\Filament\Resources\Reservations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class ReservationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name'),
                Select::make('unit_id')
                    ->relationship('unit', 'name'),
                DatePicker::make('preferred_date')
                    ->required(),
                TimePicker::make('preferred_time')
                    ->required(),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'confirmed' => 'Confirmed', 'cancelled' => 'Cancelled'])
                    ->default('pending')
                    ->required(),
                Textarea::make('note')
                    ->columnSpanFull(),
                Textarea::make('admin_note')
                    ->columnSpanFull(),
            ]);
    }
}
