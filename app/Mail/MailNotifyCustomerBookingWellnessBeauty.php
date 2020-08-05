<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\BookingWellnessBeauty;

class MailNotifyCustomerBookingWellnessBeauty extends Mailable
{
    use Queueable, SerializesModels;

    public $bookingWellnessBeauty;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(BookingWellnessBeauty $bookingWellnessBeauty)
    {
        $this->bookingWellnessBeauty = $bookingWellnessBeauty;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.notify_customer_booking_wellness_beauty');
    }
}
