<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;

class RequestController extends Controller
{
    private static function guzzleClient()
    {
        return [
            'base_url' => 'https://io.adafruit.com/api/v2/'
        ];
    }

    public function getUsr(){
        return User::all();
    }
    
    public function sensor(Request $request)
    {
        $client = new Client(self::guzzleClient());
        $promise = $client->requestAsync('GET', 'https://io.adafruit.com/api/v2/VictorGP/feeds/counter/data', [
            'headers' => [
                'Authorization' => 'Bearer d3e4404cdd0eec9e60e30a1df20bb0303c14d89a5ce9f0073dad444e8709f05a',
                'X-AIO-Key' => 'aio_SaIw01zkDnR8SFZIKmeOvrJLwuyt'
            ],
            'form_params' => [
                'datum' => ['value' => '1'],
            ]
        ]);
        $promise->then(
            function (Response $response) {
                return $response;
                echo $response->getBody();
            },
            function (RequestException $e) {
                echo $e->getMessage();
            }
        );
        $promise->wait();
    }
}
