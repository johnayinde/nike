<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class RoomGroup extends Model
{
    use HasFactory;

    protected $fillable = ['hotel_id', 'name','short_name', 'images', 'price', 'bed', 'bath', 'guest', 'status', 'no_of_rooms', 'no_of_reserved_rooms', 'no_of_booked_rooms',
    'desc','amenities', 'room_group_short_code',
     'slug'];

     protected $casts =[
        'amenities' =>'array'
     ];
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value) . time();
    }
    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }
    public function getImagesAttribute()
    {
        return json_decode($this->attributes['images']);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_group_id');
    }
    public function room_booking()
    {
        return $this->hasMany(Booking::class, 'room');
    }

    /**
     * Get future bookings for this room group
     */
    public function futureBookings()
    {
        return $this->hasMany(Booking::class, 'room')
            ->where('checkin', '>', now())
            ->where('payment_status', 'Paid');
    }

    /**
     * Get current active bookings (checked in but not checked out)
     */
    public function activeBookings()
    {
        return $this->hasMany(Booking::class, 'room')
            ->where('checkin', '<=', now())
            ->where('checkout', '>=', now())
            ->where('payment_status', 'Paid')
            ->where('order_status', 'Occupied');
    }

    /**
     * Calculate total reserved rooms from future bookings
     */
    public function getTotalReservedRoomsAttribute()
    {
        return $this->futureBookings()->sum('num_of_rooms');
    }

    /**
     * Calculate total occupied rooms from active bookings
     */
    public function getTotalOccupiedRoomsAttribute()
    {
        return $this->activeBookings()->sum('num_of_rooms');
    }

    /**
     * Get available rooms count
     */
    public function getAvailableRoomsAttribute()
    {
        return max(0, $this->no_of_rooms - ($this->no_of_reserved_rooms ?? 0) - ($this->no_of_booked_rooms ?? 0));
    }

    /**
     * Update reserved rooms count
     */
    public function updateReservedRooms()
    {
        $this->update([
            'no_of_reserved_rooms' => $this->total_reserved_rooms
        ]);
    }

    /**
     * Update booked rooms count when reservations are processed
     */
    public function updateBookedRooms()
    {
        $this->update([
            'no_of_booked_rooms' => $this->total_occupied_rooms
        ]);
    }
}
