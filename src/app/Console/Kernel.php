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
        $schedule->command('bigmelo:assign-free-messages')->monthlyOn(1, '14:00');
        $schedule->command('bigmelo:verify-payments')->dailyAt('14:00');
        $schedule->command('bigmelo:update-messages-for-old-leads')->dailyAt('14:00');
        $schedule->command('bigmelo:test')->hourly();
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
