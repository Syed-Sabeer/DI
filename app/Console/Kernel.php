<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Shared-hosting cron runs the scheduler every minute. Drain queued
        // newsletter jobs briefly, then exit so no permanent worker is needed.
        $schedule
            ->command('queue:work database --queue=default --stop-when-empty --max-time=50 --tries=3 --timeout=120')
            ->everyMinute()
            ->withoutOverlapping(10);
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
