<?php

namespace App\Traits;

use App\Models\Booking;
use App\Models\RoomGroup;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait RoomBookingTrait
{
    /**
     * Check room availability for given dates
     * 
     * @param int $roomGroupId
     * @param string $startDate
     * @param string $endDate
     * @param int $requestedRooms
     * @return array
     */
    public function checkAvailability($roomGroupId, $startDate, $endDate, $requestedRooms = 1)
    {
        try {
            $roomGroup = RoomGroup::find($roomGroupId);
            
            if (!$roomGroup) {
                return [
                    'available' => false,
                    'message' => 'Room type not found',
                    'available_rooms' => 0
                ];
            }

            // Parse dates
            $checkIn = Carbon::createFromFormat('Y-m-d', $startDate);
            $checkOut = Carbon::createFromFormat('Y-m-d', $endDate);

            // Get booked rooms for the date range
            $bookedRooms = $this->getBookedRoomsForDateRange(
                $roomGroup->name, 
                $checkIn, 
                $checkOut
            );

            // Calculate available rooms
            $totalRooms = $roomGroup->no_of_rooms;
            $reservedRooms = $roomGroup->no_of_reserved_rooms ?? 0;
            $availableRooms = $totalRooms - $reservedRooms - $bookedRooms;

            $isAvailable = $availableRooms >= $requestedRooms;

            return [
                'available' => $isAvailable,
                'available_rooms' => max(0, $availableRooms),
                'total_rooms' => $totalRooms,
                'reserved_rooms' => $reservedRooms,
                'booked_rooms' => $bookedRooms,
                'requested_rooms' => $requestedRooms,
                'message' => $isAvailable 
                    ? "Available ({$availableRooms} rooms)" 
                    : "Not available (only {$availableRooms} rooms left)"
            ];

        } catch (\Exception $e) {
            return [
                'available' => false,
                'message' => 'Error checking availability: ' . $e->getMessage(),
                'available_rooms' => 0
            ];
        }
    }

    /**
     * Get number of booked rooms for a specific date range
     * 
     * @param string $roomName
     * @param Carbon $checkIn
     * @param Carbon $checkOut
     * @return int
     */
    private function getBookedRoomsForDateRange($roomName, Carbon $checkIn, Carbon $checkOut)
    {
        return DB::table('bookings')
            ->where('room', $roomName)
            ->whereDate('checkin', '<=', $checkOut->toDateString())
            ->whereDate('checkout', '>=', $checkIn->toDateString())
            ->whereDate('checkin', '!=', $checkOut->toDateString())
            ->whereDate('checkout', '!=', $checkIn->toDateString())
            ->where('payment_status', 'Paid')
            ->whereNull('deleted_at')
            ->where('order_status', '!=', 'Cancelled')
            ->where('order_status', '!=', 'Expired')
            ->sum('num_of_rooms');
    }

    /**
     * Get all available rooms for given dates
     * 
     * @param string $startDate
     * @param string $endDate
     * @return array
     */
    public function getAllAvailableRooms($startDate, $endDate)
    {
        $roomGroups = RoomGroup::where('status', 'Active')->get();
        $availableRooms = [];

        foreach ($roomGroups as $roomGroup) {
            $availability = $this->checkAvailability(
                $roomGroup->id, 
                $startDate, 
                $endDate
            );

            if ($availability['available_rooms'] > 0) {
                $availableRooms[] = [
                    'room_group' => $roomGroup,
                    'availability' => $availability
                ];
            }
        }

        return $availableRooms;
    }

    /**
     * Validate booking request before processing
     * 
     * @param array $bookingData
     * @return array
     */
    public function validateBookingRequest($bookingData)
    {
        $roomGroup = RoomGroup::where('name', $bookingData['room'])->first();
        
        if (!$roomGroup) {
            return [
                'valid' => false,
                'message' => 'Invalid room type selected'
            ];
        }

        $availability = $this->checkAvailability(
            $roomGroup->id,
            $bookingData['checkin'],
            $bookingData['checkout'],
            $bookingData['num_of_rooms']
        );

        return [
            'valid' => $availability['available'],
            'message' => $availability['message'],
            'availability' => $availability
        ];
    }
}