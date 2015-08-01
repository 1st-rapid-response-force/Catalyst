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

        //////////////////////////////////////////
        /// REMOVE THESE BEFORE PRODUCTION, TESTING
        //Remove Operation before Production Push
        $operation = new Operation;
        $operation->name = 'Test Operation';
        $operation->storage_image = 'false';
        $operation->public_image  = 'placeholder.png';
        $operation->description  = '';
        $operation->date  = '2015-01-01 00:00:00';
        $operation->promotionPoints = 5;
        $operation->save();

        $operation = new Operation;
        $operation->name = 'Test Operation 2';
        $operation->storage_image = 'false';
        $operation->public_image  = 'placeholder.png';
        $operation->description  = '';
        $operation->date  = '2015-01-05 00:00:00';
        $operation->promotionPoints = 5;
        $operation->save();

        $ribbons = new Ribbon;
        $ribbons->name = 'Test Ribbon';
        $ribbons->storage_image = 'cloud';
        $ribbons->public_image  = 'v7qsezjleq9d2o3cgiuj';
        $ribbons->description  = 'Test Ribbon';
        $ribbons->promotionPoints = 5;
        $ribbons->save();

        $ribbons = new Ribbon;
        $ribbons->name = 'Test Ribbon 2';
        $ribbons->storage_image = 'cloud';
        $ribbons->public_image  = 'v7qsezjleq9d2o3cgiuj';
        $ribbons->description  = 'Test Ribbon';
        $ribbons->promotionPoints = 5;
        $ribbons->save();

        $ribbons = new Ribbon;
        $ribbons->name = 'Test Ribbon 3';
        $ribbons->storage_image = 'cloud';
        $ribbons->public_image  = 'v7qsezjleq9d2o3cgiuj';
        $ribbons->description  = 'Test Ribbon';
        $ribbons->promotionPoints = 5;
        $ribbons->save();


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
        $user->serviceHistory()->create([
            'note' => 'Graduated Basic Training Course',
            'date' => '2015-05-29'
        ]);

        /// Service History
        $user->serviceHistory()->create([
            'note' => 'Attended Officer Training School',
            'date' => '2015-06-05'
        ]);

        /// Service History
        $user->serviceHistory()->create([
            'note' => 'Deployed Hindakush',
            'date' => '2015-06-30'
        ]);


        //Syncs stuff
        $user->operations()->sync([
            1 => ['date_attended' => '2015-05-29'],
            2 => ['date_attended' => '2015-07-03']]
        );
        $user->ribbons()->sync([1,2,3,4]);
        $user->qualifications()->sync([
            1 => ['date_awarded' => '2015-05-29'],
            2 => ['date_awarded' => '2015-07-03'],
            3 => ['date_awarded' => '2015-06-29'],
            4 => ['date_awarded' => '2015-08-03']]
        );
        $user->schools()->sync([
            1 => ['date_attended' => '2015-05-29',
            'completed' => 1],
        ]);

        //////////// FACTORIES YAY
        //// Members
        $i = 35;
        //members
        $users = factory(App\User::class, 150)
            ->create()
            ->each(function($u) {
               $app = $u->application()->save(factory(App\Application::class,'acceptedApplicant')->create());
                $u->application_id = $app->id;

               $vpf = $u->vpf()->save(factory(App\VPF::class,'active')->create(['first_name' => $app->first_name,'last_name'=>$app->last_name]));
                $u->vpf_id = $vpf->id;
                $u->save();

            });
        //recruits
        $users = factory(App\User::class, 10)
            ->create()
            ->each(function($u) {
                $app = $u->application()->save(factory(App\Application::class,'acceptedApplicant')->create());
                $u->application_id = $app->id;

                $vpf = $u->vpf()->save(factory(App\VPF::class,'recruits')->create(['first_name' => $app->first_name,'last_name'=>$app->last_name]));
                $u->vpf_id = $vpf->id;
                $u->save();

            });

        //applicant
        $users = factory(App\User::class, 10)
            ->create()
            ->each(function($u) {
                $app = $u->application()->save(factory(App\Application::class,'applicant')->create());
                $u->application_id = $app->id;
                $u->save();
            });

        //rejected applicants
        $users = factory(App\User::class, 34)
            ->create()
            ->each(function($u) {
                $app = $u->application()->save(factory(App\Application::class,'rejectedApplicant')->create());
                $u->application_id = $app->id;
                $u->save();
            });


        //discharged
        $users = factory(App\User::class, 26)
            ->create()
            ->each(function($u) {
                $app = $u->application()->save(factory(App\Application::class,'acceptedApplicant')->create());
                $u->application_id = $app->id;

                $vpf = $u->vpf()->save(factory(App\VPF::class,'discharged')->create(['first_name' => $app->first_name,'last_name'=>$app->last_name]));
                $u->vpf_id = $vpf->id;
                $u->save();

            });

    }
}
