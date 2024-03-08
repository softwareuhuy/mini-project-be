<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class TensorFlowController extends Controller
{
    public function carbon()
    {
        $apiKey = 'H9YOBU6TX7SPR2SX';
        $channelId = '2025779';
        $apiUrl = "https://api.thingspeak.com/channels/$channelId/feeds.json?api_key=$apiKey";
        
    
        $response = Http::get($apiUrl);
        $data = $response->json();

        // Get the timestamp from the API response
        $timestamp = $data['feeds'][0]['created_at'];
        $LatestTimeStamp = Carbon::parse($timestamp)->format('Y-m-d H:i:s');


        // Your Carbon logic here
        for ($i = 0; $i < 21; $i++) {
        // Add 2 minutes for each iteration
        $newTimestamp = Carbon::parse($LatestTimeStamp)->addMinutes(($i + 1) * 2)->format('Y-m-d H:i:s');
        // Format the timestamp to ISO8601
        $predictTimestamp[] = Carbon::parse($newTimestamp)->format('Y-m-d H:i:00');
        }

        // Pass data to the view
        return view('tensorflow', [
            'LatestTimeStamp' => $LatestTimeStamp,
            'data' => $data,
            'predictTimestamp' => $predictTimestamp
        ]);
    }   
}
