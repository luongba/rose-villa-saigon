<?php 
namespace App\Helpers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RequestToSmileAPI {
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

    public function getInfoUser($id) {
      $url = 'users/' . $id;
      $res = $this->client->request('GET', $url);
      if ($res->getStatusCode() == 200) {
        return json_decode($res->getBody()->getContents());
      } else {
        return false;
      }
    }

    public function listAllUsers() {

    }
}


?>