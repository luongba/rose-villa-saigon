<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

	protected $fillable = ['name', 'phone', 'email', 'title', 'content', 'status'];
	
    /*QUERY DATABASE*/
    public function listContact()
    {
        return static::all();
    }

    public function addNewContact($param)
    {
        return static::create($param);
    }
    /*END QUERY DATABASE*/
}
