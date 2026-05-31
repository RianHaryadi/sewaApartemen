<?php

namespace App\Filament\Resources\Units\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UnitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('type')
                    ->options(['studio' => 'Studio', '1br' => '1br', '2br' => '2br', '3br' => '3br'])
                    ->required(),
                TextInput::make('tower')
                    ->required(),
                TextInput::make('floor')
                    ->required(),
                TextInput::make('room_number')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('size_sqm')
                    ->required()
                    ->numeric(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                Select::make('listing_type')
                    ->options(['rent' => 'Rent', 'sell' => 'Sell'])
                    ->required(),
                Select::make('status')
                    ->options(['available' => 'Available', 'booked' => 'Booked', 'sold' => 'Sold'])
                    ->default('available')
                    ->required(),
                Toggle::make('is_featured')
                    ->required(),
            ]);
    }
}
