<?php

namespace App\Filament\Resources\Bookings\Widgets;

use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Carbon\Carbon;

class StatsOverview extends StatsOverviewWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        // Get filter values
        $checkinFrom = $this->filters['checkin_date_range']['checkin_from'] ?? null;
        $checkinTo = $this->filters['checkin_date_range']['checkin_to'] ?? null;

        // Base query for occupied rooms
        $occupiedQuery = Booking::where('payment_status', 'Paid')
            ->where('order_status', 'Occupied')
            ->whereDate('checkin', '<=', Carbon::today())
            ->whereDate('checkout', '>=', Carbon::today());

        // Apply date filters
        if ($checkinFrom) {
            $occupiedQuery->whereDate('checkin', '>=', $checkinFrom);
        }
        if ($checkinTo) {
            $occupiedQuery->whereDate('checkin', '<=', $checkinTo);
        }

        $occupiedRooms = $occupiedQuery->sum('num_of_rooms');

        // Base query for upcoming bookings
        $upcomingQuery = Booking::where('payment_status', 'Paid')
            ->whereDate('checkin', '>', Carbon::today());

        // Apply date filters
        if ($checkinFrom) {
            $upcomingQuery->whereDate('checkin', '>=', $checkinFrom);
        }
        if ($checkinTo) {
            $upcomingQuery->whereDate('checkin', '<=', $checkinTo);
        }

        $upcomingBookings = $upcomingQuery->count();

        // Base query for revenue
        $revenueQuery = Booking::where('payment_status', 'Paid');

        // Apply date filters
        if ($checkinFrom) {
            $revenueQuery->whereDate('checkin', '>=', $checkinFrom);
        }
        if ($checkinTo) {
            $revenueQuery->whereDate('checkin', '<=', $checkinTo);
        }

        $revenue = $revenueQuery->sum('amount');

        return [
            Stat::make('Occupied Rooms', $occupiedRooms)
                ->description('Currently occupied rooms')
                ->descriptionIcon('heroicon-o-home')
                ->color('primary')
                ->chart([7, 5, 10, 15, 12, 18, $occupiedRooms]),

            Stat::make('Upcoming Bookings', $upcomingBookings)
                ->description('Future reservations')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('warning')
                ->chart([3, 5, 8, 12, 9, 15, $upcomingBookings]),

            Stat::make('Total Revenue', '₦' . number_format($revenue, 2))
                ->description('From paid bookings')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('success')
                ->chart([10000, 25000, 40000, 55000, 70000, 85000, $revenue]),
        ];
    }
}
