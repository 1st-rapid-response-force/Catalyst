<?php

namespace App\Console;

use App\Perstat;
use App\VPF;
use Carbon\Carbon;
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
        \App\Console\Commands\Inspire::class,
        \App\Console\Commands\AddNewPERSTAT::class,
        \App\Console\Commands\SquadXML::class,
        \App\Console\Commands\CreateAvatar::class,
        \App\Console\Commands\CreateCAC::class,
        \App\Console\Commands\encryptMessages::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                ->hourly();
        $schedule->command('perstat:create')
                ->weekly();
        $schedule->command('squadxml:create')
                ->hourly();
        $schedule->command('image:avatar')
                ->daily();
        $schedule->command('image:cac')
                ->daily();
    }
}
