<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaParty extends Model
{
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
}
