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
			'dob.before' => trans('messages.Members must be over 18 years old')
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
			->whereIn('id', [4, 5, 9, 11])
			->where('type', $request->type)
			->get(['id', 'name', 'price'])->toArray();
		} else {
			$data = $this->membershipType->with('benefitMembers:name')
			->whereIn('id', [2, 3, 8, 10])
			->where('type', $request->type)
			->get(['id', 'name', 'price'])->toArray();
		}
		if ($request->city != "Hồ Chí Minh") {
			//traveller
			$traveller = $this->membershipType->with('benefitMembers:name')
			->whereIn('id', [6, 7])
			->where('type', $request->type)
			->get(['id', 'name', 'price'])->toArray();
			$data = array_merge($data, $traveller);
		}
		return $data;
	}
}
