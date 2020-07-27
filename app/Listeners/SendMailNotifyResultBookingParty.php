<?php

namespace App\Listeners;

use App\Events\AfterConfirmBookingParty;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\MailNotifyResultBookingParty;

use App\User;

class SendMailNotifyResultBookingParty
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
     * @param  AfterConfirmBookingParty  $event
     * @return void
     */
    public function handle(AfterConfirmBookingParty $event)
    {
        Mail::to($event->bookingParty->email)->send(new MailNotifyResultBookingParty($event->bookingParty));
    }
}
