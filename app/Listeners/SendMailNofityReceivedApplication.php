<?php

namespace App\Listeners;

use App\Events\AfterRegisterMember;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;   
use Mail;
use App\Mail\MailNotifyComfirmApplicationFounderMemberSuccess;
use App\Jobs\SendMailNotify;

use App\User;

class SendMailNofityReceivedApplication
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = new User;
    }

    /**
     * Handle the event.
     *
     * @param  AfterRegisterMember  $event
     * @return void
     */
    public function handle(AfterRegisterMember $event)
    {
        Mail::to($event->user)->send(new MailNotifyComfirmApplicationFounderMemberSuccess($event->user));
        dispatch(new SendMailNotify());
    }
}
