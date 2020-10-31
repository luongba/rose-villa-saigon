<?php 

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

use App\User;
use App\Events\PushDataCreateUserToAPI;

class DoPushDataCreateUserAPI {
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://ep.atsolutions.com.vn:8123/api/',
            // You can set any number of default request options.
            // 'timeout'  => 2.0,
        ]);
    }
    public function handle(PushDataCreateUserToAPI $event)
    {
        switch ($event->_type) {
            case 1: // create user
                $this->createUser($event->_user);
                break;
            case 2: // get user
                break;
            default:
                break;
        }
    }

    private function createUser($user) {
        $url = 'users/' . $user->id;
        $body = [
            'json' => [
                    'firstName' => $user->first_name,
                    'lastName' => $user->last_name,
                    'gender' => $user->gender,
                    'dateOfBirth' => $user->dob,
                    'occupation' => $user->occupation,
                    'country' => $user->country,
                    'streetAddress' => $user->address_one,
                    'city' => $user->city,
                    'postalCode' => $user->post_code,
                    'email' => $user->email,
                    'mobilePhoneNumber' => $user->phone,
                    'memberType' => $user->membership_type_id
                ]
        ];
        $promise = $this->client->request('POST', $url, $body);
    }

    public function failed(PushDataCreateUserToAPI $event, $exception)
    {
        dd($exception);
    }
    
}

?>