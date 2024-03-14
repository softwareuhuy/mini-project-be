<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LogTime extends Command
{
    protected $signature = 'SNI:time';
    protected $description = 'Log the current time to a log file';

    public function handle()
    {
        $currentTime = now()->toDateTimeString();
        \Log::info('Current time: ' . $currentTime); // Note the use of \Log here
        $this->info('Current time: ' . $currentTime);
    }
}
