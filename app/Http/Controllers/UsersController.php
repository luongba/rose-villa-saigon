<?php

namespace App\Http\Controllers;
use Validator;
use Hash;
use Session;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Models\GetUser;
use Illuminate\Support\Facades\Redirect;
session_start();
class UsersController extends Controller
{
	public function index(){
		return view('login');
	}
    public function login(Request $request){
        		$credentials = [
			
			'email' => $request->email,
			'password' => $request->password,
		];
		if (Auth::attempt($credentials)) {
			$user = Auth::user();
			if ($user->type_user === 0) {
				$data = array();
				$data['url'] = route('welcome');
				return Redirect::to('/');
			} else {
				$data = array();
				$data = array();
				$data['url'] = route('welcome');
				return Redirect::to('/');
			}
		} else {
			Session::put('messages','Tài khoản hoặc mật khẩu không chính xác !');
			return Redirect::to('/loginn');
		}
    }
}
