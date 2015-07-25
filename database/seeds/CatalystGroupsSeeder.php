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

        $group = new Group;
        $group->parent_id = 2;
        $group->name = 'Staff Departments';
        $group->description = 'The Officer Corp';
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

        $group = new Group;
        $group->parent_id = 2;
        $group->name = 'Mechanised Infantry';
        $group->description = '';
        $group->image = '/images/groups/mech_infantry.png';
        $group->save();

        $group = new Group;
        $group->parent_id = 2;
        $group->name = 'Motorised Infantry';
        $group->description = '';
        $group->image = '/images/groups/motor_infantry.png';
        $group->save();

        $group = new Group;
        $group->parent_id = 2;
        $group->name = 'Airborne Infantry';
        $group->description = '';
        $group->image = '/images/groups/air_infantry.png';
        $group->save();

        $group = new Group;
        $group->parent_id = 2;
        $group->name = 'Air Assault';
        $group->description = '';
        $group->image = '/images/groups/air_infantry.png';
        $group->save();

        $group = new Group;
        $group->parent_id = 2;
        $group->name = 'Rotary CAS';
        $group->description = '';
        $group->image = '/images/groups/rotary_cas.png';
        $group->save();

        $group = new Group;
        $group->parent_id = 2;
        $group->name = 'Fixed Wing CAS';
        $group->description = 'Air Supremacy';
        $group->image = '/images/groups/rotary_cas.png';
        $group->save();

        $group = new Group;
        $group->parent_id = 2;
        $group->name = 'Artillery';
        $group->description = '';
        $group->image = '/images/groups/artillery.png';
        $group->save();

        $group = new Group;
        $group->parent_id = 2;
        $group->name = 'Amphibious Infantry';
        $group->description = '';
        $group->image = '/images/groups/amp_infantry.png';
        $group->save();

        $group = new Group;
        $group->parent_id = 2;
        $group->name = 'Logistics';
        $group->description = '';
        $group->image = '/images/groups/logistics.png';
        $group->save();

    }
}
