<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['checkin', 'checkout'];

    /**
     * Get the user that owns the images
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
