<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\UserMeta;

class MailNotifyComfirmApplicationFounderMemberSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $userMeta;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(UserMeta $userMeta)
    {
        $this->userMeta = $userMeta;
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
            $subject = 'XÁC NHẬN ĐƠN ĐĂNG KÝ HỘI VIÊN SÁNG LẬP';
        } else {
            $subject = 'YOUR APPLICATION FOR FOUNDER MEMBERSHIP';
        }
        return $this->view('mails.' . $language . '.confirmation_application_founder_received')
        ->subject($subject)
        ->with([
            'name' => $this->userMeta->first_name . ' ' . $this->userMeta->last_name
        ]);
    }
}
