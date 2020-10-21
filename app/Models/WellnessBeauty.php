<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;
class WellnessBeauty extends Model
{
	use SoftDeletes,Translatable;

	protected $fillable = ['name','slug', 'description', 'thumbnail', 'gallery', 'gallery'];
	 /*translate*/
    protected $translatable = ['description', 'name','slug'];

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
