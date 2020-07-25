<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'role_id', 'email', 'avatar', 'type_user', 'password', 'phone', 'gender', 'dob', 'occupation', 'address_one', 'address_two', 'city', 'post_code', 'country', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    public function membershipType()
    {
        return $this->belongsToMany('App\Models\MembershipType');
    }

    public function userMetas()
    {
        return $this->hasMany('App\Models\UserMeta');
    }

    /*QUERY DATABASE*/
    public function addNewUser($param)
    {
        return static::create($param);
    }

    public function editUserById($id, $param)
    {
        return static::where('id', $id)->update($param);
    }
    /*END QUERY DATABASE*/

    /*ATTRIBUTE*/
    public function getStatusUserMetaAttribute()
    {
        return optional($this->userMetas)->status;
    }
    /*END ATTRIBUTE*/
}
