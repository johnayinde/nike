<?php

namespace App\Filament\Resources\RoomGroups\Tables;

use App\Models\Booking;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RoomGroupsTable
{
    public static function make(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Room Group Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('short_name')
                    ->label('Short Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('no_of_rooms')
                    ->label('Total Rooms')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('available_rooms')
                    ->label('Available Rooms')
                    ->getStateUsing(function ($record) {
                        $bookedRooms = $record->no_of_reserved_rooms ?? 0;
                        $processedRooms = $record->no_of_booked_rooms ?? 0;
                        return max(0, $record->no_of_rooms - $bookedRooms - $processedRooms);
                    })
                    ->numeric()
                    ->color(fn ($state) => $state > 0 ? 'success' : 'danger'),

                TextColumn::make('no_of_reserved_rooms')
                    ->label('Reserved Rooms')
                    ->numeric()
                    ->sortable()
                    ->color('warning'),

                TextColumn::make('no_of_booked_rooms')
                    ->label('Occupied Rooms')
                    ->numeric()
                    ->sortable()
                    ->color('primary'),

                TextColumn::make('price')
                    ->label('Price per Night')
                    ->prefix('₦')
                    ->numeric(decimalPlaces: 2)
                    ->sortable(),

                TextColumn::make('guest')
                    ->label('Max Guests')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Active' => 'success',
                        'Inactive' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Active' => 'Active',
                        'Inactive' => 'Inactive',
                    ]),
            ])
            ->actions([
                // No actions needed for now
            ])
            ->bulkActions([
                // No bulk actions needed
            ])
            ->defaultSort('name');
    }
}