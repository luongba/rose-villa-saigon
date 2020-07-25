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

	public function registerMembership(Request $request)
	{
		DB::beginTransaction();
		try {
			$avatar = "avatar.png";
			$pack = 1;

			$paramUser = $request->only('first_name', 'last_name', 'email', 'gender', 'dob', 'occupation', 'address_one', 'address_two', 'city', 'post_code', 'country', 'avatar');
			$this->user->editUserById(Auth::id(), $paramUser);

			$request->request->add([
				'user_id' => Auth::id()
			]);
			$paramUserMeta = $request->only('user_id', 'reason', 'usage_criteria', 'bring_to', 'member_other');
			$this->userMeta->addNewUserMeta($paramUserMeta);

			$this->membershipType()->sync($pack);

			DB::commit();
		} catch (\Exception $ex) {
			DB::rollBack();
			return response()->json([
				'status' => false,
				'message' => "Member registration error",
			]);
		}
		return response()->json([
			'status' => true,
			'message' => "Member registration successfully",
		]);
	}
}
