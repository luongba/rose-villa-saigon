<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingRoom extends Model
{
    protected $fillable = [];

    public function room()
	{
		return $this->belongsTo('App\Models\Room');
	}

	/*QUERY DATABASE*/
    public function addNewBookingRoom($param)
    {
        return static::create($param);
    }
    /*END QUERY DATABASE*/

    /*ATTRIBUTE*/
    public function getNameRoomAttribute()
    {
        return optional($this->room)->name;
    }
    /*END ATTRIBUTE*/
}
