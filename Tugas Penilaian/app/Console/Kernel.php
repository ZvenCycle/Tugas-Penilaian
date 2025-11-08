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
        // Contoh: jalankan command 'inspire' setiap jam
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        // Load semua custom artisan command di folder app/Console/Commands
        $this->load(__DIR__.'/Commands');

        // Include route untuk command console
        require base_path('routes/console.php');
    }
}
