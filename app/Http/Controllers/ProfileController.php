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

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->areaParty = new AreaParty;
        $this->room = new Room;

        $list_room = $this->room->listRoom();
        View::share('list_room', $list_room);
		
		$list_areaParty = AreaParty::withTranslations(['en', 'vi'])->get();
        View::share('list_areaParty', $list_areaParty);
    }

    public function index()
    {
        $user = Auth::user();
        $user->metas = "test";
        return view('pages.profile', compact('user'));
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
