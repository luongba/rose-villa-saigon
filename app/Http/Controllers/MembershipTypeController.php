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
		$arrIdPack = array();
		if ($request->type == config('constants.MEMBERSHIP_TYPE_FOUNDER')) {
			if ($year >= 18 && $year <= 30) {
				$arrIdPack = [9, 11];
			} else {
				$arrIdPack = [8, 10];
			}
		} elseif ($request->type == config('constants.MEMBERSHIP_TYPE_REGULAR')) {
			if ($request->city == "Hồ Chí Minh" || $request->city == 'ho-chi-minh') {
				if ($year >= 18 && $year <= 30) {
					$arrIdPack = [15, 16];
				} else {
					$arrIdPack = [13, 14];
				}
			} else {
				if ($year >= 18 && $year <= 30) {
					$arrIdPack = [15, 16, 19, 20];
				} else {
					$arrIdPack = [13, 14, 17, 18];
				}
			}
		}
		$arrPack = $this->membershipType->with('benefitMembers:name')
		->whereIn('id', $arrIdPack)
		->where('type', $request->type)
		->get(['id', 'name', 'price'])->toArray();
		//getTranslatedAttribute('name', config('app.locale'), 'fallbackLocale')
		/*$arrPack = $this->membershipType
		->whereIn('id', $arrIdPack)
		->where('type', $request->type)
		->get();
		foreach ($arrPack as $value) {
			return $value->benefitMembers->translate('name',  config('app.locale'),'fallbackLocale');
		}
		return $arrPack;*/

		$result = array();
		foreach($arrPack as $data){
			$item['id'] = $data['id'];
			$item['name'] = $data['name'];
			$price = array_filter($data['price'], function($value) {
				return $value['price'] != null; 
			});
			$item['price'] = $price;
			$item['benefit_members'] = $data['benefit_members'];
			$result[] = $item;
		}
		return $result;
	}
}
