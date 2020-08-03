<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\AfterConfirmBookingRoom;

class TestController extends Controller
{
	public function test()
	{
		return view('test');
	}

	public function testMail()
	{
		$bookingRoom = \App\Models\BookingRoom::find(3);
		event(new AfterConfirmBookingRoom($bookingRoom));
		return "xong";
	}
}
