<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
	protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'gender', 'dob', 'occupation', 'address_one', 'address_two', 'city', 'post_code', 'country', 'avatar', 'type_user', 'reason', 'usage_criteria', 'bring_to', 'member_other', 'membership_type_id', 'status'];

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
