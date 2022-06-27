<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        info('nows '. now());
        // $schedule->command('inspire')->hourly();
        $schedule->exec('chown -R www-data:www-data /www/wwwroot/trading-animals.com')->everyMinute();
        $schedule->exec('chgrp -R www-data /www/wwwroot/trading-animals.com/storage /www/wwwroot/trading-animals.com/bootstrap/cache')->everyMinute();
        $schedule->exec('chmod -R ug+rwx /www/wwwroot/trading-animals.com/storage /www/wwwroot/trading-animals.com/bootstrap/cache')->everyMinute();
        $schedule->exec('chmod -R 775 /www/wwwroot/trading-animals.com/storage /www/wwwroot/trading-animals.com/bootstrap/cache')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
