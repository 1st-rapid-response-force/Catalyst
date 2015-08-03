<?php

use Illuminate\Database\Seeder;

class AddMOSImage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moses = \App\MOS::findMany([1,2,3,4,5,6]);
        foreach($moses as $mos)
        {
            $mos->image = "/frontend/images/loadouts/officer.png";
            $mos->save();
        }

        $moses = \App\MOS::findMany([7,8,9,10]);
        foreach($moses as $mos)
        {
            $mos->image = "/frontend/images/loadouts/special_forces.png";
            $mos->save();
        }

        $moses = \App\MOS::findMany([11,12]);
        foreach($moses as $mos)
        {
            $mos->image = "/frontend/images/loadouts/sniper.png";
            $mos->save();
        }

        $moses = \App\MOS::findMany([13,14]);
        foreach($moses as $mos)
        {
            $mos->image = "/frontend/images/loadouts/armored_crewmember.png";
            $mos->save();
        }

        $moses = \App\MOS::findMany([15,16,17]);
        foreach($moses as $mos)
        {
            $mos->image = "/frontend/images/loadouts/infantry.png";
            $mos->save();
        }

        $moses = \App\MOS::findMany([18,19,20]);
        foreach($moses as $mos)
        {
            $mos->image = "/frontend/images/loadouts/helicopter-pilot.png";
            $mos->save();
        }

        $moses = \App\MOS::findMany([21,22,23]);
        foreach($moses as $mos)
        {
            $mos->image = "/frontend/images/loadouts/jet-pilot.png";
            $mos->save();
        }

        $moses = \App\MOS::findMany([24,25]);
        foreach($moses as $mos)
        {
            $mos->image = "/frontend/images/loadouts/helicopter-pilot.png";
            $mos->save();
        }

        $moses = \App\MOS::findMany([26]);
        foreach($moses as $mos)
        {
            $mos->image = "/frontend/images/loadouts/jet-pilot.png";
            $mos->save();
        }

        $moses = \App\MOS::findMany([30,31]);
        foreach($moses as $mos)
        {
            $mos->image = "/frontend/images/loadouts/armored_crewmember.png";
            $mos->save();
        }


        $moses = \App\MOS::findMany([27,28,29,32,33,34,35]);
        foreach($moses as $mos)
        {
            $mos->image = "/frontend/images/loadouts/infantry.png";
            $mos->save();
        }







    }
}
