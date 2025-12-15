<?php

namespace App\Filament\Resources\RoomTrackingLinks\Widgets;

use App\Models\RoomTrackingLink;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RoomTrackingLinksStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $trackingLinks = RoomTrackingLink::all();

        $totalClicks = $trackingLinks->sum('clicks');
        $totalUniqueClicks = $trackingLinks->sum('unique_clicks');
        $totalBookings = $trackingLinks->sum('bookings_count');
        $totalRevenue = $trackingLinks->sum('revenue_generated');
        $totalNights = $trackingLinks->sum('total_nights_booked');
        $activeLinks = $trackingLinks->where('status', 1)->count();

        // Calculate conversion rate
        $conversionRate = $totalClicks > 0 ? round(($totalBookings / $totalClicks) * 100, 2) : 0;

        return [
            Stat::make('Total Clicks', number_format($totalClicks))
                ->description(number_format($totalUniqueClicks) . ' unique visitors')
                ->descriptionIcon('heroicon-m-cursor-arrow-rays')
                ->color('primary'),

            Stat::make('Total Bookings', number_format($totalBookings))
                ->description(number_format($totalNights) . ' nights booked')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('success'),

            Stat::make('Total Revenue', '₦' . number_format($totalRevenue, 2))
                ->description('From tracked links')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Active Links', number_format($activeLinks))
                ->description('of ' . number_format($trackingLinks->count()) . ' total links')
                ->descriptionIcon('heroicon-m-link')
                ->color('warning'),

            Stat::make('Conversion Rate', $conversionRate . '%')
                ->description('Clicks to bookings')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color($conversionRate >= 5 ? 'success' : 'gray'),
        ];
    }
}
