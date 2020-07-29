<?php

namespace App\Listeners;

use App\Events\AfterBookingWellnessBeauty;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\MailNotifyCustomerBookingWellnessBeauty;
use App\Jobs\SendMailNotify;

use App\User;

class SendMailNotifyBookingWellnessBeauty
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
     * @param  AfterBookingWellnessBeauty  $event
     * @return void
     */
    public function handle(AfterBookingWellnessBeauty $event)
    {
        $emails = $this->user->getListAdmin()->pluck('email');
        Mail::to($emails)->send(new MailNotifyCustomerBookingWellnessBeauty($event->bookingWellnessBeauty));
        dispatch(new SendMailNotify());
    }
}
