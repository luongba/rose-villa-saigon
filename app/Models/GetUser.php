<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GetUser extends Model
{
    protected $fillable = ['role_id','first_name', 'last_name', 'email', 'avatar', 'type_user', 'password', 'phone', 'gender', 'dob', 'occupation', 'address_one', 'address_two', 'city', 'post_code', 'country', 'status', 'remember_token', 'setting', 'reason'];
    public $table = 'users';
}
