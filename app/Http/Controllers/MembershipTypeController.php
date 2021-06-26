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
			'type' => 'required|integer|in:'.config('constants.MEMBERSHIP_TYPE_FOUNDER').','.config('constants.MEMBERSHIP_TYPE_REGULAR').','.config('constants.MEMBERSHIP_TYPE_EARLY_FOUNDER')
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
				if ($year >= 18 && $year <= 30) {
					$arrIdPack = [15, 16];
				} else {
					$arrIdPack = [13, 14];
				}
		$arrPack = $this->membershipType
		->whereIn('id', $arrIdPack)
		->where('type', $request->type)
		->get();

		$result = array();
		foreach($arrPack as $data){
			$item['id'] = $data->id;
			$item['name'] = $data->getTranslatedAttribute('name',  config('app.locale'),'fallbackLocale');
			$price = array_filter($data->price, function($value) {
				return $value['price'] != null; 
			});
			$item['price'] = $price;
			$item['benefit_members'] = $data->benefitMembers->translate('name',  config('app.locale'),'fallbackLocale');
			$result[] = $item;
		}
		return $result;
	}
}
