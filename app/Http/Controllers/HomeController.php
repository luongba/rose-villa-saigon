<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Auth;
use DB;
use Session;
use App\User;
use App\Models\Store;
use App\Models\Gift;
use App\Models\Room;
use App\Models\CategoryFood;
use App\Models\CategoryService;
use App\Models\OrderGift;
use App\Models\OrderGiftDetail;
use App\Models\Review;
use App\Models\OrderFood;
use App\Models\OrderFoodDetail;
use App\Models\AreaResort;
use App\Models\Package;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Log;
use App\Rules\CheckGiftRule;

class HomeController extends Controller
{
    public function welcome(Request $request)
    {
        return view('pages.index');
    } 

    public function events(Request $request)
    {
        return view('pages.events');
    } 

    public function spa(Request $request)
    {
        return view('pages.spa');
    } 

    public function fooddrink(Request $request)
    {
        return view('pages.food-drink');
    } 

    public function about(Request $request)
    {
        return view('pages.about');
    }

    public function contact(Request $request)
    {
        return view('pages.contact');
    }

    public function singleroom(Request $request)
      {
          return view('pages.single-room');
      }
    public function membership(Request $request)
      {
          return view('pages.membership');
      }

    /* ACCOUNT */
    public function validateLogin($request){
        $validator = Validator::make($request, [
            'phone' => 'required',
            'password' => 'required|min:6|max:32'
        ]);
        if($validator->fails()){
            if($validator->errors()->first('phone') != null){
                return $validator->errors()->first('phone');
            }else if($validator->errors()->first('password') != null){
                return $validator->errors()->first('password');
            }
        }
    }

    public function login_web(Request $request){
        $resultValidate = $this->validateLogin($request->all());
        if($resultValidate != ""){
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
            return response()->json([
                'status' => true,
                'message' => 'Chúc mừng bạn đã đăng nhập thành công!!!'
            ]);
        } else {
            return response()->json([
                "status" => false,
                'message' => 'Số điện thoại hoặc mật khẩu không chính xác!!!'
            ]);
        }
    }

    public function logout_web(){
        Session::flush();
        Auth::logout();
        return redirect()->back();
    }

    public function register_page(){
        return view('pages.register');
    }
    
    public function validateRegister($request){
        $validator = Validator::make($request, [
            'first_name' => 'required',
            'first_name' => 'required',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:6|max:32|confirmed'
        ]);
        if($validator->fails()){
            if($validator->errors()->first('phone') != null){
                return "phone đã tồn tại!";
            }else if($validator->errors()->first('password') != null){
                return $validator->errors()->first('password');
            }
        }
    }

    public function register_web(Request $request){
        $resultValidate = $this->validateRegister($request->all());
        if($resultValidate != ""){
            return response()->json([
                "status" => false,
                "message" => $resultValidate
            ]);
        }else{
            // Auth::loginUsingId($user->id);
            return response()->json([
                "status" => true,
                "message" => "Nhập mã xác minh nhận được từ hệ thống",
            ]);
        }
    }

    public function confirm_register(Request $request){
        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['phone'].'@rosevilla.com',
            'phone' => $request['phone'],
            'password' => bcrypt($request['password']),
            'role_id' =>$request['role']
        ]);
        $user->phone_verified_at = Carbon::now();
        $user->save();
        return response()->json([
            "status" => true,
            "message" => "Chúc mừng bạn đã đăng ký thành công"
        ]);
    }

    public function forgot_web(Request $request){
        $user = User::where('users.phone','=',$request->phone)->first();
        if($user){
            return response()->json([
                "status" => true,
                "phone" => $request->phone
            ]);
        }else{
            return response()->json([
                "status" => false,
                'message' => 'Số điện thoại không chính xác!!!'
            ]);
        }
    }
    public function update_password(Request $request){
        $user = User::where('users.phone','=',$request->phone)->first();
        $validator = Validator::make($request->toArray(), [
            'phone' => 'required|unique:users,phone,'.$user->id,
            'password' => 'required|min:6|max:32|confirmed'
        ]);
        if($validator->fails()){
            return response()->json([
                "status" => false,
                "message" => $validator->errors()->first()
            ]);
        }


        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json([
            "status" => true,
            "message" => "Cập nhật mật khẩu thành công!!!"
        ]);
    }

}
