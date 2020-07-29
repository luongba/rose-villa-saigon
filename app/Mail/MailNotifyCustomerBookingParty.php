<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\BookingParty;

class MailNotifyCustomerBookingParty extends Mailable
{
    use Queueable, SerializesModels;

    public $bookingParty;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(BookingParty $bookingParty)
    {
        $this->bookingParty = $bookingParty;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.notify_customer_booking_party');
    }
}
