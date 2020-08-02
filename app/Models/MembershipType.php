<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Eloquent\SoftDeletes;

class MembershipType extends Model
{
    use Sluggable, SoftDeletes,SluggableScopeHelpers;

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
    protected $fillable = ['name', 'slug', 'logo', 'day', 'description', 'status'];

	protected $casts = [
        'price' => 'array'
    ]; 
	
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
