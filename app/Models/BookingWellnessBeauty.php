<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingWellnessBeauty extends Model
{
	protected $fillable = ['name', 'email', 'phone', 'number_guest', 'wellness_beauty_id', 'start_at', 'description', 'status'];
	
    public function wellnessBeauty()
	{
		return $this->belongsTo('App\Models\WellnessBeauty');
	}

	/*QUERY DATABASE*/
	/*public function listWellnessBeauty()
	{
		return static::all();
	}*/

    public function addNewWellnessBeauty($param)
    {
        return static::create($param);
    }
    /*END QUERY DATABASE*/

    /*ATTRIBUTE*/
    public function getNameWellnessBeautyAttribute()
    {
        return optional($this->wellnessBeauty)->name;
    }
    /*END ATTRIBUTE*/
}
