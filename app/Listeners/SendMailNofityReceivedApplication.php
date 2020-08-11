<?php

namespace App\Listeners;

use App\Events\AfterRegisterMember;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;   
use Mail;
use App\Mail\MailNotifyComfirmApplicationFounderMemberSuccess;
use App\Jobs\SendMailNotify;

use App\Models\UserMeta;

class SendMailNofityReceivedApplication
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->userMeta = new UserMeta;
    }

    /**
     * Handle the event.
     *
     * @param  AfterRegisterMember  $event
     * @return void
     */
    public function handle(AfterRegisterMember $event)
    {
        Mail::to($event->userMeta)->send(new MailNotifyComfirmApplicationFounderMemberSuccess($event->userMeta));
        dispatch(new SendMailNotify());
    }
}
