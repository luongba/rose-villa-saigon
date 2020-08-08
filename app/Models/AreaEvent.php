<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;
class AreaEvent extends Model
{
	use SoftDeletes,Translatable;

	protected $fillable = ['title', 'description', 'thumbnail', 'gallery', 'status'];

	 /*translate*/
    protected $translatable = ['description', 'title'];
	
	public function bookingEvents()
	{
		return $this->hasMany('App\Models\BookingEvent');
	}

	/*QUERY DATABASE*/
	public function listAreaEvent()
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
