<?php

namespace App\Filament\Resources\RoomTrackingLinks\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TrackingLinkStatsWidget extends StatsOverviewWidget
{
    public ?\Illuminate\Database\Eloquent\Model $record = null;

    protected function getStats(): array
    {
        $record = $this->record;

        return [
            Stat::make('Total Clicks', number_format($record->clicks))
                ->description(number_format($record->unique_clicks) . ' unique')
                ->descriptionIcon('heroicon-m-cursor-arrow-rays')
                ->color('primary'),

            Stat::make('Bookings', number_format($record->bookings_count))
                ->description(number_format($record->total_nights_booked) . ' nights')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('success'),

            Stat::make('Revenue Generated', '₦' . number_format($record->revenue_generated, 2))
                ->description('Total earnings')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Avg Revenue/Booking', $record->bookings_count > 0
                ? '₦' . number_format($record->revenue_generated / $record->bookings_count, 2)
                : '₦0.00')
                ->description('Per booking')
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('warning'),
        ];
    }
}
