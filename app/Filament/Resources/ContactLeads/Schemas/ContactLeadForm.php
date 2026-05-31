<?php

namespace App\Filament\Resources\ContactLeads\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ContactLeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                Textarea::make('message')
                    ->columnSpanFull(),
                TextInput::make('type')
                    ->required()
                    ->default('contact'),
            ]);
    }
}
