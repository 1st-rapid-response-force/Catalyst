<?php

use Illuminate\Database\Seeder;
use App\Loadout;

class CatalystLoadouts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qualification = new \App\Qualification;
        $qualification->name = '1st RRF - Member';
        $qualification->description = 'Enlisted into the 1st RRF';
        $qualification->storage_image = 'cloud';
        $qualification->public_image = 'patch_xvxndf';
        $qualification->save();

        // Add Blank Objects for all categories
        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'primary';
        $item->name = 'No Primary Weapon';
        $item->class_name = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'secondary';
        $item->name = 'No Secondary Weapon';
        $item->class_name = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'launcher';
        $item->name = 'No Launcher Weapon';
        $item->class_name = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'thrown';
        $item->name = 'No Thrown Weapon';
        $item->class_name = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'uniform';
        $item->name = 'No Uniform';
        $item->class_name = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'vest';
        $item->name = 'No Vest';
        $item->class_name = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'backpack';
        $item->name = 'No Backpack';
        $item->class_name = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'helmet';
        $item->name = 'No Helmet';
        $item->class_name = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'goggles';
        $item->name = 'No Goggles';
        $item->class_name = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'nightvision';
        $item->name = 'No Nightvision';
        $item->class_name = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'binoculars';
        $item->name = 'No Binoculars';
        $item->class_name = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'primary_attachments';
        $item->name = 'No Primary Attachments';
        $item->class_name = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'secondary_attachments';
        $item->name = 'No Secondary Attachments';
        $item->class_name = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'launcher_attachments';
        $item->name = 'No Launcher Attachments';
        $item->class_name = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'launcher_attachments';
        $item->name = 'No Item';
        $item->class_name = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        //Deal with origin members
        $users = \App\VPF::findMany([1,2,3]);
        //Adds base level qualification for My Loadout
        $rrfQualification = \App\Qualification::where('name','=','1st RRF - Member')->first();

        foreach($users as $user)
        {
            $user->qualifications()->attach([
                $rrfQualification->id => ['date_awarded' => \Carbon\Carbon::now()],
            ]);
        }

        // Fix loadouts for all members by clearing them
        $all = \App\VPF::all();
        foreach($all as $vpf)
        {
            $vpf->loadout()->sync([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]);
        }


    }
}
