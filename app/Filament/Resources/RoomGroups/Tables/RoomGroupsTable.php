<?php

namespace App\Filament\Resources\RoomGroups\Tables;

use App\Models\Booking;
use Filament\Actions\Action;
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
                // Filters can be added here if needed
            ])
            ->actions([
                Action::make('editRooms')
                    ->label('Edit Rooms')
                    ->icon('heroicon-o-pencil')
                    ->color('primary')
                    ->modalHeading(fn ($record) => 'Edit Total Rooms for ' . $record->name)
                    ->modalWidth('md')
                    ->form([
                        \Filament\Forms\Components\TextInput::make('no_of_rooms')
                            ->label('Total Number of Rooms')
                            ->numeric()
                            ->required()
                            ->minValue(1)
                            ->step(1)
                            ->helperText('Enter the total number of rooms available for this room group')
                            ->default(fn ($record) => $record->no_of_rooms),
                    ])
                    ->action(function ($record, array $data) {
                        $record->update([
                            'no_of_rooms' => $data['no_of_rooms']
                        ]);
                        
                        \Filament\Notifications\Notification::make()
                            ->success()
                            ->title('Room count updated')
                            ->body('Total rooms updated to ' . $data['no_of_rooms'])
                            ->send();
                    }),
            ])
            ->bulkActions([
                // No bulk actions needed
            ])
            ->defaultSort('name');
    }
}