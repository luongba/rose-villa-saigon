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

    /*QUERY DATABASE*/
    public function listRoom()
    {
    	return static::all();
    }
    /*END QUERY DATABASE*/
}
