<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BenefitMember extends Model
{
	public function membershipTypes()
	{
		return $this->belongsToMany('App\Models\MembershipType', 'membership_type_benefit_members', 'benefit_member_id', 'membership_type_id');
	}

    /*QUERY DATABASE*/
    public function listBenefit()
    {
        return static::all();
    }
    /*END QUERY DATABASE*/
}
