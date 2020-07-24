<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

use App\User;
use App\Models\UserMeta;

class UserController extends Controller
{
	public function __construct()
	{
		$this->user = new User;
		$this->userMeta = new UserMeta;
	}

	public function regis(Request $request){
		return view('test');
	}

	public function register(Request $request)
	{
		$request->merge([
			'password' => bcrypt($request->password)
		]);
		$params = $request->only('first_name', 'last_name', 'phone', 'password');
		$resultRegister = $this->user->addNewUser($params);
		if ($resultRegister) {
			return response()->json([
				'status' => 'success',
				'message' => 'Register successfully'
			]);
		} else {
			return response()->json([
				'status' => 'error',
				'message' => 'Register error'
			]);
		}
	}

	public function login(Request $request)
	{
		$credentials = [
			'phone' => $request->phone,
			'password' => $request->password
		];
		if (Auth::attempt($credentials)) {
			$user = Auth::user();
			if ($user->type_user === 0) {
				return response()->json([
					'status' => 'error',
					'message' => 'Please add registration form'
				]);
			} else {
				if ($user->statusUserMeta === 0) {
					return response()->json([
						'status' => 'error',
						'message' => 'Your registration form is watting approve'
					]);
				} else {
					return response()->json([
						'status' => 'success',
						'message' => 'Login successfully'
					]);
				}
			}
		} else {
			return response()->json([
				'status' => 'error',
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
				'status' => 'error',
				'message' => "Member registration error",
			]);
		}
		return response()->json([
			'status' => 'success',
			'message' => "Member registration successfully",
		]);
	}
}
