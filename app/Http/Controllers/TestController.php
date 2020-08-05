<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\AfterConfirmMembership;

class TestController extends Controller
{
	public function test()
	{
		return view('test');
	}

	public function testMail()
	{
		$userMeta = \App\Models\UserMeta::find(1);
		event(new AfterConfirmMembership($userMeta));
		return "xong";
	}
}
