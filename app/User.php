<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'role_id', 'email', 'email_verified_at', 'avatar', 'type_user', 'password', 'phone', 'phone_verified_at', 'status','address_one','occupation','dob'
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
        return $this->belongsToMany('App\Models\MembershipType', 'membership_type_users', 'user_id', 'membership_type_id');
    }

    public function userMeta()
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

    public function getListAdmin()
    {
        return static::where('role_id', 1)->get();
    }
    /*END QUERY DATABASE*/

    /*ATTRIBUTE*/
    public function getFullLinkAvatarAttribute()
    {
        return asset('') . 'public/storage/' . $this->avatar;
    }
    public function memberType(){
        return $this->belongsTo('App\Models\MembershipType','membership_type_id');
    }
    /*END ATTRIBUTE*/
}
