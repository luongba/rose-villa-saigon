<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BenefitMember extends Model
{
    use Sluggable,SluggableScopeHelpers;

    protected $fillable = ['name', 'slug', 'description'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

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
