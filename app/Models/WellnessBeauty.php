<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WellnessBeauty extends Model
{
	use SoftDeletes;

	protected $fillable = ['name', 'description', 'thumbnail', 'gallery', 'gallery'];

    public function bookingWellnessBeauties()
	{
		return $this->hasMany('App\Models\BookingWellnessBeauty');
	}

	/*QUERY DATABASE*/
	public function listWellnessBeauty()
	{
		return static::all();
	}

    /*public function addNew($param)
    {
        return static::create($param);
    }*/
    /*END QUERY DATABASE*/
    public function getUrlThumbAttribute(){
        return asset('').'public/storage/'.$this->thumbnail;
    }
}
