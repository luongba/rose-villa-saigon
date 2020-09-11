<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Auth;
use DB;
use Session;
use Str;
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
/*knight*/
use App\Models\AreaParty;
use App\Models\WellnessBeauty;
use App\Models\AreaEvent;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Log;
use App\Rules\CheckGiftRule;

use App\Events\AfterBookingEvent;
use App\Events\AfterBookingParty;
use App\Events\AfterBookingWellnessBeauty;
use App\Events\AfterBookingRoom;

use App\Models\BookingEvent;
use App\Models\BookingParty;
use App\Models\BookingWellnessBeauty;
use App\Models\BookingRoom;
use Illuminate\Support\Facades\View;

use App\Models\Contact;
use App\Models\Page;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->areaParty = new AreaParty;
        $this->wellnessBeauty = new WellnessBeauty;
        $this->bookingEvent = new BookingEvent;
        $this->bookingParty = new BookingParty;
        $this->bookingWellnessBeauty = new BookingWellnessBeauty;
        $this->contact = new Contact;
        $this->areaEvent = new AreaEvent;
        $this->room = new Room;
        $this->bookingRoom = new BookingRoom;
        $this->page = new Page;

        $list_room = $this->room->withTranslations(['en', 'vi'])->get();
        View::share('list_room', $list_room);
		
		$list_areaParty = AreaParty::withTranslations(['en', 'vi'])->get();
        View::share('list_areaParty', $list_areaParty);
    }
    
    public function welcome(Request $request)
    {

        return view('pages.index');
    } 

    public function events(Request $request)
    {

        $list_area_event = $this->areaEvent->withTranslations()->get();
        return view('pages.events',compact('list_area_event'));
    } 

    public function spa(Request $request)
    {
        /*$list_areaParty = $this->areaParty->withTranslations()->get();
        return( $list_areaParty);*/

        $list_wellness_beauty = $this->wellnessBeauty->withTranslations()->get();
        return view('pages.spa',compact('list_wellness_beauty'));
    } 

    public function fooddrink(Request $request)
    {
        $list_food_drink = $this->areaParty->withTranslations()->get();
        return view('pages.food-drink',compact('list_food_drink'));
    } 

    public function about(Request $request)
    {
        return view('pages.about');
    }

    public function shop(Request $request)
    {
        return view('pages.shop');
    }

    public function contact(Request $request)
    {
        $slug = 'contact-us';
        $singlepage = $this -> page ->withTranslations()->whereTranslation('slug', '=', $slug)->first();
        return view('pages.contact',compact('singlepage'));
    }

    public function founder(Request $request)
    {
        return view('pages.founder');
    }

    public function regularmember(Request $request)
    {
        return view('pages.regular-member');
    }
    public function findus(Request $request)
    {
        return view('pages.findus');
    }
    public function mailblade(Request $request)
    {
        return view('pages.mail');
    }
    public function thankyou(Request $request)
    {
        return view('pages.thankyou');
    }
    public function singleroom(Request $request)
    {
        $singleroom = $this -> room ->withTranslations()->whereTranslation('slug', '=', $request -> slug)->first();
       // return  $singleroom;

        return view('pages.single-room',compact('singleroom'));
    }
	public function singlefooddrink(Request $request)
    {
        $list_food_drink = $this -> areaParty ->withTranslations()->whereTranslation('title', '=', $request -> slug)->get();
       //return  $list_food_drink;

        return view('pages.single-food-drink',compact('list_food_drink'));
    }

    public function membership(Request $request)
    {
        if (Auth::user()) {
            return view('pages.membership');
        } else {
            return redirect()->route('welcome');
        }
    }

    /* ACCOUNT */
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
                return trans('messages.Phone number already exists');
            }else if($validator->errors()->first('password') != null){
                return $validator->errors()->first('password');
            }
        }
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
                'message' => trans('messages.Incorrect telephone number')
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
            "message" => trans('messages.Update password successfully')
        ]);
    }

    private function validateBooking($request)
    {
        $validator = Validator::make($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'number_guest' => 'required|integer|min:1|max:255',
            'start_at' => 'required|date|after:now',
            'end_at' => 'required_if:type_booking,3|after:'.$request['start_at'],
            'description' => 'required',
            'type_booking' => 'required|min:0|max:2',
            'booking_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            if ($validator->errors()->first('name') != null) {
                return $validator->errors()->first('name');
            } else if($validator->errors()->first('email') != null) {
                return $validator->errors()->first('email');
            } else if($validator->errors()->first('phone') != null) {
                return $validator->errors()->first('phone');
            } else if($validator->errors()->first('number_guest') != null) {
                return $validator->errors()->first('number_guest');
            } else if($validator->errors()->first('start_at') != null) {
                return $validator->errors()->first('start_at');
            } else if($validator->errors()->first('end_at') != null) {
                return $validator->errors()->first('end_at');
            } else if($validator->errors()->first('description') != null) {
                return $validator->errors()->first('description');
            } else if($validator->errors()->first('type_booking') != null) {
                return $validator->errors()->first('type_booking');
            } else if($validator->errors()->first('booking_id') != null) {
                return $validator->errors()->first('booking_id');
            }
        }
    }

    public function booking(Request $request)
    {
        $resultValidate = $this->validateBooking($request->all());
        if ($resultValidate != "") {
            return response()->json([
                "status" => false,
                "message" => $resultValidate
            ]);
        }
        $params = $request->only('name', 'email', 'phone', 'number_guest', 'start_at', 'description');
        if ($request->type_booking == 0) {
            //booking event
            $params['area_event_id'] = $request->booking_id;
            $result = $this->bookingEvent->addNewBookingEvent($params);
        } elseif ($request->type_booking == 1) {
            //booking food & drink
            $params['area_party_id'] = $request->booking_id;
            $result = $this->bookingParty->addNewBookingParty($params);
        } else if ($request->type_booking == 2) {
            //booking wellness & beauty
            $params['wellness_beauty_id'] = $request->booking_id;
            $result = $this->bookingWellnessBeauty->addNewWellnessBeauty($params);
        } elseif ($request->type_booking == 3) {
            //booking room
            $params['room_id'] = $request->booking_id;
            $params['end_at'] = $request->end_at;
            $result = $this->bookingRoom->addNewBookingRoom($params);
        }
        if ($result) {
            if ($request->type_booking == 0) {
                //booking event
                event(new AfterBookingEvent($result));
            } elseif ($request->type_booking == 1) {
                //booking food & drink
                event(new AfterBookingParty($result));
            } elseif ($request->type_booking == 2) {
                //booking wellness & beauty
                event(new AfterBookingWellnessBeauty($result));
            } elseif ($request->type_booking == 3) {
                //booking room
                event(new AfterBookingRoom($result));
            }
            return response()->json([
                'status' => true,
                'message' => trans('messages.Booking successfully')
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => trans('messages.Booking error')
            ]);
        }
    }

    private function validateAddContact($request)
    {
        $validator = Validator::make($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);
        if ($validator->fails()) {
            if ($validator->errors()->first('name') != null) {
                return $validator->errors()->first('name');
            } else if($validator->errors()->first('email') != null) {
                return $validator->errors()->first('email');
            } else if($validator->errors()->first('phone') != null) {
                return $validator->errors()->first('phone');
            } else if($validator->errors()->first('title') != null) {
                return $validator->errors()->first('title');
            } else if($validator->errors()->first('content') != null) {
                return $validator->errors()->first('content');
            }
        }
    }

    public function addContact(Request $request)
    {
        $resultValidate = $this->validateAddContact($request->all());
        if ($resultValidate != "") {
            return response()->json([
                "status" => false,
                "message" => $resultValidate
            ]);
        }
        $params = $request->only('name', 'phone', 'email', 'title', 'content');
        $resultAddContact = $this->contact->addNewContact($params);
        if ($resultAddContact) {
            return response()->json([
                "status" => true,
                "message" => trans('messages.Add contact successfully')
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => trans('messages.Add contact error')
            ]);
        }
    }

    /*get data country from json file*/
    private function getDataCityFromJsonFile($linkStorage)
    {
        $jsonString = file_get_contents(base_path($linkStorage));
        $data = json_decode($jsonString, true);
        return $data['Sheet1'];;
    }

    public function listCountry()
    {
        $arrData = $this->getDataCityFromJsonFile('storage/files/country.json');
        $result = array();
        foreach ($arrData as $item) {
            if (! in_array($item['country'], $result)) {
                $result[$item['iso2']] = $item['country'];
            }
        }
        asort($result);
        return response()->json([
            "status" => true,
            "data" => $result
        ]);
    }

    public function listProvinceByCountry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country' => 'required',
        ]);
        if ($validator->fails()) {
            if ($validator->errors()->first('country') != null) {
                return response()->json([
                    "status" => false,
                    "message" => $validator->errors()->first('country')
                ]);
            }
        }
        $arrData = $arrData = $this->getDataCityFromJsonFile('storage/files/country.json');
        $result = array();
        foreach ($arrData as $item) {
            if ($item['iso2'] === $request->country) {

                if(isset($item['admin_name'])){
                    $name = $item['admin_name'];
                } else {
                    $name = $item['city_ascii'];
                }
                if (! in_array($name, $result)) {
                    $result[Str::slug($name)] = $name;
                }
            }
        }
        return response()->json([
            "status" => true,
            "data" => (object) $result
        ]);
    }

    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);
        return redirect()->back();
    }
    /*knight*/
    public function getPage($slug){
        $singlepage = $this -> page ->withTranslations()->whereTranslation('slug', '=', $slug)->first();
        //return $singlepage;
        return view('pages.about',compact('singlepage'));
    }
    /*endknight*/
}
