<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomTrackingVisit extends Model
{
    protected $fillable = [
        'tracking_link_id',
        'visitor_ip',
        'visitor_id',
        'user_agent',
        'referer_url',
        'room_group_viewed',
        'is_unique',
        'visited_at',
    ];

    protected $casts = [
        'is_unique' => 'boolean',
        'visited_at' => 'datetime',
    ];

    public $timestamps = false;

    public function trackingLink()
    {
        return $this->belongsTo(RoomTrackingLink::class);
    }
}
