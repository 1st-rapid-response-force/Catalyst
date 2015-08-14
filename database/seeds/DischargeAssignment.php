<?php

use App\Assignment;
use Illuminate\Database\Seeder;

class DischargeAssignment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reseed to deal with recruit issue on next deployment
        //Discharged
        $mos = new \App\MOS;
        $mos->name = 'Discharged';
        $mos->mos = '';
        $mos->image = "/frontend/images/loadouts/infantry.png";
        $mos->rank_limitation_id = 1;
        $mos->save();

        /// Discharge
        $assignment = new Assignment;
        $assignment->group_id = 1;
        $assignment->name = 'Discharged';
        $assignment->mos_id = $mos->id;
        $assignment->save();
    }
}
