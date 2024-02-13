<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ThingSpeakController extends Controller
{
    public function fetchDataFromThingSpeak()
    {
        $apiKey = 'H9YOBU6TX7SPR2SX';
        $channelId = '2025779';
        $url = "https://api.thingspeak.com/channels/$channelId/feeds.json?api_key=$apiKey";

        $client = new Client();
        $response = $client->request('GET', $url);
        $data = json_decode($response->getBody(), true);

        // Process $data as needed

        return response()->json($data);
    }
}