<?php

namespace App\Filament\Resources\Reservations\Tables;

use App\Models\Booking;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReservationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ref_num')
                    ->label('Reference')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->tooltip('Click to copy')
                    ->weight('bold'),
                TextColumn::make('user.first_name')
                    ->label('Guest Name')
                    ->formatStateUsing(fn ($record) => $record->user ? $record->user->first_name . ' ' . $record->user->last_name : 'N/A')
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(),
                TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->limit(30),
                TextColumn::make('user.phone')
                    ->label('Phone')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('room')
                    ->label('Room Type')
                    ->searchable()
                    ->badge()
                    ->color('info'),
                TextColumn::make('num_of_rooms')
                    ->label('Rooms')
                    ->alignCenter()
                    ->sortable(),
                TextColumn::make('checkin')
                    ->label('Check-in')
                    ->date('M j, Y')
                    ->sortable(),
                TextColumn::make('checkout')
                    ->label('Check-out')
                    ->date('M j, Y')
                    ->sortable(),
                TextColumn::make('amount')
                    ->label('Amount')
                    ->money('NGN')
                    ->sortable(),
                TextColumn::make('order_status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match (strtolower($state)) {
                        'occupied' => 'primary',
                        'reserved', 'successful' => 'success',
                        'pending' => 'warning',
                        'expired' => 'gray',
                        'cancelled', 'failed' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => ucfirst($state ?? 'pending'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('process')
                    ->label('Process')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Process Reservation')
                    ->modalDescription(fn (Booking $record) => 'Mark reservation #' . $record->ref_num . ' as Occupied?')
                    ->modalSubmitActionLabel('Process')
                    ->visible(fn (Booking $record) => strtolower($record->order_status) !== 'occupied' && strtolower($record->order_status) !== 'expired')
                    ->action(function (Booking $record) {
                        $record->update([
                            'order_status' => 'Occupied',
                        ]);

                        // Update the room group's booked rooms count
                        $roomGroup = \App\Models\RoomGroup::where('name', $record->room)->first();
                        if ($roomGroup) {
                            $currentBooked = $roomGroup->no_of_booked_rooms ?? 0;
                            $roomGroup->update([
                                'no_of_booked_rooms' => $currentBooked + $record->num_of_rooms,
                                'no_of_reserved_rooms' => max(0, ($roomGroup->no_of_reserved_rooms ?? 0) - $record->num_of_rooms)
                            ]);
                        }

                        Notification::make()
                            ->title('Reservation Processed')
                            ->success()
                            ->body('Reservation #' . $record->ref_num . ' has been marked as Occupied.')
                            ->send();
                    }),
            ])
            ->toolbarActions([
                //
            ])
            ->defaultSort('checkin', 'desc');
    }
}
