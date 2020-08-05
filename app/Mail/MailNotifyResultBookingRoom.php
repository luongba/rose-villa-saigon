<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\BookingRoom;

class MailNotifyResultBookingRoom extends Mailable
{
    use Queueable, SerializesModels;

public $bookingRoom;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(BookingRoom $bookingRoom)
    {
        $this->bookingRoom = $bookingRoom;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.notify_result_booking_room');
    }
}
