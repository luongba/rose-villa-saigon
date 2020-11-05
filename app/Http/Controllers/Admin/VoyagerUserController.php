<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use App\User;
use Illuminate\Support\Facades\Hash;

use TCG\Voyager\Http\Controllers\VoyagerUserController as BaseVoyagerUserController;


use App\Helpers\RequestToSmileAPI as SmileAPI;

class VoyagerUserController extends BaseVoyagerUserController
{
	public function __construct()
    {
        $this->user = new User;
    }

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
    	$create_user = $this->user;
    	$create_user -> phone = $request -> phone;
    	$create_user -> type_user = $request -> type_user;
    	$create_user -> password = Hash::make($request->password);
    	$create_user -> save();

    	$redirect = redirect()->back();

        return $redirect->with([
            'message'    => __('voyager::generic.successfully_created'),
            'alert-type' => 'success',
        ]);
    }

    public function update_users_data_from_smile() {

    }

    public function update_user_data_from_smile(Request $request) {
        // dd($request->id);
        $redirect = redirect()->back();
        if ($request->id > 0) {
            $user = $this->user->where('id', $request->id)->first();
            if ($user) {
                // request to smile api
                $api = new SmileAPI();
                $res = $api->getInfoUser($request->id);
                if ($res == false) {
                    return $redirect->with([
                        'message'    => __("can't get data from smile"),
                        'alert-type' => 'error',
                    ]);
                }
                $update = $user->update([
                    'first_name' => $res[0]->firstName,
                    'last_name' => $res[0]->lastName,
                    'email' => $res[0]->email,
                    'phone' => $res[0]->mobilePhoneNumber,
                    'gender' => $res[0]->gender,
                    'dob' => $res[0]->dateOfBirth,
                    'occupation' => $res[0]->occupation,
                    'city' => $res[0]->city,
                    'country' => $res[0]->country,
                    'post_code' => $res[0]->postalCode,
                    'address_one' => $res[0]->streetAddress,
                ]);

                if ($update) {
                    return $redirect->with([
                        'message'    => __('voyager::generic.successfully_created'),
                        'alert-type' => 'success',
                    ]);
                } else {
                    return $redirect->with([
                        'message'    => __('update user from smile false, please try again later!'),
                        'alert-type' => 'error',
                    ]);
                }
    
            } else {
                return $redirect->with([
                    'message'    => __('user not found!'),
                    'alert-type' => 'error',
                ]);
            }
        } else {
            return $redirect->with([
                'message'    => __('validate id user erorr!'),
                'alert-type' => 'error',
            ]);
        }
    }
}
