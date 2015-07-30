<?php

use Illuminate\Database\Seeder;
use App\Group;
use App\Assignment;

class CatalystAssignmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Command Element
        $assignment = new Assignment;
        $assignment->group_id = 2;
        $assignment->name = 'Unit Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 2;
        $assignment->name = 'Infantry Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 2;
        $assignment->name = 'Infantry Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 2;
        $assignment->name = 'Infantry Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 2;
        $assignment->name = 'Infantry Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 2;
        $assignment->name = 'Infantry Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 2;
        $assignment->name = 'Infantry Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 2;
        $assignment->name = 'Theatre Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 2;
        $assignment->name = 'Artillery Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 4;
        $assignment->name = 'Intelligence Officer';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 4;
        $assignment->name = 'Intelligence Officer';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 4;
        $assignment->name = 'Intelligence Officer';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 4;
        $assignment->name = 'Intelligence Officer';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 4;
        $assignment->name = 'Intelligence Officer';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 5;
        $assignment->name = 'Simulation Operations Officer';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 5;
        $assignment->name = 'Simulation Operations Officer';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 5;
        $assignment->name = 'Simulation Operations Officer';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 5;
        $assignment->name = 'Simulation Operations Officer';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 5;
        $assignment->name = 'Simulation Operations Officer';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 6;
        $assignment->name = 'Special Operations Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 6;
        $assignment->name = 'Special Operations Sergeant';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 6;
        $assignment->name = 'Special Operations Sergeant';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 6;
        $assignment->name = 'Special Operations Sergeant';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 6;
        $assignment->name = 'Special Medical Sergeant';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 6;
        $assignment->name = 'Special Communication Sergeant';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 7;
        $assignment->name = 'Reconnaissance Element Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 7;
        $assignment->name = 'Reconnaissance Weapons Sergeant';
        $assignment->save();

        /// MECH

        // VECH 1
        $assignment = new Assignment;
        $assignment->group_id = 9;
        $assignment->name = 'Bradley Vehicle Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 9;
        $assignment->name = 'Bradley Vehicle Crew Member';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 9;
        $assignment->name = 'Bradley Vehicle Crew Member';
        $assignment->save();

        // VECH 2
        $assignment = new Assignment;
        $assignment->group_id = 10;
        $assignment->name = 'Bradley Vehicle Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 10;
        $assignment->name = 'Bradley Vehicle Crew Member';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 10;
        $assignment->name = 'Bradley Vehicle Crew Member';
        $assignment->save();

        //SQUAD 1
        $assignment = new Assignment;
        $assignment->group_id = 11;
        $assignment->name = 'Infantry Element Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 11;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 11;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 11;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 11;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 11;
        $assignment->name = 'Infantry Medic';
        $assignment->save();

        //SQUAD 2
        $assignment = new Assignment;
        $assignment->group_id = 12;
        $assignment->name = 'Infantry Element Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 12;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 12;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 12;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 12;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 12;
        $assignment->name = 'Infantry Medic';
        $assignment->save();

        /////// MOTOR
        //////////////// Squad 1
        $assignment = new Assignment;
        $assignment->group_id = 14;
        $assignment->name = 'Infantry Element Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 14;
        $assignment->name = 'Infantry Personnel';
        $assignment->entry_level = true;
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 14;
        $assignment->name = 'Infantry Personnel';
        $assignment->entry_level = true;
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 14;
        $assignment->name = 'Infantry Personnel';
        $assignment->entry_level = true;
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 14;
        $assignment->name = 'Infantry Personnel';
        $assignment->entry_level = true;
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 14;
        $assignment->name = 'Infantry Personnel';
        $assignment->entry_level = true;
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 14;
        $assignment->name = 'Infantry Personnel';
        $assignment->entry_level = true;
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 14;
        $assignment->name = 'Infantry Medic';
        $assignment->entry_level = true;
        $assignment->save();

        //////////////// Squad 2
        $assignment = new Assignment;
        $assignment->group_id = 15;
        $assignment->name = 'Infantry Element Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 15;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 15;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 15;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 15;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 15;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 15;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 15;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        //////////////// Squad 3
        $assignment = new Assignment;
        $assignment->group_id = 16;
        $assignment->name = 'Infantry Element Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 16;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 16;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 16;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 16;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 16;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 16;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 16;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        //// Airborne
        //////////////// Airframe
        $assignment = new Assignment;
        $assignment->group_id = 18;
        $assignment->name = 'C130 Airframe Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 18;
        $assignment->name = 'C130 Airframe Co-Pilot';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 18;
        $assignment->name = 'C130 Logistics Sergeant';
        $assignment->save();

        //////////////// Squad 1
        $assignment = new Assignment;
        $assignment->group_id = 19;
        $assignment->name = 'Infantry Element Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 19;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 19;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 19;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 19;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 19;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 19;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 19;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        //////////////// Squad 2
        $assignment = new Assignment;
        $assignment->group_id = 20;
        $assignment->name = 'Infantry Element Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 20;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 20;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 20;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 20;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 20;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 20;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 20;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        ////////////// Air Assault
        //////////////// Air Frame 1
        $assignment = new Assignment;
        $assignment->group_id = 22;
        $assignment->name = 'UH-60 / CH-47 Airframe Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 22;
        $assignment->name = 'UH-60 / CH-47 Airframe Co-Pilot';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 22;
        $assignment->name = 'UH-60 / CH-47 Weapons Sergeant';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 22;
        $assignment->name = 'UH-60 / CH-47 Weapons Sergeant';
        $assignment->save();

        //////////////// Air Frame 2
        $assignment = new Assignment;
        $assignment->group_id = 23;
        $assignment->name = 'UH-60 / CH-47 Airframe Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 23;
        $assignment->name = 'UH-60 / CH-47 Airframe Co-Pilot';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 23;
        $assignment->name = 'UH-60 / CH-47 Weapons Sergeant';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 23;
        $assignment->name = 'UH-60 / CH-47 Weapons Sergeant';
        $assignment->save();

        //////////////// Squad 1
        $assignment = new Assignment;
        $assignment->group_id = 24;
        $assignment->name = 'Infantry Element Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 24;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 24;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 24;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 24;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 24;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 24;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 24;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        //////////////// Squad 2
        $assignment = new Assignment;
        $assignment->group_id = 25;
        $assignment->name = 'Infantry Element Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 25;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 25;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 25;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 25;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 25;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 25;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 25;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        /////// Rotory CAS
        ////////////Airframe 1
        $assignment = new Assignment;
        $assignment->group_id = 27;
        $assignment->name = 'AH-64 Attack Helicopter Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 27;
        $assignment->name = 'AH-64 Attack Helicopter Gunner';
        $assignment->save();

        ////////////Airframe 2
        $assignment = new Assignment;
        $assignment->group_id = 28;
        $assignment->name = 'AH-64 Attack Helicopter Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 28;
        $assignment->name = 'AH-64 Attack Helicopter Gunner';
        $assignment->save();

        //////// CAS
        ////////////Airframe 1
        $assignment = new Assignment;
        $assignment->group_id = 30;
        $assignment->name = 'F18X Airframe Pilot';
        $assignment->save();

        ////////////Airframe 2
        $assignment = new Assignment;
        $assignment->group_id = 31;
        $assignment->name = 'F18X Airframe Pilot';
        $assignment->save();


        //////// Artillery
        ///////////// Battery 1
        $assignment = new Assignment;
        $assignment->group_id = 33;
        $assignment->name = 'Artillery Piece Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 33;
        $assignment->name = 'Artillery Piece Gunner';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 33;
        $assignment->name = 'Fire Support Communication Specialist';
        $assignment->save();

        ///////////// Battery 2
        $assignment = new Assignment;
        $assignment->group_id = 34;
        $assignment->name = 'Artillery Piece Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 34;
        $assignment->name = 'Artillery Piece Gunner';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 34;
        $assignment->name = 'Fire Support Communication Specialist';
        $assignment->save();

        //////// Amphibious
        ///////////// Marshall 1
        $assignment = new Assignment;
        $assignment->group_id = 36;
        $assignment->name = 'AMV-7 Vehicle Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 36;
        $assignment->name = 'AMV-7 Vehicle Crew Member';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 36;
        $assignment->name = 'AMV-7 Vehicle Crew Member';
        $assignment->save();

        ///////////// Marshall 2
        $assignment = new Assignment;
        $assignment->group_id = 37;
        $assignment->name = 'AMV-7 Vehicle Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 37;
        $assignment->name = 'AMV-7 Vehicle Crew Member';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 37;
        $assignment->name = 'AMV-7 Vehicle Crew Member';
        $assignment->save();

//////////////// Squad 1
        $assignment = new Assignment;
        $assignment->group_id = 38;
        $assignment->name = 'Infantry Element Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 38;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 38;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 38;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 38;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 38;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 38;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 38;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        //////////////// Squad 2
        $assignment = new Assignment;
        $assignment->group_id = 39;
        $assignment->name = 'Infantry Element Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 39;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 39;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 39;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 39;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 39;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 39;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 39;
        $assignment->name = 'Infantry Personnel';
        $assignment->save();

        ////////// Logistics
        // Team 1
        $assignment = new Assignment;
        $assignment->group_id = 41;
        $assignment->name = 'Infantry Support Element Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 41;
        $assignment->name = 'Infantry Support Specialist';
        $assignment->entry_level = true;
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 41;
        $assignment->name = 'Infantry Support Specialist';
        $assignment->entry_level = true;
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 41;
        $assignment->name = 'Vehicle Maintenance Specialist';
        $assignment->entry_level = true;
        $assignment->save();

        //Team 2
        $assignment = new Assignment;
        $assignment->group_id = 42;
        $assignment->name = 'Infantry Support Element Commander';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 42;
        $assignment->name = 'Infantry Support Specialist';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 42;
        $assignment->name = 'Infantry Support Specialist';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 42;
        $assignment->name = 'Vehicle Maintenance Specialist';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = 43;
        $assignment->name = 'Air Traffic Control Specialist';
        $assignment->save();

        /// Recruit
        $assignment = new Assignment;
        $assignment->group_id = 44;
        $assignment->name = 'Recruit';
        $assignment->save();

    }
}
