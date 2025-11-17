<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RoomGroup;
use App\Traits\RoomBookingTrait;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class RoomAvailabilityController extends Controller
{
    use RoomBookingTrait;

    /**
     * Check availability for specific room type and dates
     */
    public function checkAvailability(Request $request): JsonResponse
    {
        $request->validate([
            'room_group_id' => 'required|integer|exists:room_groups,id',
            'checkin' => 'required|date|after_or_equal:today',
            'checkout' => 'required|date|after:checkin',
            'num_of_rooms' => 'required|integer|min:1|max:10'
        ]);

        $availability = $this->checkAvailability(
            $request->room_group_id,
            $request->checkin,
            $request->checkout,
            $request->num_of_rooms
        );

        return response()->json($availability);
    }

    /**
     * Get all available rooms for given dates
     */
    public function getAllRooms(Request $request): JsonResponse
    {
        $request->validate([
            'checkin' => 'required|date|after_or_equal:today',
            'checkout' => 'required|date|after:checkin',
        ]);

        $availableRooms = $this->getAllAvailableRooms(
            $request->checkin,
            $request->checkout
        );

        // Format response for frontend
        $formattedRooms = collect($availableRooms)->map(function ($item) {
            $roomGroup = $item['room_group'];
            $availability = $item['availability'];

            return [
                'id' => $roomGroup->id,
                'name' => $roomGroup->name,
                'short_name' => $roomGroup->short_name,
                'price' => $roomGroup->price,
                'images' => json_decode($roomGroup->images, true),
                'description' => $roomGroup->desc,
                'amenities' => $roomGroup->amenities,
                'guest' => $roomGroup->guest,
                'bed' => $roomGroup->bed,
                'bath' => $roomGroup->bath,
                'available_rooms' => $availability['available_rooms'],
                'max_bookable' => min($availability['available_rooms'], 5) // Limit to 5 rooms per booking
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $formattedRooms,
            'message' => 'Available rooms retrieved successfully'
        ]);
    }

    /**
     * Validate booking before processing
     */
    public function validateBooking(Request $request): JsonResponse
    {
        $request->validate([
            'room' => 'required|string|exists:room_groups,name',
            'checkin' => 'required|date|after_or_equal:today',
            'checkout' => 'required|date|after:checkin',
            'num_of_rooms' => 'required|integer|min:1|max:10'
        ]);

        $validation = $this->validateBookingRequest($request->only([
            'room', 'checkin', 'checkout', 'num_of_rooms'
        ]));

        return response()->json([
            'success' => $validation['valid'],
            'message' => $validation['message'],
            'data' => $validation['availability'] ?? null
        ]);
    }

    /**
     * Get room group details with current availability
     */
    public function getRoomDetails($id): JsonResponse
    {
        $roomGroup = RoomGroup::findOrFail($id);
        
        // Get current availability (next 30 days)
        $today = Carbon::today();
        $nextMonth = $today->copy()->addDays(30);
        
        $currentAvailability = $this->checkAvailability(
            $id,
            $today->toDateString(),
            $nextMonth->toDateString(),
            1
        );

        return response()->json([
            'success' => true,
            'data' => [
                'room_group' => $roomGroup,
                'current_availability' => $currentAvailability
            ]
        ]);
    }
}
