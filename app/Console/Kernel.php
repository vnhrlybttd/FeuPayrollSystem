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
        // $schedule->command('inspire')
        //          ->hourly();

        //$schedule->command('backup:clean')->daily()->at('12:12');
        //$schedule->command('backup:run')->daily()->at('12:13');
       
        //$schedule->command('backupmanager:create')->daily();

        $schedule->command('db:backup')->mondays()->at('23:00');
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

    protected $routeMiddleware = [
        
        'Faculty' => \App\Http\Middleware\NFandFMiddlware::class,
        'Non-Faculty' => \App\Http\Middleware\NonFacultyMiddlware::class,
        'Admin' => \App\Http\Middleware\AdminMiddleWare::class,
        'CoAdmin' => \App\Http\Middleware\CoAdminMiddleWare::class,
    ];


}
