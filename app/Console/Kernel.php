<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\TensorFlowJob;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
    $schedule->command('SNI:time')->cron('1-59/2 * * * * ')->withoutOverlapping()->appendOutputTo(storage_path('logs/SNI.log'));
    // $schedule->command('tensorflow:run')->everySecond();
    $schedule->job(new TensorFlowJob())->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
