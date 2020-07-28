<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerUserController as BaseVoyagerUserController;

class VoyagerUserController extends BaseVoyagerUserController
{
    public function create_member(){
    	return view('vendor.voyager.users.addMemberRegistration');
    }
    public function post_create_member(Request $request){
    	 $this-> Validate($request,[
            
            'phone' => 'required|unique:users,phone',
            'type_user' => 'required',
            'password' => 'required|min:6|max:32',
            //'re_password' => 'same:password',
        ]);

    	return $request;
    }
}
