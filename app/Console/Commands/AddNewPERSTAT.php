<?php

namespace App\Console\Commands;

use App\InfractionReport;
use Illuminate\Console\Command;
use App\Perstat;
use App\VPF;
use Carbon\Carbon;
use Mail;

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

        // Lets deal with inactives
        $inactives = $perstatOld->pendingReportIn();
        foreach($inactives as $vpf)
        {
            // Email, and Create an infraction report
            $this->emailFailureToReportIn($vpf->user);
            InfractionReport::create(
                [
                    'vpf_id' => 1,
                    'form_name' => 'Infraction Report',
                    'form_type' => 'ir',
                    'violator_name' => $vpf,
                    'violation_summary' => 'AUTOMATED - CATALYST - MEMBER FAILED TO REPORT IN',
                    'reviewed' => 0
                ]);
        }


        //New Perstat
        $assigned = VPF::where('status','=','Active')->get()->count();
        $perstat = new Perstat;
        $perstat->from = $perstatOld->to;
        $perstat->to = $date->toDateString();
        $perstat->assigned = $assigned;
        $perstat->active = true;
        $perstat->save();
        
        // Lets email the guys and let them know a new PERSTAT is here
        $active = VPF::active()->get();
        foreach($active as $vpf)
        {
            $this->emailNewReportIn($vpf->user);
        }
        
    }
    
    private function emailNewReportIn($user)
    {
        Mail::queue('emails.reportInNew', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->vpf);
            $m->subject('1st RRF - New Report In Period');
            $m->from('no-reply@1st-rrf.com','1st Rapid Response Force');
            $m->sender('no-reply@1st-rrf.com','1st Rapid Response Force');
        });
    }

    private function emailFailureToReportIn($user)
    {
        $data = ['name' => $user->vpf];
        Mail::queue('emails.failureToReport', ['user' => $user, 'data' => $data], function ($m) use ($user) {
            $m->to($user->email, $user->vpf);
            $m->subject('1st RRF - Failure to Report In');
            $m->from('no-reply@1st-rrf.com','1st Rapid Response Force');
            $m->sender('no-reply@1st-rrf.com','1st Rapid Response Force');
        });
    }
}
