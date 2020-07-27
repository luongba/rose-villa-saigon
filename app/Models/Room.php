<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
	use Sluggable, SoftDeletes,SluggableScopeHelpers;

	protected $fillable = ['name', 'slug', 'area', 'bed', 'person', 'benefit', 'description', 
	'url', 'status'];

     
    
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
    	return [
    		'slug' => [
    			'source' => 'name'
    		]
    	];
    }

    public function infoRoomBySlug($slug)
    {
        return static::findBySlugOrFail($slug);
    }

    /*QUERY DATABASE*/
    public function listRoom()
    {
    	return static::all();
    }
    /*END QUERY DATABASE*/
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
