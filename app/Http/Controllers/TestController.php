<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\AfterRegister;

use Mail;
use App\Mail\MailNotifyThanksRegister;
use App\Mail\MailInviteRegisterEarlyFounderMember;
use App\Mail\MailNotifyRegisterFounderMemberSuccess;
use App\Mail\MailInviteRegisterFounderMember;
use App\Mail\MailNotifyComfirmApplicationFounderMemberSuccess;
use App\Jobs\SendMailNotify;

use App\User;

class TestController extends Controller
{
	public function test()
	{
		return view('test');
	}

	public function testMail()
	{
		$user = \App\User::find(3);
		event(new AfterRegister($user));
		return "xong";
	}

	public function mailThanksRegister($id)
	{
		$user = \App\User::findOrFail($id);
		Mail::to($user)
        ->send(new MailNotifyThanksRegister($user));

        dispatch(new SendMailNotify());
		return "xong";
	}

	public function mailInviteRegisterEarlyFounderMember($id)
	{
		$user = \App\User::findOrFail($id);
		Mail::to($user)->send(new MailInviteRegisterEarlyFounderMember($user));
        dispatch(new SendMailNotify());
		return "xong";
	}

	public function mailNotifyRegisterEarlyFounderMemberSuccess($id)
	{
		$user = \App\User::findOrFail($id);
		Mail::to($user)->send(new MailNotifyRegisterFounderMemberSuccess($user));
        dispatch(new SendMailNotify());
		return "xong";
	}

	public function mailInviteRegisterFounderMember($id)
	{
		$user = \App\User::findOrFail($id);
		Mail::to($user)->send(new MailInviteRegisterFounderMember($user));
        dispatch(new SendMailNotify());
		return "xong";
	}

	public function mailNotifyComfirmApplicationFounderMemberSuccess($id)
	{
		$user = \App\User::findOrFail($id);
		Mail::to($user)->send(new MailNotifyComfirmApplicationFounderMemberSuccess($user));
        dispatch(new SendMailNotify());
		return "xong";
	}
}
