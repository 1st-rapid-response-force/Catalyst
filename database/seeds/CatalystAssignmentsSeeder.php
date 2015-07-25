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
        $group = Group::where('name', '=' ,'1st Rapid Response Force')->first();
        $group1 = Group::where('name', '=' ,'Command Element')->first();
        $group2 = Group::where('name', '=' ,'Staff Departments')->first();
        $group3 = Group::where('name', '=' ,'Special Operations - Direct Action')->first();
        $group4 = Group::where('name', '=' ,'Special Operations - Reconnaissance')->first();
        $group5 = Group::where('name', '=' ,'Mechanised Infantry')->first();
        $group6 = Group::where('name', '=' ,'Motorised Infantry')->first();
        $group7 = Group::where('name', '=' ,'Airborne Infantry')->first();
        $group8 = Group::where('name', '=' ,'Air Assault')->first();
        $group9 = Group::where('name', '=' ,'Rotary CAS')->first();
        $group10 = Group::where('name', '=' ,'Fixed Wing CAS')->first();
        $group11 = Group::where('name', '=' ,'Artillery')->first();
        $group12 = Group::where('name', '=' ,'Amphibious Infantry')->first();
        $group13 = Group::where('name', '=' ,'Logistics')->first();

        // Command Element
        $assignment = new Assignment;
        $assignment->group_id = $group1->id;
        $assignment->name = 'Unit Commander';
        $assignment->mos = '00A';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group1->id;
        $assignment->name = 'Infantry Commander';
        $assignment->mos = '11A';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group1->id;
        $assignment->name = 'Infantry Commander';
        $assignment->mos = '11A';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group1->id;
        $assignment->name = 'Infantry Commander';
        $assignment->mos = '11A';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group1->id;
        $assignment->name = 'Infantry Commander';
        $assignment->mos = '11A';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group1->id;
        $assignment->name = 'Infantry Commander';
        $assignment->mos = '11A';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group1->id;
        $assignment->name = 'Infantry Commander';
        $assignment->mos = '11A';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group1->id;
        $assignment->name = 'Infantry Commander';
        $assignment->mos = '11A';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group1->id;
        $assignment->name = 'Theatre Commander';
        $assignment->mos = '01A';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group1->id;
        $assignment->name = 'Artillery Commander';
        $assignment->mos = '13A';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group1->id;
        $assignment->name = 'Artillery Commander';
        $assignment->mos = '13A';
        $assignment->save();

        // Staff Departments
        $assignment = new Assignment;
        $assignment->group_id = $group2->id;
        $assignment->name = 'Intelligence Officer';
        $assignment->mos = '35D(S2)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group2->id;
        $assignment->name = 'Intelligence Officer';
        $assignment->mos = '35D(S2)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group2->id;
        $assignment->name = 'Simulation Operations Officer';
        $assignment->mos = '57A(S3)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group2->id;
        $assignment->name = 'Simulation Operations Officer';
        $assignment->mos = '57A(S3)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group2->id;
        $assignment->name = 'Simulation Operations Officer';
        $assignment->mos = '57A(S3)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group2->id;
        $assignment->name = 'Simulation Operations Officer';
        $assignment->mos = '57A(S3)';
        $assignment->save();

        // Special Operations - Direct Action
        $assignment = new Assignment;
        $assignment->group_id = $group3->id;
        $assignment->name = 'Special Operations Commander';
        $assignment->mos = '18Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group3->id;
        $assignment->name = 'Special Operations Sergeant';
        $assignment->mos = '18B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group3->id;
        $assignment->name = 'Special Operations Sergeant';
        $assignment->mos = '18B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group3->id;
        $assignment->name = 'Special Operations Sergeant';
        $assignment->mos = '18B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group3->id;
        $assignment->name = 'Special Operations Medical Sergeant';
        $assignment->mos = '18D';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group3->id;
        $assignment->name = 'Special Operations Communication Sergeant';
        $assignment->mos = '18E';
        $assignment->save();

        // Special Operations - Recon
        $assignment = new Assignment;
        $assignment->group_id = $group4->id;
        $assignment->name = 'Reconnaissance Element Commander (Spotter)';
        $assignment->mos = '17Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group4->id;
        $assignment->name = 'Reconnaissance Weapons Sergeant (Sniper)';
        $assignment->mos = '17B';
        $assignment->save();

        // Mechanised Infantry


        // Motorised Infantry
        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Element Commander';
        $assignment->mos = '11Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Element Commander';
        $assignment->mos = '11Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Element Commander';
        $assignment->mos = '11Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group6->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        // Airborne Infantry
        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'C130 Airframe Commander';
        $assignment->mos = '15A(C3)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'C130 Airframe Co-Pilot';
        $assignment->mos = '15W(C3)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'C130 Logistics Sergeant (Jump Master)';
        $assignment->mos = '15B(C3)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Element Commander';
        $assignment->mos = '11Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Element Commander';
        $assignment->mos = '11Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group7->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        // Air Assault
        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'UH-60 / CH-47 Airframe Commander';
        $assignment->mos = '15A(B1/2)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'UH-60 / CH-47 Airframe Commander';
        $assignment->mos = '15A(B1/2)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'UH-60 / CH-47 Airframe Co-Pilot';
        $assignment->mos = '15W(B1/2)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'UH-60 / CH-47 Airframe Co-Pilot';
        $assignment->mos = '15W(B1/2)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'UH-60 / CH-47 Weapons Sergeant';
        $assignment->mos = '15B(B1/2)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'UH-60 / CH-47 Weapons Sergeant';
        $assignment->mos = '15B(B1/2)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'UH-60 / CH-47 Flight Medic';
        $assignment->mos = '68W(A-B1/2)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'UH-60 / CH-47 Flight Medic';
        $assignment->mos = '68W(A-B1/2)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Element Commander';
        $assignment->mos = '11Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Element Commander';
        $assignment->mos = '11Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group8->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        // Rotary CAS
        $assignment = new Assignment;
        $assignment->group_id = $group9->id;
        $assignment->name = 'AH-64 Attack Helicopter Commander';
        $assignment->mos = '15A(A1)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group9->id;
        $assignment->name = 'AH-64 Attack Helicopter Commander';
        $assignment->mos = '15A(A1)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group9->id;
        $assignment->name = 'AH-64 Attack Helicopter Gunner';
        $assignment->mos = '15A(A1)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group9->id;
        $assignment->name = 'AH-64 Attack Helicopter Gunner';
        $assignment->mos = '15W(A1)';
        $assignment->save();

        //Fixed Wing CAS
        $assignment = new Assignment;
        $assignment->group_id = $group10->id;
        $assignment->name = 'F18X Airframe Pilot';
        $assignment->mos = '15A(A2)';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group10->id;
        $assignment->name = 'F18X Airframe Pilot';
        $assignment->mos = '15A(A2)';
        $assignment->save();

        //Artillery
        $assignment = new Assignment;
        $assignment->group_id = $group11->id;
        $assignment->name = 'Artillery Piece Commander';
        $assignment->mos = '13Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group11->id;
        $assignment->name = 'Artillery Piece Commander';
        $assignment->mos = '13Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group11->id;
        $assignment->name = 'Artillery Piece Gunner';
        $assignment->mos = '13B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group11->id;
        $assignment->name = 'Artillery Piece Gunner';
        $assignment->mos = '13B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group11->id;
        $assignment->name = 'Fire Support Communication Specialist';
        $assignment->mos = '13B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group11->id;
        $assignment->name = 'Fire Support Communication Specialist';
        $assignment->mos = '13B';
        $assignment->save();

        //Amphibious Infantry
        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'AMV-7 Vehicle Commander';
        $assignment->mos = '19Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'AMV-7 Vehicle Commander';
        $assignment->mos = '19Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'AMV-7 Vehicle Weapons Specialist';
        $assignment->mos = '19K';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'AMV-7 Vehicle Weapons Specialist';
        $assignment->mos = '19K';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Element Commander';
        $assignment->mos = '11Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Element Commander';
        $assignment->mos = '11Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Personnel';
        $assignment->mos = '11B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Medic';
        $assignment->mos = '68W';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Medic';
        $assignment->mos = '68W';
        $assignment->save();

        //Logistics
        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Support Element Commander';
        $assignment->mos = '92Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Support Element Commander';
        $assignment->mos = '92Z';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Support Specialist';
        $assignment->mos = '92B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Support Specialist';
        $assignment->mos = '92B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Support Specialist';
        $assignment->mos = '92B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Infantry Support Specialist';
        $assignment->mos = '92B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Vehicle Maintenance Specialist';
        $assignment->mos = '91B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Vehicle Maintenance Specialist';
        $assignment->mos = '91B';
        $assignment->save();

        $assignment = new Assignment;
        $assignment->group_id = $group12->id;
        $assignment->name = 'Air Traffic Control Specialist';
        $assignment->mos = '15Q';
        $assignment->save();

    }
}
