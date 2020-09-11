<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\UserMeta;

class MailNotifyResultRegisterMembership extends Mailable
{
    use Queueable, SerializesModels;

    public $userMeta;
    public $data;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(UserMeta $userMeta, $data)
    {
        $this->userMeta = $userMeta;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.notify_result_register_membership');
    }
}
