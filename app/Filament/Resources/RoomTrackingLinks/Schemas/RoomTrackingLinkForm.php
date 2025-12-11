<?php

namespace App\Filament\Resources\RoomTrackingLinks\Schemas;

use App\Models\RoomGroup;
use App\Models\RoomTrackingLink;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RoomTrackingLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('link_name')
                    ->label('Campaign Name')
                    ->required()
                    ->maxLength(200)
                    ->placeholder('e.g., Google Ads Campaign, Instagram Post')
                    ->helperText('Give this link a descriptive name to identify the traffic source')
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, callable $set, $get) {
                        // Auto-generate link code if not manually set
                        if (empty($get('link_code')) && !empty($state)) {
                            $set('link_code', RoomTrackingLink::generateUniqueCode($state));
                        }
                    })
                    ->columnSpanFull(),

                Select::make('room_group_id')
                    ->label('Room Type')
                    ->options(RoomGroup::pluck('name', 'id')->toArray())
                    ->searchable()
                    ->nullable()
                    ->placeholder('All Rooms')
                    ->helperText('Leave empty to track bookings for all room types'),

                TextInput::make('link_code')
                    ->label('Link Code')
                    ->required()
                    ->maxLength(100)
                    ->unique(RoomTrackingLink::class, 'link_code', ignoreRecord: true)
                    ->placeholder('auto-generated-code')
                    ->helperText('This will be used in the URL. Auto-generated from campaign name.')
                    ->disabled()
                    ->dehydrated(),

                Textarea::make('description')
                    ->label('Description')
                    ->maxLength(500)
                    ->rows(3)
                    ->placeholder('Optional notes about this tracking link...')
                    ->columnSpanFull(),

                Toggle::make('status')
                    ->label('Active')
                    ->default(true)
                    ->helperText('Inactive links will not track new clicks or bookings')
                    ->inline(false)
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }
}
