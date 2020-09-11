<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;

use App\User;
use App\Models\UserMeta;

use App\Helpers\UploadImg;

use App\Events\AfterRegisterMember;

class UserController extends Controller
{
	public function __construct()
	{
		$this->user = new User;
		$this->userMeta = new UserMeta;
	}

	public function regis(Request $request)
	{
		return view('test');
	}

	private function validateRegister($request)
	{
		$validator = Validator::make($request, [
			'first_name' => 'required',
			'first_name' => 'required',
			'phone' => 'required|unique:users,phone',
			'password' => 'required|min:6|max:32|confirmed'
		]);
		if ($validator->fails()) {
			if ($validator->errors()->first('phone') != null) {
				return "phone đã tồn tại!";
			} else if($validator->errors()->first('password') != null) {
				return $validator->errors()->first('password');
			}
		}
	}

	public function register(Request $request)
	{
		$resultValidate = $this->validateRegister($request->all());
		if ($resultValidate != "") {
			return response()->json([
				"status" => false,
				"message" => $resultValidate
			]);
		} else {
			return response()->json([
				"status" => true,
				"message" => trans('messages.Enter the verification code received from the system'),
			]);
		}
	}

	public function confirmRegister(Request $request)
	{
		$request->merge([
			'password' => bcrypt($request->password)
		]);
		$request->request->add([
			'phone_verified_at' => now()
		]);
		$params = $request->only('first_name', 'last_name', 'phone', 'password', 'phone_verified_at');
		$resultRegister = $this->user->addNewUser($params);
		if ($resultRegister) {
			Auth::login($resultRegister);
			$data['url'] = route('membership');
			return response()->json([
				'status' => true,
				'message' => trans('messages.Register successfully'),
				'data' => $data
			]);
		} else {
			return response()->json([
				'status' => false,
				'message' => trans('messages.Register error')
			]);
		}
	}

	private function validateLogin($request)
	{
		$validator = Validator::make($request, [
			'phone' => 'required',
			'password' => 'required|min:6|max:32'
		]);
		if ($validator->fails()) {
			if ($validator->errors()->first('phone') != null) {
				return $validator->errors()->first('phone');
			} else if($validator->errors()->first('password') != null) {
				return $validator->errors()->first('password');
			}
		}
	}

	public function login(Request $request)
	{
		$resultValidate = $this->validateLogin($request->all());
		if ($resultValidate != "") {
			return response()->json([
				"status" => false,
				"message" => $resultValidate
			]);
		}
		$credentials = [
			'phone' => $request->phone,
			'password' => $request->password
		];
		if (Auth::attempt($credentials)) {
			$user = Auth::user();
			if ($user->type_user === 0) {
				return response()->json([
					'status' => false,
					'message' => trans('messages.You are not a Rose Villa Saigon member')
				]);
			} else {
				$data = array();
				$data['url'] = route('welcome');
				return response()->json([
					'status' => true,
					'message' => trans('messages.Login successfully'),
					'data' => $data
				]);
			}
		} else {
			return response()->json([
				'status' => false,
				'message' => trans('messages.Phone or password is not correct')
			]);
		}
	}

	private function validateRegisterMembership($request)
	{
		$validator = Validator::make($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email|unique:users,email|unique:user_metas,email',
			'phone' => 'required|unique:users,phone|unique:user_metas,phone',
			'gender' => 'required|min:0|max:3',
			'dob' => 'required|date|before:-18years',
			'occupation' => 'required',
			'address_one' => 'required',
			'city' => 'required',
			'post_code' => 'required',
			'country' => 'required',
			'avatar' => 'required',
			'type_user' => 'required|integer|in:'.config('constants.MEMBERSHIP_TYPE_FOUNDER').','.config('constants.MEMBERSHIP_TYPE_REGULAR'),
			'reason' => 'required_if:type_user,2',
			'usage_criteria' => 'required_if:type_user,2',
			'bring_to' => 'required_if:type_user,2',
			'member_other' => 'required_if:type_user,2',
			'membership_type' => 'required|min:1|max:9',
			'frequency' => 'required|in:month_3,month_12'
		],
		[
			'dob.before' => trans('messages.Members must be over 18 years old')
		]);
		if ($validator->fails()) {
			if ($validator->errors()->first('first_name') != null) {
				return $validator->errors()->first('first_name');
			} else if($validator->errors()->first('last_name') != null) {
				return $validator->errors()->first('last_name');
			} else if($validator->errors()->first('email') != null) {
				return $validator->errors()->first('email');
			} else if($validator->errors()->first('phone') != null) {
				return $validator->errors()->first('phone');
			} else if($validator->errors()->first('gender') != null) {
				return $validator->errors()->first('gender');
			} else if($validator->errors()->first('dob') != null) {
				return $validator->errors()->first('dob');
			} else if($validator->errors()->first('occupation') != null) {
				return $validator->errors()->first('occupation');
			} else if($validator->errors()->first('address_one') != null) {
				return $validator->errors()->first('address_one');
			} else if($validator->errors()->first('city') != null) {
				return $validator->errors()->first('city');
			} else if($validator->errors()->first('post_code') != null) {
				return $validator->errors()->first('post_code');
			} else if($validator->errors()->first('country') != null) {
				return $validator->errors()->first('country');
			} else if($validator->errors()->first('avatar') != null) {
				return $validator->errors()->first('avatar');
			} else if($validator->errors()->first('type_user') != null) {
				return $validator->errors()->first('type_user');
			} else if($validator->errors()->first('reason') != null) {
				return $validator->errors()->first('reason');
			} else if($validator->errors()->first('usage_criteria') != null) {
				return $validator->errors()->first('usage_criteria');
			} else if($validator->errors()->first('bring_to') != null) {
				return $validator->errors()->first('bring_to');
			} else if($validator->errors()->first('member_other') != null) {
				return $validator->errors()->first('member_other');
			} else if($validator->errors()->first('membership_type') != null) {
				return $validator->errors()->first('membership_type');
			} else if($validator->errors()->first('frequency') != null) {
				return $validator->errors()->first('frequency');
			}
		}
	}

	public function registerMembership(Request $request)
	{
		$resultValidate = $this->validateRegisterMembership($request->all());
		if ($resultValidate != "") {
			return response()->json([
				"status" => false,
				"message" => $resultValidate
			]);
		}
		$avatar = null;
		$folder = 'avatar';
		if($request->avatar){
			$avatar = UploadImg::UploadImg($request->avatar, $folder);
		}else{
			$avatar = null;
		}
		$request->merge([
			'avatar' => $avatar,
			'membership_type_id' => $request->membership_type
		]);
		$userMeta;
		DB::beginTransaction();
		try {
			$paramUserMeta = $request->only('first_name', 'last_name', 'email', 'phone', 'gender', 'dob', 'occupation', 'address_one', 'address_two', 'city', 'post_code', 'country', 'avatar', 'type_user', 'membership_type_id', 'frequency');
			if ($request->type_user == 2) {
				$paramUserMeta['reason'] =  $request->reason;
				$paramUserMeta['usage_criteria'] =  $request->usage_criteria;
				$paramUserMeta['bring_to'] =  $request->bring_to;
				$paramUserMeta['member_other'] =  $request->member_other;
			}
			$userMeta = $this->userMeta->addNewUserMeta($paramUserMeta);

			DB::commit();
		} catch (\Exception $ex) {
			DB::rollBack();
			return response()->json([
				'status' => false,
				'message' => trans('messages.Member registration error'),
			]);
		}
		event(new AfterRegisterMember($userMeta));
		return response()->json([
			'status' => true,
			'message' => trans('messages.Member registration successfully'),
		]);
	}

	private function validateEmailPhone($request)
	{
		$validator = Validator::make($request, [
			'email' => 'required|email|unique:users,email|unique:user_metas,email',
			'phone' => 'required|unique:users,phone|unique:user_metas,phone',
		]);
		if ($validator->fails()) {
			if ($validator->errors()->first('email') != null) {
				return $validator->errors()->first('email');
			} else if($validator->errors()->first('phone') != null) {
				return $validator->errors()->first('phone');
			}
		}
	}

	public function checkPhoneEmail(Request $request)
	{
		$resultValidate = $this->validateEmailPhone($request->all());
		if ($resultValidate != "") {
			return response()->json([
				"status" => false,
				"message" => $resultValidate
			]);
		}
		return response()->json([
			'status' => true,
			'message' => trans('messages.You can use this email & phone'),
		]);
	}

	private function validateChangeProfile($request)
	{
		$validator = Validator::make($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'gender' => 'required|min:0|max:3',
			'dob' => 'required|date|before:-18years',
			'occupation' => 'required',
			'address_one' => 'required',
			'city' => 'required',
			'post_code' => 'required',
			'country' => 'required',
			'avatar' => 'required',
			'reason' => 'required_if:type_user,2',
			'usage_criteria' => 'required_if:type_user,2',
			'bring_to' => 'required_if:type_user,2',
			'member_other' => 'required_if:type_user,2',
		],
		[
			'dob.before' => trans('messages.Members must be over 18 years old')
		]);
		if ($validator->fails()) {
			if ($validator->errors()->first('first_name') != null) {
				return $validator->errors()->first('first_name');
			} else if($validator->errors()->first('last_name') != null) {
				return $validator->errors()->first('last_name');
			}else if($validator->errors()->first('gender') != null) {
				return $validator->errors()->first('gender');
			} else if($validator->errors()->first('dob') != null) {
				return $validator->errors()->first('dob');
			} else if($validator->errors()->first('occupation') != null) {
				return $validator->errors()->first('occupation');
			} else if($validator->errors()->first('address_one') != null) {
				return $validator->errors()->first('address_one');
			} else if($validator->errors()->first('city') != null) {
				return $validator->errors()->first('city');
			} else if($validator->errors()->first('post_code') != null) {
				return $validator->errors()->first('post_code');
			} else if($validator->errors()->first('country') != null) {
				return $validator->errors()->first('country');
			} else if($validator->errors()->first('avatar') != null) {
				return $validator->errors()->first('avatar');
			} else if($validator->errors()->first('reason') != null) {
				return $validator->errors()->first('reason');
			} else if($validator->errors()->first('usage_criteria') != null) {
				return $validator->errors()->first('usage_criteria');
			} else if($validator->errors()->first('bring_to') != null) {
				return $validator->errors()->first('bring_to');
			} else if($validator->errors()->first('member_other') != null) {
				return $validator->errors()->first('member_other');
			}
		}
	}


	public function changeProfile(Request $request)
	{
		$resultValidate = $this->validateChangeProfile($request->all());
		if ($resultValidate != "") {
			return response()->json([
				"status" => false,
				"message" => $resultValidate
			]);
		}
		$params = $request->only('first_name', 'last_name', 'gender', 'dob', 'occupation', 'address_one', 'address_two', 'city', 'post_code', 'country', 'reason', 'usage_criteria', 'bring_to', 'member_other');
		$folder = 'avatar';
		if($request->avatar){
			$avatar = UploadImg::UploadImg($request->avatar, $folder);
			$params['avatar'] = $avatar;
		}
		$resultChange = $this->user->editUserById(Auth::id(), $params);
		if ($resultChange) {
			return response()->json([
				'status' => true,
				'message' => trans('messages.Change profile successfully'),
			]);
		} else {
			return response()->json([
				'status' => false,
				'message' => trans('messages.Change profile error'),
			]);
		}
	}
}
