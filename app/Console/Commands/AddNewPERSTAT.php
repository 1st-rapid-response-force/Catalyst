<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Perstat;
use App\VPF;
use Carbon\Carbon;

class AddNewPERSTAT extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perstat:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new PERSTAT for the unit.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Set old perstat to active
        $perstatOld = Perstat::where('active','=','1')->first();
        $perstatOld->active = false;
        $perstatOld->save();

        $date = Carbon::createFromFormat('Y-m-d', $perstatOld->to)->addWeek();
        $date->hour= 0;
        $date->minute = 0;
        $date->second = 0;

        //New Perstat
        $assigned = VPF::where('status','=','Active')->get()->count();
        $perstat = new Perstat;
        $perstat->from = $perstatOld->to;
        $perstat->to = $date->toDateString();
        $perstat->assigned = $assigned;
        $perstat->active = true;
        $perstat->save();
    }
}
