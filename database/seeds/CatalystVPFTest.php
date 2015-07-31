<?php

use Illuminate\Database\Seeder;
use App\VPF;
use App\Ribbon;
use App\Operation;
use App\Qualification;
use App\School;
use App\Article15;
use App\VCS;


class CatalystVPFTest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Constructs a fake VPF profile to test system
        // All Stuff
        $user = VPF::find(1);

        //Fake Article

        $user->article15()->create([
            'name' => 'Demo',
            'grade' => 'E-4',
            'military_id' => 'Dunno',
            'misconduct' => 'stuff',
            'plea' => 'guilty',
            'plan_of_action' => 'Stuff',
            'counselor_sig_date' => '2015-01-01 00:00:00'
        ]);

        $user->article15()->create([
            'name' => 'Demo 2',
            'grade' => 'E-4',
            'military_id' => 'Dunno',
            'misconduct' => 'stuff',
            'plea' => 'guilty',
            'plan_of_action' => 'Stuff',
            'counselor_sig_date' => '2015-01-01 00:00:00'
        ]);

        //VCS
        $user->vcs()->create([
            'name' => 'demovcs1',
            'grade' => 'E-4',
            'counselor_name' => 'Name stuff',
            'summary_interaction' => 'stuff',
        ]);
        $user->vcs()->create([
            'name' => 'demovcs2',
            'grade' => 'E-4',
            'counselor_name' => 'Name stuff',
            'summary_interaction' => 'stuff',
        ]);
        $user->vcs()->create([
            'name' => 'demovcs3',
            'grade' => 'E-4',
            'counselor_name' => 'Name stuff',
            'summary_interaction' => 'stuff',
        ]);

        $user->vcs()->create([
            'name' => 'demovcs4',
            'grade' => 'E-4',
            'counselor_name' => 'Name stuff',
            'summary_interaction' => 'stuff',
        ]);

        //ncs
        $user->ncs()->create([
            'name' => 'demoncs1',
            'grade' => 'E-4',
            'counselor_name' => 'Name stuff',
            'summary_infraction' => 'stuff',
            'action_plan' => 'stuff',
            'approval' => 'stuff',
            'approval_date' => '2015-01-01 00:00:00'
        ]);
        $user->ncs()->create([
            'name' => 'demoncs2',
            'grade' => 'E-4',
            'counselor_name' => 'Name stuff',
            'summary_infraction' => 'stuff',
            'action_plan' => 'stuff',
            'approval' => 'stuff',
            'approval_date' => '2015-01-01 00:00:00'
        ]);
        $user->ncs()->create([
            'name' => 'demoncs3',
            'grade' => 'E-4',
            'counselor_name' => 'Name stuff',
            'summary_infraction' => 'stuff',
            'action_plan' => 'stuff',
            'approval_date' => '2015-01-01 00:00:00'
        ]);

        //dcs
        $user->dcs()->create([
            'name' => 'demodcs1',
            'grade' => 'E-4',
            'counselor_name' => 'Name stuff',
            'reason_counseling' => 'stuff',
            'key_points' => 'stuff',
            'plan_of_action' => 'stuff',
            'assessment_date' => '2015-01-01 00:00:00'
        ]);
        $user->dcs()->create([
            'name' => 'demondcs2',
            'grade' => 'E-4',
            'counselor_name' => 'Name stuff',
            'reason_counseling' => 'stuff',
            'key_points' => 'stuff',
            'plan_of_action' => 'stuff',
            'assessment_date' => '2015-01-01 00:00:00'
        ]);



        /// Service History
        //Syncs stuff
        $user->operations()->sync([1,2]);
        $user->ribbons()->sync([1,2,3,4]);
        $user->qualifications()->sync([1,2,3,4]);
        $user->schools()->sync([1,2]);

    }
}
