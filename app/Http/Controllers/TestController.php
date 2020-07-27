<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\AfterConfirmBookingWellnessBeauty;

class TestController extends Controller
{
	public function test()
	{
		return view('test');
	}

	public function testMail()
	{
		$bookingWellnessBeauty = \App\Models\BookingWellnessBeauty::find(1);
		event(new AfterConfirmBookingWellnessBeauty($bookingWellnessBeauty));
		return "xong";
	}
}
