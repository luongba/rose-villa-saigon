<?php

namespace App\Listeners;

use App\Events\AfterBookingParty;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\MailNotifyCustomerBookingParty;

use App\User;

class SendMailNotifyBookingParty
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
     * @param  AfterBookingParty  $event
     * @return void
     */
    public function handle(AfterBookingParty $event)
    {
        $emails = $this->user->getListAdmin()->pluck('email');
        Mail::to($emails)->send(new MailNotifyCustomerBookingParty($event->bookingParty));
    }
}
