<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;

use App\Models\MembershipType;

class MembershipTypeController extends Controller
{
	public function __construct()
	{
		$this->membershipType = new MembershipType;
	}

	private function validateListMembershipType($request)
	{
		$validator = Validator::make($request, [
			'dob' => 'required|date|before:-18years',
			'city' => 'required',
			'type' => 'required|integer|in:'.config('constants.MEMBERSHIP_TYPE_FOUNDER').','.config('constants.MEMBERSHIP_TYPE_REGULAR')
		],
		[
			'dob.before' => 'Thành viên phải trên 18 tuổi'
		]);
		if ($validator->fails()) {
			if ($validator->errors()->first('dob') != null) {
				return $validator->errors()->first('dob');
			} elseif ($validator->errors()->first('city') != null) {
				return $validator->errors()->first('city');
			} elseif ($validator->errors()->first('type') != null) {
				return $validator->errors()->first('type');
			}
		}
	}

	public function list(Request $request)
	{
		$resultValidate = $this->validateListMembershipType($request->all());
		if ($resultValidate != "") {
			return response()->json([
				"status" => false,
				"message" => $resultValidate
			]);
		}
		$year = Carbon::now()->diffInYears(Carbon::parse($request->dob));
		$data = array();
		if ($year >= 18 && $year <= 30) {
			$data = $this->membershipType->with('benefitMembers:name')
			->whereIn('id', [9, 10])
			->where('type', $request->type)
			->get(['id', 'name', 'price'])->toArray();
		} else {
			$data = $this->membershipType->with('benefitMembers:name')
			->whereIn('id', [8])
			->where('type', $request->type)
			->get(['id', 'name', 'price'])->toArray();
		}
		if ($request->city != "Thành phố Hồ Chí Minh") {
			//traveller
			$traveller = $this->membershipType->with('benefitMembers:name')
			->whereIn('id', [])
			->where('type', $request->type)
			->get(['id', 'name', 'price'])->toArray();
			$data = array_merge($data, $traveller);
		}
		return $data;
	}
}
