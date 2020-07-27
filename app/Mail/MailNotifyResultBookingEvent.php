<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\BookingEvent;

class MailNotifyResultBookingEvent extends Mailable
{
    use Queueable, SerializesModels;

    public $bookingEvent;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(BookingEvent $bookingEvent)
    {
        $this->bookingEvent = $bookingEvent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.notify_result_booking_event');
    }
}
