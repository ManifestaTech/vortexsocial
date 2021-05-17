<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MaytapiRepository
{

    public function getProduct()
    {
        $client = new Client();
        $url = "https://api.maytapi.com/api/e55f9ddc-539f-45c8-a183-73771fb892dc/product";

        $params = [
            //If you have any Params Pass here
        ];

        $headers = [
            'x-maytapi-key' => '50e82df8-ca0e-403a-bb69-09828fbe65d1'
        ];

        $response = $client->request('GET', $url, [
            // 'json' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return $responseBody;
    }

    public function sendTestMessage()
    {
        $client = new Client();
        $url = "https://api.maytapi.com/api/e55f9ddc-539f-45c8-a183-73771fb892dc/14055/sendMessage/";

        $params = [
            'to_number' => '529841404041',
            'type' => 'text',
            'message' => 'MY FUCKING CODE IS DOPE!'
        ];

        $headers = [
            'x-maytapi-key' => '50e82df8-ca0e-403a-bb69-09828fbe65d1'
        ];

        $response = $client->request('POST', $url, [
            'json' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return $responseBody;
    }

    public function createGroup()
    {
        $client = new Client();
        $url = "https://api.maytapi.com/api/e55f9ddc-539f-45c8-a183-73771fb892dc/14055/createGroup/";

        $params = [
            'name' => 'TEST GROUP',
            'numbers' => [
                '905301234567'
            ]
        ];

        $headers = [
            'x-maytapi-key' => '50e82df8-ca0e-403a-bb69-09828fbe65d1'
        ];

        $response = $client->request('POST', $url, [
            'json' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return $responseBody;
    }

    public function addGroup()
    {
        $client = new Client();
        $url = "https://api.maytapi.com/api/e55f9ddc-539f-45c8-a183-73771fb892dc/14055/group/add";

        $params = [
            'conversation_id' => '5219843210683-1619502750@g.us',
            'number' => '5219842461033'
        ];

        $headers = [
            'x-maytapi-key' => '50e82df8-ca0e-403a-bb69-09828fbe65d1'
        ];

        $response = $client->request('POST', $url, [
            'json' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return $responseBody;
    }


}