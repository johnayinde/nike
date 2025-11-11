<?php

namespace App\Filament\Resources\Bookings\Schemas;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Guest Information')
                    ->schema([
                        Select::make('user_id')
                            ->label('Guest')
                            ->relationship('user', 'email')
                            ->searchable(['first_name', 'last_name', 'email'])
                            ->getOptionLabelFromRecordUsing(fn (User $record) => "{$record->first_name} {$record->last_name} ({$record->email})")
                            ->createOptionForm([
                                TextInput::make('first_name')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('last_name')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->unique('users', 'email')
                                    ->maxLength(255),
                                TextInput::make('phone')
                                    ->tel()
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('password')
                                    ->password()
                                    ->required()
                                    ->minLength(8)
                                    ->dehydrateStateUsing(fn ($state) => bcrypt($state)),
                            ])
                            ->required()
                            ->preload()
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Booking Details')
                    ->schema([
                        TextInput::make('ref_num')
                            ->label('Reference Number')
                            ->default(fn () => 'BK' . strtoupper(Str::random(10)))
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->unique('bookings', 'ref_num', ignoreRecord: true)
                            ->columnSpanFull(),

                        Select::make('room')
                            ->label('Room Type')
                            ->options([
                                'Superior Room (Single)' => 'Superior Room (Single)',
                                'Superior Room (Double)' => 'Superior Room (Double)',
                                'Executive Suite' => 'Executive Suite',
                                'Diplomatic Suite' => 'Diplomatic Suite',
                                'Presidential Suite' => 'Presidential Suite',
                            ])
                            ->required()
                            ->searchable(),

                        TextInput::make('num_of_rooms')
                            ->label('Number of Rooms')
                            ->numeric()
                            ->required()
                            ->default(1)
                            ->minValue(1),

                        DatePicker::make('checkin')
                            ->label('Check-in Date')
                            ->required()
                            ->native(false)
                            ->displayFormat('M d, Y')
                            ->minDate(now()),

                        DatePicker::make('checkout')
                            ->label('Check-out Date')
                            ->required()
                            ->native(false)
                            ->displayFormat('M d, Y')
                            ->after('checkin'),

                        TextInput::make('amount')
                            ->label('Amount (₦)')
                            ->numeric()
                            ->required()
                            ->prefix('₦')
                            ->minValue(0)
                            ->step(0.01),
                    ])
                    ->columns(2),

                // Hidden fields with default values
                Hidden::make('payment_status')
                    ->default('Unpaid'),
                Hidden::make('order_status')
                    ->default('Reserved'),
                Hidden::make('posted')
                    ->default('No'),
            ]);
    }
}
