<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'uploaded_on' => 'datetime',
    ];

    /**
     * Get the user that owns the images
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
