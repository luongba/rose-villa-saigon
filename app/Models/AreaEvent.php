<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;

class AreaEvent extends Model
{
	use SoftDeletes, Translatable;

	protected $fillable = ['title', 'description', 'thumbnail', 'gallery', 'status','slug'];

	 /*translate*/
    protected $translatable = ['description', 'title','slug'];
	
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
    public function getListImageGalleryAttribute(){
        if($this -> gallery != null){
            $list_img = json_decode($this -> gallery);
            foreach ($list_img as $value) {
                $item['url']= asset('').'public/storage/'.$value;
                $list_id_gallery[] = $item;
            }
            return $list_id_gallery;
        }
    }
}
