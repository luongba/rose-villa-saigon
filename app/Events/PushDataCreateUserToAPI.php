<?php 
namespace App\Events;

use Illuminate\Queue\SerializesModels;

use App\User;

class PushDataCreateUserToAPI {
    use SerializesModels;

    public $_user;
    public $_type;

    /**
     * Create a new event instance.
     *
     * @return void
     *  variable: 
     *  + type: 1 is create user
     *  + type: 2 is get user
     */
    public function __construct(User $user, $type)
    {
        $this->_user = $user;
        $this->_type = $type;
    }
}





?>