<?php

use Illuminate\Database\Seeder;
use App\Group;

class CatalystGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new Group;
        $group->parent_id = 1;
        $group->name = '1st Rapid Response Force';
        $group->description = '';
        $group->image = '/images/groups/1st_rrf.png';
        $group->save();

        $group = new Group;
        $group->parent_id = 1;
        $group->name = 'Command Element';
        $group->description = 'The Officer Corp';
        $group->image = '/images/groups/command_element.png';
        $group->save();

        $staff = new Group;
        $staff->parent_id = 2;
        $staff->name = 'Staff Departments';
        $staff->description = 'The Officer Corp';
        $staff->image = '/images/groups/command_element.png';
        $staff->save();

        $group = new Group;
        $group->parent_id = $staff->id;
        $group->name = 'S2 Department';
        $group->description = 'Intelligence';
        $group->image = '/images/groups/command_element.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $staff->id;
        $group->name = 'S3 Department';
        $group->description = 'Operations';
        $group->image = '/images/groups/command_element.png';
        $group->save();

        $group = new Group;
        $group->parent_id = 2;
        $group->name = 'Special Operations - Direct Action';
        $group->description = 'Direct Action Group';
        $group->image = '/images/groups/sf_direct_action.png';
        $group->save();

        $group = new Group;
        $group->parent_id = 2;
        $group->name = 'Special Operations - Reconnaissance';
        $group->description = 'Sniper Team';
        $group->image = '/images/groups/sf_direct_action.png';
        $group->save();

        ///////////////////// MECH
        $mech = new Group;
        $mech->parent_id = 2;
        $mech->name = 'Mechanised Infantry';
        $mech->description = '';
        $mech->image = '/images/groups/mech_infantry.png';
        $mech->save();

        $group = new Group;
        $group->parent_id = $mech->id;
        $group->name = 'Mechanised Infantry - Bradley Vehicle 1';
        $group->description = '';
        $group->image = '/images/groups/mech_infantry.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $mech->id;
        $group->name = 'Mechanised Infantry - Bradley Vehicle 2';
        $group->description = '';
        $group->image = '/images/groups/mech_infantry.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $mech->id;
        $group->name = 'Mechanised Infantry - 1st Squad';
        $group->description = '';
        $group->image = '/images/groups/mech_infantry.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $mech->id;
        $group->name = 'Mechanised Infantry - 2nd Squad';
        $group->description = '';
        $group->image = '/images/groups/mech_infantry.png';
        $group->save();



        //////////////////// MOTOR
        $motor = new Group;
        $motor->parent_id = 2;
        $motor->name = 'Motorised Infantry';
        $motor->description = '';
        $motor->image = '/images/groups/motor_infantry.png';
        $motor->save();

        $group = new Group;
        $group->parent_id = $motor->id;
        $group->name = 'Motorised Infantry - 1nd Squad';
        $group->description = '';
        $group->image = '/images/groups/motor_infantry.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $motor->id;
        $group->name = 'Motorised Infantry - 2nd Squad';
        $group->description = '';
        $group->image = '/images/groups/motor_infantry.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $motor->id;
        $group->name = 'Motorised Infantry - 3rd Squad';
        $group->description = '';
        $group->image = '/images/groups/motor_infantry.png';
        $group->save();

        ///////////////// AIRBORNE
        $airborne = new Group;
        $airborne->parent_id = 2;
        $airborne->name = 'Airborne Infantry';
        $airborne->description = '';
        $airborne->image = '/images/groups/air_infantry.png';
        $airborne->save();

        $group = new Group;
        $group->parent_id = $airborne->id;
        $group->name = 'Airborne Infantry - Airframe';
        $group->description = '';
        $group->image = '/images/groups/air_infantry.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $airborne->id;
        $group->name = 'Airborne Infantry - 1st Squad';
        $group->description = '';
        $group->image = '/images/groups/air_infantry.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $airborne->id;
        $group->name = 'Airborne Infantry - 2nd Squad';
        $group->description = '';
        $group->image = '/images/groups/air_infantry.png';
        $group->save();


        ////////////////// Air Assault
        $airassault = new Group;
        $airassault->parent_id = 2;
        $airassault->name = 'Air Assault';
        $airassault->description = '';
        $airassault->image = '/images/groups/air_assault.png';
        $airassault->save();

        $group = new Group;
        $group->parent_id = $airassault->id;
        $group->name = 'Air Assault - Airframe 1';
        $group->description = '';
        $group->image = '/images/groups/air_assault.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $airassault->id;
        $group->name = 'Air Assault - Airframe 2';
        $group->description = '';
        $group->image = '/images/groups/air_assault.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $airassault->id;
        $group->name = 'Air Assault - 1st Squad';
        $group->description = '';
        $group->image = '/images/groups/air_assault.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $airassault->id;
        $group->name = 'Air Assault - 2nd Squad';
        $group->description = '';
        $group->image = '/images/groups/air_assault.png';
        $group->save();

        ////////////////////// ROTORY CAS

        $rotorycas = new Group;
        $rotorycas->parent_id = 2;
        $rotorycas->name = 'Rotary CAS';
        $rotorycas->description = '';
        $rotorycas->image = '/images/groups/rotary_cas.png';
        $rotorycas->save();

        $group = new Group;
        $group->parent_id = $rotorycas->id;
        $group->name = 'Rotary CAS - 1st Airframe';
        $group->description = '';
        $group->image = '/images/groups/rotary_cas.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $rotorycas->id;
        $group->name = 'Rotary CAS - 2nd Airframe';
        $group->description = '';
        $group->image = '/images/groups/rotary_cas.png';
        $group->save();


        ///////////////////// Fixed Wing CAS
        $cas = new Group;
        $cas->parent_id = 2;
        $cas->name = 'Fixed Wing CAS';
        $cas->description = 'Air Supremacy';
        $cas->image = '/images/groups/cas.png';
        $cas->save();

        $group = new Group;
        $group->parent_id = $cas->id;
        $group->name = 'Fixed Wing CAS - Airframe 1';
        $group->description = 'Air Supremacy';
        $group->image = '/images/groups/cas.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $cas->id;
        $group->name = 'Fixed Wing CAS - Airframe 2';
        $group->description = 'Air Supremacy';
        $group->image = '/images/groups/cas.png';
        $group->save();


        /////////// ARTILLERY
        $artillery = new Group;
        $artillery->parent_id = 2;
        $artillery->name = 'Artillery';
        $artillery->description = '';
        $artillery->image = '/images/groups/artillery.png';
        $artillery->save();

        $group = new Group;
        $group->parent_id = $artillery->id;
        $group->name = 'Artillery - Battery 1';
        $group->description = 'Artillery';
        $group->image = '/images/groups/cas.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $artillery->id;
        $group->name = 'Artillery - Battery 2';
        $group->description = 'Artillery';
        $group->image = '/images/groups/cas.png';
        $group->save();



        //////////////// Amphibious
        $sea = new Group;
        $sea->parent_id = 2;
        $sea->name = 'Amphibious Infantry';
        $sea->description = '';
        $sea->image = '/images/groups/amp_infantry.png';
        $sea->save();

        $group = new Group;
        $group->parent_id = $sea->id;
        $group->name = 'Amphibious Infantry - Marshall 1';
        $group->description = '';
        $group->image = '/images/groups/amp_infantry.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $sea->id;
        $group->name = 'Amphibious Infantry - Marshall 2';
        $group->description = '';
        $group->image = '/images/groups/amp_infantry.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $sea->id;
        $group->name = 'Amphibious Infantry - 1st Squad';
        $group->description = '';
        $group->image = '/images/groups/amp_infantry.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $sea->id;
        $group->name = 'Amphibious Infantry - 2nd Squad';
        $group->description = '';
        $group->image = '/images/groups/amp_infantry.png';
        $group->save();


        ////////////// LOGISTICS
        $log = new Group;
        $log->parent_id = 2;
        $log->name = 'Logistics';
        $log->description = '';
        $log->image = '/images/groups/logistics.png';
        $log->save();

        $group = new Group;
        $group->parent_id = $log->id;
        $group->name = 'Logistics - Team 1';
        $group->description = '';
        $group->image = '/images/groups/logistics.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $log->id;
        $group->name = 'Logistics - Team 2';
        $group->description = '';
        $group->image = '/images/groups/logistics.png';
        $group->save();

        $group = new Group;
        $group->parent_id = $log->id;
        $group->name = 'Logistics - ATC';
        $group->description = '';
        $group->image = '/images/groups/logistics.png';
        $group->save();

        ////// Recruits
        $group = new Group;
        $group->parent_id = 1;
        $group->name = 'Recruits';
        $group->description = '';
        $group->image = '';
        $group->save();

    }
}
