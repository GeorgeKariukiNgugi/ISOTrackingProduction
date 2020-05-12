<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('minute:delete')
                  ->cron('3 * * * *');
         $schedule->command('notification:april')
         ->cron('* * 20 4 *');
         $schedule->command('notification:january')
         ->cron('* * 20 1 *');
         $schedule->command('notification:july')
         ->cron('* * 20 7 *');
         $schedule->command('notification:october')
         ->cron('* * 20 10 *');
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
