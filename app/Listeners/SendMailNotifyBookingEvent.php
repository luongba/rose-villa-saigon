<?php

namespace App\Listeners;

use App\Events\AfterBookingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\MailNotifyCustomerBookingEvent;

use App\User;

class SendMailNotifyBookingEvent
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
     * @param  AfterBookingEvent  $event
     * @return void
     */
    public function handle(AfterBookingEvent $event)
    {
        $emails = $this->user->getListAdmin()->pluck('email');
        Mail::to($emails)->send(new MailNotifyCustomerBookingEvent($event->bookingEvent));
    }
}
