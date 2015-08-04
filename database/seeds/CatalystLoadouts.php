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
        $item->classname = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'secondary';
        $item->name = 'No Secondary Weapon';
        $item->classname = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'launcher';
        $item->name = 'No Launcher Weapon';
        $item->classname = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'thrown';
        $item->name = 'No Thrown Weapon';
        $item->classname = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'uniform';
        $item->name = 'No Uniform';
        $item->classname = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'vest';
        $item->name = 'No Vest';
        $item->classname = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'backpack';
        $item->name = 'No Backpack';
        $item->classname = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'helmet';
        $item->name = 'No Helmet';
        $item->classname = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'nightvision';
        $item->name = 'No Nightvision';
        $item->classname = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'binoculars';
        $item->name = 'No Binoculars';
        $item->classname = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'primary_attachments';
        $item->name = 'No Primary Attachments';
        $item->classname = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'secondary_attachments';
        $item->name = 'No Secondary Attachments';
        $item->classname = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'launcher_attachments';
        $item->name = 'No Launcher Attachments';
        $item->classname = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();

        $item = new Loadout;
        $item->qualification_id = $qualification->id;
        $item->category = 'launcher_attachments';
        $item->name = 'No Item';
        $item->classname = '';
        $item->storage_image = 'cloud';
        $item->public_image = 'Blank_square_wcxmd7';
        $item->empty = true;
        $item->save();




    }
}
