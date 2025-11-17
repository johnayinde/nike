<?php

namespace App\Console\Commands;

use App\Models\Booking;
use App\Models\RoomGroup;
use Illuminate\Console\Command;

class SyncRoomGroupReservations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'room-groups:sync-reservations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync room group reservation and booking counts with existing booking data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Syncing room group reservation data...');

        $roomGroups = RoomGroup::all();
        $updated = 0;

        foreach ($roomGroups as $roomGroup) {
            // Calculate reserved rooms (future paid bookings)
            $reservedRooms = Booking::where('room', $roomGroup->name)
                ->where('payment_status', 'Paid')
                ->where('checkin', '>', now())
                ->where('order_status', '!=', 'Occupied')
                ->where('order_status', '!=', 'Expired')
                ->sum('num_of_rooms');

            // Calculate occupied rooms (current occupied bookings)
            $occupiedRooms = Booking::where('room', $roomGroup->name)
                ->where('payment_status', 'Paid')
                ->where('order_status', 'Occupied')
                ->sum('num_of_rooms');

            // Update room group
            $roomGroup->update([
                'no_of_reserved_rooms' => $reservedRooms,
                'no_of_booked_rooms' => $occupiedRooms,
            ]);

            $this->info("Updated {$roomGroup->name}: Reserved: {$reservedRooms}, Occupied: {$occupiedRooms}");
            $updated++;
        }

        $this->info("Successfully synced {$updated} room groups.");
        
        return 0;
    }
}
