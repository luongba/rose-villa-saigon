<?php

namespace App\Listeners;

use App\Events\AfterConfirmBookingRoom;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\MailNotifyResultBookingRoom;
use App\Jobs\SendMailNotify;

use App\User;

class SendMailNotifyResultBookingRoom
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
     * @param  AfterConfirmBookingRoom  $event
     * @return void
     */
    public function handle(AfterConfirmBookingRoom $event)
    {
        Mail::to($event->bookingRoom->email)->send(new MailNotifyResultBookingRoom($event->bookingRoom));
        dispatch(new SendMailNotify());
    }
}
