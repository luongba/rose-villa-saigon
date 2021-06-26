<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Auth;
use DB;
use Session;
use Str;
use View;
use App\User;
use App\Models\Room;
use App\Models\AreaParty;
use App\Models\WellnessBeauty;
use App\Models\BookingEvent;
use App\Models\BookingParty;
use App\Models\BookingWellnessBeauty;
use App\Models\AreaEvent;
use App\Models\BookingRoom;
use App\Models\Page;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->areaParty = new AreaParty;
        $this->room = new Room;
        $this->wellnessBeauty = new WellnessBeauty;
        $this->bookingEvent = new BookingEvent;
        $this->bookingParty = new BookingParty;
        $this->bookingWellnessBeauty = new BookingWellnessBeauty;
        $this->areaEvent = new AreaEvent;
        $this->bookingRoom = new BookingRoom;
        $this->page = new Page;

  //       $list_room = $this->room->listRoom();
  //       View::share('list_room', $list_room);
		
		// $list_areaParty = AreaParty::withTranslations(['en', 'vi'])->get();
  //       View::share('list_areaParty', $list_areaParty);

        $list_room = $this->room->withTranslations(['en', 'vi'])->orderBy('created_at', 'asc')->get();
        View::share('list_room', $list_room);
        
        $list_areaParty = AreaParty::withTranslations(['en', 'vi'])->orderBy('created_at', 'asc')->get();
        View::share('list_areaParty', $list_areaParty);

        $list_wellness_beauty = WellnessBeauty::withTranslations(['en', 'vi'])->orderBy('created_at', 'asc')->get();
        View::share('list_wellness_beauty', $list_wellness_beauty);

        $list_events = AreaEvent::withTranslations(['en', 'vi'])->orderBy('created_at', 'asc')->get();
        View::share('list_events', $list_events);
    }

    public function index()
    {
        $user = Auth::user();
        $tgs = DB::table('membership_type_users')->where('user_id',$user->id )->get();
        foreach($tgs as $tg){
             $memberType = DB::table('membership_types')->where('id',$tg->membership_type_id)->first();
        }
        return view('pages.profile', compact('user', 'memberType'));
    }
    public function updateProfile(Request $request, $id){
        $fullName = $request->fullName;
        $split = explode(" ", $fullName);
        User::find($id)->update([
            'first_name' => $split[0],
            'last_name' => $split[1],
            'email' => $request->email,
            'phone' => $request->phone,
            'address_one' => $request->address,
            'occupation' =>$request->occupation,
            'dob' => $request->day

        ]);
        return redirect()->back();
    }

    public function membership()
    {
        $user = Auth::user();
        return view('pages.profile-membership', compact('user'));
    }

    public function changePassword()
    {
        $user = Auth::user();
        return view('pages.profile-changepass', compact('user'));
    }
    
    
}
