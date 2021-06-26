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
use App\Http\Requests\CheckLogin;
session_start();
class UsersController extends Controller
{
	public function index(){

		return view('pages.login');
	}
    public function login(CheckLogin $request){
    	$route =  Session::get('route');
        		$credentials = [
			
			'phone' => $request->phone,
			'password' => $request->password,
		];
		if (Auth::attempt($credentials)) {
			$user = Auth::user();
			if ($user->type_user === 0) {
				$data = array();
				$data['url'] = route('welcome');
				return Redirect::to($route);
			} else {
				$data = array();
				$data = array();
				$data['url'] = route('welcome');
				return Redirect::to($route);
			}
		} else {
			Session::put('messages','Tài khoản hoặc mật khẩu không chính xác !');
			return Redirect::to('/login');
		}
    }
}
