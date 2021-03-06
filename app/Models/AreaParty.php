<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;
class AreaParty extends Model
{
    use SoftDeletes,Translatable;

    protected $fillable = ['title', 'description', 'thumbnail', 'gallery', 'status','slug'];
     /*translate*/
    protected $translatable = ['description', 'title','slug'];
    
	public function bookingParties()
	{
		return $this->hasMany('App\Models\BookingParty');
        
	}
	
    /*QUERY DATABASE*/
    public function listAreaParty()
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
