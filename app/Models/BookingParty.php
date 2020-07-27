<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingParty extends Model
{
	protected $fillable = ['name', 'email', 'phone', 'number_guest', 'area_party_id', 'start_at', 'description', 'status'];
	
    public function areaParty()
	{
		return $this->belongsTo('App\Models\AreaParty');
	}

	/*QUERY DATABASE*/
	/*public function listAreaParty()
	{
		return static::all();
	}*/

    public function addNewBookingParty($param)
    {
        return static::create($param);
    }
    /*END QUERY DATABASE*/

    /*ATTRIBUTE*/
    public function getTitleAreaPartyAttribute()
    {
        return optional($this->areaParty)->title;
    }
    /*END ATTRIBUTE*/
}
