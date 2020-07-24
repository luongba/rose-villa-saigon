<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
	protected $fillable = ['user_id', 'reason', 'usage_criteria', 'bring_to', 'member_other'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

    /*QUERY DATABASE*/
    public function addNewUserMeta($param)
    {
        return static::create($param);
    }
    /*END QUERY DATABASE*/
}
