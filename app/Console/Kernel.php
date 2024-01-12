<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

use App;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\UpdateReservation',
    
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        // $schedule->exec("php artisan command:updateReservation")->everyMinute()->withoutOverlapping();

        $schedule->command('command:updateReservation')
                ->everyMinute()
                ->withoutOverlapping()
                ->appendOutputTo('/home/po/Desktop/redis-prototype/logfile.log')
                ->before(function () {
                    Log::info("Starting update:reservations");
                })
                ->after(function () {
                    Log::info("Completed update:reservations");
                });
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
