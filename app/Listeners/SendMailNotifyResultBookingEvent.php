<?php

namespace App\Listeners;

use App\Events\AfterConfirmBookingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\MailNotifyResultBookingEvent;

use App\User;

class SendMailNotifyResultBookingEvent
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
     * @param  AfterConfirmBookingEvent  $event
     * @return void
     */
    public function handle(AfterConfirmBookingEvent $event)
    {
        Mail::to($event->bookingEvent->email)->send(new MailNotifyResultBookingEvent($event->bookingEvent));
    }
}
