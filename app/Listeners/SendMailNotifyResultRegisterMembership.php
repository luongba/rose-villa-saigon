<?php

namespace App\Listeners;

use App\Events\AfterConfirmMembership;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\MailNotifyResultRegisterMembership;

class SendMailNotifyResultRegisterMembership
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AfterConfirmMembership  $event
     * @return void
     */
    public function handle(AfterConfirmMembership $event)
    {
        Mail::to($event->user)->send(new MailNotifyResultRegisterMembership($event->user));
    }
}
