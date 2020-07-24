<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipType extends Model
{
	public function benefitMembers()
	{
		return $this->belongsToMany('App\Models\BenefitMember', 'membership_type_benefit_members', 'membership_type_id', 'benefit_member_id');
	}

    /*QUERY DATABASE*/
    public function listMembershipType()
    {
        return static::all();
    }
    /*END QUERY DATABASE*/
}
