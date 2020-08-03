<?php

namespace App\Listeners;

use App\Events\AfterConfirmBookingWellnessBeauty;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\MailNotifyResultBookingWellnessBeauty;
use App\Jobs\SendMailNotify;

use App\User;

class SendMailNotifyResultBookingWellnessBeauty
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
     * @param  AfterConfirmBookingWellnessBeauty  $event
     * @return void
     */
    public function handle(AfterConfirmBookingWellnessBeauty $event)
    {
        Mail::to($event->bookingWellnessBeauty->email)->send(new MailNotifyResultBookingWellnessBeauty($event->bookingWellnessBeauty));
        dispatch(new SendMailNotify());
    }
}
