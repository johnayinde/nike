<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('raveref')
                    ->required()
                    ->default('Unavailable'),
                Textarea::make('ref_num')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('room')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('checkin'),
                TextInput::make('checkout'),
                Textarea::make('num_of_rooms')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('amount')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('payment_status')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('order_status')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('posted')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
