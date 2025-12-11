<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RoomTrackingLink extends Model
{
    protected $fillable = [
        'room_group_id',
        'user_id',
        'link_code',
        'link_name',
        'description',
        'full_url',
        'clicks',
        'unique_clicks',
        'bookings_count',
        'total_nights_booked',
        'revenue_generated',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'clicks' => 'integer',
        'unique_clicks' => 'integer',
        'bookings_count' => 'integer',
        'total_nights_booked' => 'integer',
        'revenue_generated' => 'decimal:2',
    ];

    // Relationships
    public function roomGroup()
    {
        return $this->belongsTo(RoomGroup::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'tracking_link_id');
    }

    public function visits()
    {
        return $this->hasMany(RoomTrackingVisit::class);
    }

    // Helper methods
    public function getRoomNameAttribute()
    {
        return $this->room_group_id ? $this->roomGroup->name : 'All Rooms';
    }

    public static function generateUniqueCode($baseName)
    {
        $slug = Str::slug($baseName);
        $code = $slug;
        $counter = 1;

        while (self::where('link_code', $code)->exists()) {
            $code = $slug . '-' . $counter;
            $counter++;
        }

        return $code;
    }

    public function incrementClicks($isUnique = false)
    {
        $this->increment('clicks');
        if ($isUnique) {
            $this->increment('unique_clicks');
        }
    }

    public function recordBooking($amount, $nights, $numRooms)
    {
        $this->increment('bookings_count');
        $this->increment('total_nights_booked', $nights * $numRooms);
        $this->increment('revenue_generated', $amount);
    }

    public function getAverageNightsPerBookingAttribute()
    {
        if ($this->bookings_count == 0) return 0;
        return round($this->total_nights_booked / $this->bookings_count, 1);
    }

    public function getAverageRevenuePerBookingAttribute()
    {
        if ($this->bookings_count == 0) return 0;
        return round($this->revenue_generated / $this->bookings_count, 2);
    }
}
