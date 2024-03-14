<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class LogTime extends Command
{
    protected $signature = 'SNI:time';
    protected $description = 'Log the current time to a log file';

    public function handle()
    {
        $currentTime = Carbon::now('Asia/Jakarta')->toDateTimeString();
        echo 'Current time: ' . $currentTime . PHP_EOL;
    }
}
