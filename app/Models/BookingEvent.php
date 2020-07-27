<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingEvent extends Model
{
	protected $fillable = ['name', 'email', 'phone', 'number_guest', 'area_event_id', 'start_at', 'description', 'status'];

    public function areaEvent()
	{
		return $this->belongsTo('App\Models\AreaEvent');
	}

	/*QUERY DATABASE*/
	/*public function listAreaEvent()
	{
		return static::all();
	}*/

    public function addNewBookingEvent($param)
    {
        return static::create($param);
    }
    /*END QUERY DATABASE*/

    /*ATTRIBUTE*/
    public function getTitleAreaEventAttribute()
    {
        return optional($this->areaEvent)->title;
    }
    /*END ATTRIBUTE*/
}
