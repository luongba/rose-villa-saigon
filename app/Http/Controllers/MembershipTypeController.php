<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MembershipType;

class MembershipTypeController extends Controller
{
	public function __construct()
	{
		$this->membershipType = new MembershipType;
	}

	public function list()
	{
		return $this->membershipType->with('benefitMembers:name')
		->get(['id', 'name']);
	}
}
