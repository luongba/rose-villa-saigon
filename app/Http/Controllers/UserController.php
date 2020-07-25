<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;

use App\User;
use App\Models\UserMeta;

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
				"message" => "Nhập mã xác minh nhận được từ hệ thống",
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
			return response()->json([
				'status' => true,
				'message' => 'Register successfully'
			]);
		} else {
			return response()->json([
				'status' => false,
				'message' => 'Register error'
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
				$data['url'] = route('membership');
				return response()->json([
					'status' => false,
					'message' => 'Please add registration form',
					'data' => $data
				]);
			} else {
				if ($user->statusUserMeta === 0) {
					return response()->json([
						'status' => false,
						'message' => 'Your registration form is watting approve'
					]);
				} else {
					return response()->json([
						'status' => true,
						'message' => 'Login successfully'
					]);
				}
			}
		} else {
			return response()->json([
				'status' => false,
				'message' => 'Phone or password is not correct'
			]);
		}
	}

	private function validateRegisterMembership($request)
	{
		$validator = Validator::make($request, [
            'first_name' => 'required',
            'last_name' => 'required|email',
            'email' => 'required|email',
            'gender' => 'required|min:0|max:1',
            'dob' => 'required',
            'occupation' => 'required',
            'address_one' => 'required',
            'address_two' => 'required',
            'city' => 'required',
            'post_code' => 'required',
            'country' => 'required',
            'post_code' => 'required',
            'avatar' => 'required',
            'type_user' => 'required',
            'reason' => 'required',
            'usage_criteria' => 'required',
            'bring_to' => 'required',
            'member_other' => 'required',
            'membership_type' => 'required|min:1|max:2',
        ]);
        if ($validator->fails()) {
            if ($validator->errors()->first('first_name') != null) {
                return $validator->errors()->first('first_name');
            } else if($validator->errors()->first('last_name') != null) {
                return $validator->errors()->first('last_name');
            } else if($validator->errors()->first('email') != null) {
                return $validator->errors()->first('email');
            } else if($validator->errors()->first('gender') != null) {
                return $validator->errors()->first('gender');
            } else if($validator->errors()->first('dob') != null) {
                return $validator->errors()->first('dob');
            } else if($validator->errors()->first('occupation') != null) {
                return $validator->errors()->first('occupation');
            } else if($validator->errors()->first('address_one') != null) {
                return $validator->errors()->first('address_one');
            } else if($validator->errors()->first('address_two') != null) {
                return $validator->errors()->first('address_two');
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
		DB::beginTransaction();
		try {
			$avatar = 'avatar.png';

			$paramUser = $request->only('first_name', 'last_name', 'email', 'gender', 'dob', 'occupation', 'address_one', 'address_two', 'city', 'post_code', 'country', 'avatar', 'type_user');
			$this->user->editUserById(Auth::id(), $paramUser);

			$request->request->add([
				'user_id' => Auth::id()
			]);
			$paramUserMeta = $request->only('user_id', 'reason', 'usage_criteria', 'bring_to', 'member_other');
			$this->userMeta->addNewUserMeta($paramUserMeta);

			$this->membershipType()->sync($request->membership_type);

			DB::commit();
		} catch (\Exception $ex) {
			DB::rollBack();
			return response()->json([
				'status' => false,
				'message' => 'Member registration error',
			]);
		}
		return response()->json([
			'status' => true,
			'message' => 'Member registration successfully',
		]);
	}
}
