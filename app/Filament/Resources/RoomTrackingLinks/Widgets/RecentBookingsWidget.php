<?php

namespace App\Filament\Resources\RoomTrackingLinks\Widgets;

use Filament\Widgets\TableWidget;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class RecentBookingsWidget extends TableWidget
{
    public ?\Illuminate\Database\Eloquent\Model $record = null;

    protected static ?string $heading = 'Recent Bookings from This Link';

    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        $record = $this->record;

        return \App\Models\Booking::query()
            ->where('tracking_link_id', $record->id)
            ->where('payment_status', 'Paid')
            ->orderBy('created_at', 'desc')
            ->limit(20);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('ref_num')
                ->label('Reference')
                ->searchable()
                ->copyable()
                ->weight('bold'),

            Tables\Columns\TextColumn::make('user.first_name')
                ->label('Guest')
                ->formatStateUsing(
                    fn($record) => ($record->user->first_name ?? 'Guest') . ' ' . ($record->user->last_name ?? '')
                ),

            Tables\Columns\TextColumn::make('room')
                ->label('Room Type')
                ->badge()
                ->color('info'),

            Tables\Columns\TextColumn::make('checkin')
                ->label('Check-in')
                ->date('M d, Y'),

            Tables\Columns\TextColumn::make('checkout')
                ->label('Check-out')
                ->date('M d, Y'),

            Tables\Columns\TextColumn::make('nights')
                ->label('Nights')
                ->getStateUsing(
                    fn($record) =>
                    \Carbon\Carbon::parse($record->checkin)->diffInDays($record->checkout)
                )
                ->alignCenter(),

            Tables\Columns\TextColumn::make('num_of_rooms')
                ->label('Rooms')
                ->alignCenter(),

            Tables\Columns\TextColumn::make('amount')
                ->label('Amount')
                ->money('NGN')
                ->weight('bold'),

            Tables\Columns\TextColumn::make('order_status')
                ->label('Status')
                ->badge()
                ->color(fn(string $state): string => match (strtolower($state)) {
                    'occupied' => 'primary',
                    'reserved' => 'success',
                    'pending' => 'warning',
                    default => 'gray',
                }),
        ];
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No Bookings Yet';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Bookings from this tracking link will appear here.';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-calendar';
    }
}
