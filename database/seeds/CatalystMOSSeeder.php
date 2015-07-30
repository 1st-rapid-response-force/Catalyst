<?php

use Illuminate\Database\Seeder;
use App\MOS;
use App\Rank;
use App\Assignment;

class CatalystMOSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $COL = Rank::where('abbreviation','=','COL')->first();
        $MAJ = Rank::where('abbreviation','=','MAJ')->first();
        $CPT = Rank::where('abbreviation','=','CPT')->first();
        $SMG = Rank::where('abbreviation','=','SGM')->first();
        $MSG = Rank::where('abbreviation','=','MSG')->first();
        $CW5 = Rank::where('abbreviation','=','CW5')->first();
        $CW4 = Rank::where('abbreviation','=','CW4')->first();
        $CW2 = Rank::where('abbreviation','=','CW2')->first();
        $SFC = Rank::where('abbreviation','=','SFC')->first();
        $SSG = Rank::where('abbreviation','=','SSG')->first();
        $SGT = Rank::where('abbreviation','=','SGT')->first();
        $SPC = Rank::where('abbreviation','=','SPC')->first();


        //Command
        $mos = new MOS;
        $mos->name = 'Unit Commander';
        $mos->mos = '00A';
        $mos->rank_limitation_id = $COL->id;
        $mos->save();

        $mos = new MOS;
        $mos->name = 'Infantry Commander';
        $mos->mos = '11A';
        $mos->rank_limitation_id = $CPT->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'Theatre Commander';
        $mos->mos = '01A';
        $mos->rank_limitation_id = $MAJ->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'Artillery Commander';
        $mos->mos = '13A';
        $mos->rank_limitation_id = $CPT->id;
        $mos->save();
        

        // Staff

        $mos = new MOS;
        $mos->name = 'Intelligence Officer';
        $mos->mos = '35D(S2)';
        $mos->rank_limitation_id = $CW2->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'Simulation Operations Officer';
        $mos->mos = '57A(S3)';
        $mos->rank_limitation_id = $CW4->id;
        $mos->save();
        

        //Special Operations Direct Action
        $mos = new MOS;
        $mos->name = 'Special Operations Commander';
        $mos->mos = '18Z';
        $mos->rank_limitation_id = $SMG->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'Special Operations Sergeant';
        $mos->mos = '18B';
        $mos->rank_limitation_id = $MSG->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'Special Operations Medical Sergeant';
        $mos->mos = '18D';
        $mos->rank_limitation_id = $MSG->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'Special Operations Communication Sergeant';
        $mos->mos = '18E';
        $mos->rank_limitation_id = $MSG->id;
        $mos->save();
        

        // Recon
        $mos = new MOS;
        $mos->name = 'Reconnaissance Element Commander';
        $mos->mos = '17Z';
        $mos->rank_limitation_id = $SMG->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'Reconnaissance Weapons Sergeant';
        $mos->mos = '17B';
        $mos->rank_limitation_id = $MSG->id;
        $mos->save();
        

        //MECH
        $mos = new MOS;
        $mos->name = 'Bradley Vehicle Commander';
        $mos->mos = '19Z';
        $mos->rank_limitation_id = $SFC->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'Bradley Vehicle Crew Member';
        $mos->mos = '19K';
        $mos->rank_limitation_id = $SGT->id;
        $mos->save();
        

        // INFANTRY
        $mos = new MOS;
        $mos->name = 'Infantry Element Commander';
        $mos->mos = '11Z';
        $mos->rank_limitation_id = $SFC->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'Infantry Personnel';
        $mos->mos = '11B';
        $mos->rank_limitation_id = $SGT->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'Infantry Medic';
        $mos->mos = '68W';
        $mos->rank_limitation_id = $SGT->id;
        $mos->save();
        

        //AIRBORNE
        $mos = new MOS;
        $mos->name = 'C130 Airframe Commander';
        $mos->mos = '15A(C3)';
        $mos->rank_limitation_id = $CW4->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'C130 Airframe Co-Pilot';
        $mos->mos = '15W(C3)';
        $mos->rank_limitation_id = $CW2->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'C130 Logistics Sergeant';
        $mos->mos = '15B(C3)';
        $mos->rank_limitation_id = $SGT->id;
        $mos->save();
        

        //AIR ASSAULT
        $mos = new MOS;
        $mos->name = 'UH-60 / CH-47 Airframe Commander';
        $mos->mos = '15A(B1/2)';
        $mos->rank_limitation_id = $CW4->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'UH-60 / CH-47 Airframe Co-Pilot';
        $mos->mos = '15W(B1/2)';
        $mos->rank_limitation_id = $CW2->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'UH-60 / CH-47 Weapons Sergeant';
        $mos->mos = '15B(B1/2)';
        $mos->rank_limitation_id = $SGT->id;
        $mos->save();
        

        //ROTARY CAS
        $mos = new MOS;
        $mos->name = 'AH-64 Attack Helicopter Commander';
        $mos->mos = '15A(A1)';
        $mos->rank_limitation_id = $CW4->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'AH-64 Attack Helicopter Gunner';
        $mos->mos = '15B(A1)';
        $mos->rank_limitation_id = $CW2->id;
        $mos->save();
        

        //Fixed
        $mos = new MOS;
        $mos->name = 'F18X Airframe Pilot';
        $mos->mos = '15A(A2)';
        $mos->rank_limitation_id = $CW5->id;
        $mos->save();
        

        //Artillery
        $mos = new MOS;
        $mos->name = 'Artillery Piece Commander';
        $mos->mos = '13Z';
        $mos->rank_limitation_id = $SSG->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'Artillery Piece Gunner';
        $mos->mos = '13B';
        $mos->rank_limitation_id = $SSG->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'Fire Support Communication Specialist';
        $mos->mos = '13F';
        $mos->rank_limitation_id = $SGT->id;
        $mos->save();
        

        //Amphibious
        $mos = new MOS;
        $mos->name = 'AMV-7 Vehicle Commander';
        $mos->mos = '88Z';
        $mos->rank_limitation_id = $SFC->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'AMV-7 Vehicle Weapons Specialist';
        $mos->mos = '88W';
        $mos->rank_limitation_id = $SGT->id;
        $mos->save();
        

        //Logistic
        $mos = new MOS;
        $mos->name = 'Infantry Support Element Commander';
        $mos->mos = '92Z';
        $mos->rank_limitation_id = $SGT->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'Infantry Support Specialist';
        $mos->mos = '92B';
        $mos->rank_limitation_id = $SPC->id;
        $mos->save();
        

        $mos = new MOS;
        $mos->name = 'Vehicle Maintenance Specialist';
        $mos->mos = '91B';
        $mos->rank_limitation_id = $SPC->id;
        $mos->save();
        $this->attachToAssignments($mos->id);

        $mos = new MOS;
        $mos->name = 'Air Traffic Control Specialist';
        $mos->mos = '15Q';
        $mos->rank_limitation_id = $SGT->id;
        $mos->save();


        $this->attachToAssignments();
    }

    private function attachToAssignments()
    {
        $allmos = MOS::all();
        foreach($allmos as $mos)
        {
            //Find Assignment
            $assignments = Assignment::where('name','=',$mos->name)->get();

            foreach($assignments as $assign)
            {
                $assign->mos_id = $mos->id;
                $assign->save();
            }
        }

    }
}
