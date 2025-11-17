<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
class Room extends Model
{
  use HasFactory;

  protected $fillable = [
    'room_category_id',
    'room_group_id',
    'room_no',
    'no_of_beds',
    'status',
    'slug'
  ];
  public function setRoomNoAttribute($value){
      $this->attributes['room_no'] = $value;
      $this->attributes['slug'] = Str::slug($value).time();
  }
//   public function category()
//   {
//     return $this->belongsTo(RoomCategory::class, 'room_category_id');
//   }
  public function group()
  {
    return $this->belongsTo(RoomGroup::class, 'room_group_id');
  }




  /**
   * scope a query to only those rooms whose status is show.
   *
   * @param  \Illuminate\Database\Eloquent\Builder  $query
   * @return \Illuminate\Database\Eloquent\Builder
   */
  public function scopeStatus($query)
  {
    return $query->where('status', 1);
  }
}
