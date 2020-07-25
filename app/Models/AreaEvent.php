<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaEvent extends Model
{
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
}
