<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\AfterBookingParty;

class TestController extends Controller
{
	public function test()
	{
		return view('test');
	}

	public function testMail()
	{
		$bookingParty = \App\Models\BookingParty::find(1);
		event(new AfterBookingParty($bookingParty));
		return "xong";
	}
}
