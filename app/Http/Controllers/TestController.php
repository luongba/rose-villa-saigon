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
		$user = \App\User::find(16);
		event(new AfterConfirmMembership($user));
		return "xong";
	}
}
