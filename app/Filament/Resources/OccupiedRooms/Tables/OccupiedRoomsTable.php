<?php

namespace App\Filament\Resources\OccupiedRooms\Tables;

use App\Models\Booking;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class OccupiedRoomsTable
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
                    ->label('Guest')
                    ->formatStateUsing(fn ($record) => $record->user ? $record->user->first_name . ' ' . $record->user->last_name : 'N/A')
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(),
                TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->limit(30),
                TextColumn::make('room')
                    ->label('Room Type')
                    ->searchable()
                    ->badge()
                    ->color('info'),
                TextColumn::make('num_of_rooms')
                    ->label('Rooms')
                    ->alignCenter()
                    ->badge()
                    ->color('primary'),
                TextColumn::make('checkin')
                    ->label('Check-in')
                    ->date('M j, Y')
                    ->sortable(),
                TextColumn::make('checkout')
                    ->label('Check-out')
                    ->date('M j, Y')
                    ->sortable(),
                TextColumn::make('nights')
                    ->label('Nights')
                    ->getStateUsing(fn ($record) => $record->checkin && $record->checkout 
                        ? $record->checkin->diffInDays($record->checkout) 
                        : 0)
                    ->alignCenter()
                    ->badge()
                    ->color('gray'),
                TextColumn::make('amount')
                    ->label('Amount')
                    ->money('NGN')
                    ->sortable()
                    ->weight('bold')
                    ->color('success'),
                TextColumn::make('order_status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match (strtolower($state)) {
                        'confirmed' => 'success',
                        'occupied' => 'info',
                        'completed' => 'gray',
                        'cancelled' => 'danger',
                        default => 'warning',
                    })
                    ->formatStateUsing(fn ($state) => ucfirst($state ?? 'pending'))
                    ->sortable(),
            ])
            ->filters([
                Filter::make('checkin_date_range')
                    ->form([
                        \Filament\Forms\Components\DatePicker::make('checkin_from')
                            ->label('Check-in From')
                            ->placeholder('Select start date'),
                        \Filament\Forms\Components\DatePicker::make('checkin_to')
                            ->label('Check-in To')
                            ->placeholder('Select end date'),
                    ])
                    ->columns(2)
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['checkin_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('checkin', '>=', $date),
                            )
                            ->when(
                                $data['checkin_to'],
                                fn (Builder $query, $date): Builder => $query->whereDate('checkin', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        
                        if ($data['checkin_from'] ?? null) {
                            $indicators[] = 'Check-in from ' . \Carbon\Carbon::parse($data['checkin_from'])->format('M j, Y');
                        }
                        
                        if ($data['checkin_to'] ?? null) {
                            $indicators[] = 'Check-in to ' . \Carbon\Carbon::parse($data['checkin_to'])->format('M j, Y');
                        }
                        
                        return $indicators;
                    }),
                \Filament\Tables\Filters\SelectFilter::make('room')
                    ->label('Room Type')
                    ->options(function () {
                        return \App\Models\Booking::query()
                            ->where('order_status', 'Occupied')
                            ->where(function ($query) {
                                $query->whereRaw('LOWER(payment_status) = ?', ['paid'])
                                      ->orWhereRaw('LOWER(payment_status) = ?', ['successful']);
                            })
                            ->distinct()
                            ->pluck('room', 'room')
                            ->toArray();
                    })
                    ->searchable(),
            ], layout: \Filament\Tables\Enums\FiltersLayout::AboveContent)
            ->filtersFormColumns(2)
            ->persistFiltersInSession()
            ->recordActions([
                Action::make('viewDetails')
                    ->label('View')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->modalHeading(fn (Booking $record) => 'Room Booking #' . $record->ref_num)
                    ->modalContent(fn (Booking $record) => view('filament.resources.bookings.view-booking', ['record' => $record]))
                    ->modalWidth('3xl')
                    ->slideOver()
                    ->modalFooterActions([
                        Action::make('close')
                            ->label('Close')
                            ->color('gray')
                            ->modalCancelAction(),
                    ])
                    ->modalSubmitAction(false),
            ])
            ->defaultSort('checkin', 'desc')
            ->striped()
            ->paginated([10, 25, 50, 100]);
    }
}