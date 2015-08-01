<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;
use App\Rank;
use App\Position;
use App\Group;
use App\Application;
use App\VPF;

class CatalystSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ////////////////////////// ADMIN USERS
        $admin = User::create([
            'email' => 'rodriguez.g@1st-rrf.com',
            'steam_id' => '76561198011615406',
            'password' => bcrypt(str_random(40)),
        ]);
        $admin2 = User::create([
            'email' => 'striker.a@1st-rrf.com',
            'steam_id' => '76561198021531457',
            'password' => bcrypt(str_random(40)),
        ]);

        ////////////////////////// ROLES
        $superadmin = new Role();
        $superadmin->name         = 'superadmin';
        $superadmin->display_name = 'Super Admin';
        $superadmin->description  = 'Complete Access';
        $superadmin->save();

        $officer = new Role();
        $officer->name         = 'officer';
        $officer->display_name = 'Officer';
        $officer->description  = 'Officer Level Access';
        $officer->save();

        $nco = new Role();
        $nco->name         = 'nco';
        $nco->display_name = 'Non-Commissioned Officer';
        $nco->description  = 'NCO Level Access';
        $nco->save();

        $member = new Role();
        $member->name         = 'member';
        $member->display_name = 'Member';
        $member->description  = 'Member Level Access';
        $member->save();

        $user = new Role();
        $user->name         = 'user';
        $user->display_name = 'User';
        $user->description  = 'Base Level Access';
        $user->save();

        ////////////////////////// PERMISSIONS
        ///// Super Admin
        $superperm = new Permission();
        $superperm->name         = 'super-permission';
        $superperm->display_name = 'Super Access';
        $superperm->description  = 'Super admin access';
        $superperm->save();

        ///// Officer
        $offperm = new Permission();
        $offperm->name         = 'officer-permission';
        $offperm->display_name = 'View Officer Pages/Actions';
        $offperm->description  = 'Allows Officer to view Officer Pages and actions';
        $offperm->save();

        ///// NCO
        $ncoperm = new Permission();
        $ncoperm->name         = 'nco-permission';
        $ncoperm->display_name = 'View NCO Pages/Actions';
        $ncoperm->description  = 'Allows NCOs to view NCO Pages and actions';
        $ncoperm->save();

        ///// MEMBER
        $memperm = new Permission();
        $memperm->name         = 'member-permission';
        $memperm->display_name = 'View Member Pages/Actions';
        $memperm->description  = 'Allows user that have been accepted to view member specific pages';
        $memperm->save();

        ///// USER
        $enlist = new Permission();
        $enlist->name         = 'enlist';
        $enlist->display_name = 'File Enlistment Paperwork';
        $enlist->description  = 'Allows user to enlist in the unit.';
        $enlist->save();

        // Permissions attachment

        $superadmin->attachPermissions(array($superperm, $offperm,$ncoperm,$memperm,$enlist));
        $officer->attachPermissions(array($offperm,$ncoperm,$memperm,$enlist));
        $nco->attachPermissions(array($ncoperm,$memperm,$enlist));
        $member->attachPermissions(array($memperm,$enlist));
        $user->attachPermissions(array($enlist));

        // User attachment
        $admin->attachRole($superadmin);
        $admin2->attachRole($superadmin);

        //Application Setup for Base Users
        $rod = new Application;
        $rod->user_id = $admin->id;
        $rod->status = 'Accepted';
        $rod->first_name = 'Guillermo';
        $rod->last_name = 'Rodriguez';
        $rod->dob = '1995-04-29';
        $rod->nationality = 'United States';
        $rod->mos_id = 1;
        $rod->milsim_experience = 1;
        $rod->milsim_badconduct = 0;
        $rod->milsim_grouplist = '7th Cav, 23rd Gaming Division, 34th Gaming Division, 8th SOF';
        $rod->milsim_highestrank = 'Colonel';
        $rod->milsim_previoustraining = 'Basic Training, AIT 1, AIT 2 - Airframe, Infantry, Radio, Navigation, Warrior Leader Training';
        $rod->milsim_depature = '7th Cav - Did not agree with policies and leadership, the rest were unit collapses';
        $rod->agreement_milsim = 1;
        $rod->agreement_guidelines = 1;
        $rod->agreement_orders = 1;
        $rod->agreement_ranks = 1;
        $rod->signature = 'Guillermo Rodriguez';
        $rod->signature_date = \Carbon\Carbon::now()->toDateTimeString();
        $rod->processed_statement = 'No Statement, Accepted';
        $rod->save();

        $striker = new Application;
        $striker->user_id = $admin2->id;
        $striker->status = 'Accepted';
        $striker->first_name = 'Alexander';
        $striker->last_name = 'Striker';
        $striker->dob = '1995-08-13';
        $striker->nationality = 'United Kingdom';
        $striker->mos_id = 8;
        $striker->milsim_experience = 1;
        $striker->milsim_badconduct = 0;
        $striker->milsim_grouplist = '23rd Gaming Division, 34th Gaming Division, 8th SOF';
        $striker->milsim_highestrank = 'Lieutenant Colonel';
        $striker->milsim_previoustraining = 'Basic Training, AIT 1, AIT 2 - Airframe, Infantry, Radio, Navigation, Warrior Leader Training';
        $striker->milsim_depature = 'Unit Collapses';
        $striker->agreement_milsim = 1;
        $striker->agreement_guidelines = 1;
        $striker->agreement_orders = 1;
        $striker->agreement_ranks = 1;
        $striker->signature = 'Alexander Striker';
        $striker->signature_date = \Carbon\Carbon::now()->toDateTimeString();
        $striker->processed_statement = 'No Statement, Accepted';
        $striker->save();

        //Personnel File Creation
        $rod_personnel = new VPF;
        $rod_personnel->first_name = 'Guillermo';
        $rod_personnel->last_name = 'Rodriguez';
        $rod_personnel->user_id = $admin->id;
        $rod_personnel->assignment_id = 1;
        $rod_personnel->rank_id = 21;
        $rod_personnel->face_id = 3;
        $rod_personnel->status = 'Active';
        $rod_personnel->save();

        $admin->application_id = $rod->id;
        $admin->vpf_id = $rod_personnel->id;
        $admin->save();

        $striker_personnel = new VPF;
        $striker_personnel->first_name = 'Alexander';
        $striker_personnel->last_name = 'Striker';
        $striker_personnel->user_id = $admin2->id;
        $striker_personnel->assignment_id = 2;
        $striker_personnel->rank_id = 19;
        $striker_personnel->face_id = 17;
        $striker_personnel->status = 'Active';
        $striker_personnel->save();

        $admin2->application_id = $striker->id;
        $admin2->vpf_id = $striker_personnel->id;
        $admin2->save();
    }
}
