<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\User;

class MailInviteRegisterEarlyFounderMember extends Mailable
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
            $subject = 'THƯ MỜI HỘI VIÊN';
        } else {
            $subject = 'YOUR INVITATION TO REGISTER AS AN EARLY FOUNDER MEMBER';
        }
        return $this->view('mails.' . $language . '.invitation_for_early_founder_member')
        ->subject($subject)
        ->with([
            'name' => $this->user->first_name . ' ' . $this->user->last_name
        ]);
    }
}
