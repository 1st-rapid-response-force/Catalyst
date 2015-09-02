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

        //Create new PERSTAT weekly
        $schedule->call(function () {
            // Set old perstat to active
            $perstatOld = Perstat::where('active','=','1')->first();
            $perstatOld->active = false;
            $perstatOld->save();

            $now = Carbon::now();

            //New Perstat
            $assigned = VPF::where('status','=','Active')->get()->count();
            $perstat = new Perstat;
            $perstat->from = $now->toDateString();
            $perstat->to = $now->addWeek(1)->toDateString();
            $perstat->assigned = $assigned;
            $perstat->active = true;
            $perstat->save();
        })->weekly();
    }
}
