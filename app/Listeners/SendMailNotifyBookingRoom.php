<?php

namespace App\Listeners;

use App\Events\AfterBookingRoom;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\MailNotifyCustomerBookingRoom;
use App\Jobs\SendMailNotify;

use App\User;

class SendMailNotifyBookingRoom
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
     * @param  AfterBookingRoom  $event
     * @return void
     */
    public function handle(AfterBookingRoom $event)
    {
        $emails = $this->user->getListAdmin()->pluck('email');
        Mail::to($emails)->send(new MailNotifyCustomerBookingRoom($event->bookingRoom));
        dispatch(new SendMailNotify());
    }
}
