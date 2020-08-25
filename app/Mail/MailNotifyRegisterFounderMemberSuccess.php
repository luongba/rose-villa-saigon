<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\User;

class MailNotifyRegisterFounderMemberSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $language = \Session::get('website_language', config('app.locale'));
        if ($language === 'vi') {
            $subject = 'XÁC NHẬN ĐƠN HỘI VIÊN DANH DỰ';
        } else {
            $subject = 'YOUR INVITATION TO BECOME AN EARLY FOUNDER';
        }
        return $this->view('mails.' . $language . '.confirmation_form_register_early_founder_received')
        ->subject($subject);
    }
}
