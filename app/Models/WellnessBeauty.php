<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;
class WellnessBeauty extends Model
{
	use SoftDeletes,Translatable;

	protected $fillable = ['name', 'description', 'thumbnail', 'gallery', 'gallery'];
	 /*translate*/
    protected $translatable = ['description', 'name'];

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
