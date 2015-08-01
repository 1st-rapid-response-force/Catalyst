<?php

use Illuminate\Database\Seeder;

use App\Operation;
use App\Ribbon;
use App\Qualification;
use App\School;


class CatalystVPFBase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schools
        $school = new School;
        $school->name = 'Basic Combat Training';
        $school->storage_image = 'cloud';
        $school->public_image  = 'training_g44mik';
        $school->short_description = 'Basic Combat Training Course - Transitions Recruit to a combat member within the 1st RRF';
        $school->description  = 'Basic Combat Training Course - Transitions Recruit to a combat member within the 1st RRF';
        $school->docs = 'None';
        $school->videos = 'None';
        $school->published = true;
        $school->promotionPoints = 10;
        $school->save();

        $school = new School;
        $school->name = 'Advanced Infantry Training - Infantry';
        $school->storage_image = 'cloud';
        $school->public_image  = 'AIT_bnwezv';
        $school->short_description = 'AIT 11B - After Basic Combat Training, AIT 11B will prepare you for your career as an 11B';
        $school->description  = 'AIT - Infantry';
        $school->docs = 'None';
        $school->videos = 'None';
        $school->prerequisites = '1';
        $school->published = true;
        $school->promotionPoints = 5;
        $school->save();

        $school = new School;
        $school->name = 'Advanced Infantry Training - 68W';
        $school->storage_image = 'cloud';
        $school->public_image  = '68W_hqzw2h';
        $school->short_description = 'AIT 68W - After Basic Combat Training, AIT 68W will prepare you for your career as an 68W Medic';
        $school->description  = 'AIT - Infantry';
        $school->docs = 'None';
        $school->videos = 'None';
        $school->prerequisites = '1';
        $school->published = true;
        $school->promotionPoints = 5;
        $school->save();

        $school = new School;
        $school->name = 'Warrior Leadership Course';
        $school->storage_image = 'cloud';
        $school->public_image  = 'wlc_ia5pgj';
        $school->short_description = 'WLC teaches enlisted members the basic skills to lead small groups of Soldiers';
        $school->description  = 'WLC teaches enlisted members the basic skills to lead small groups of Soldiers';
        $school->docs = 'None';
        $school->videos = 'None';
        $school->prerequisites = '1,2';
        $school->published = true;
        $school->promotionPoints = 5;
        $school->save();

        // Ribbon
        $ribbons = new Ribbon;
        $ribbons->name = 'Army Service Ribbon';
        $ribbons->storage_image = 'cloud';
        $ribbons->public_image  = 'v7qsezjleq9d2o3cgiuj';
        $ribbons->description  = 'Awarded for enlisting in the 1st RRF';
        $ribbons->promotionPoints = 2;
        $ribbons->save();



        //// Qualifications
        $qualification = new Qualification;
        $qualification->name = 'Expert Marksman';
        $qualification->storage_image = 'cloud';
        $qualification->public_image  = 'awards_01_tdjlzg';
        $qualification->description  = '';
        $qualification->promotionPoints = 10;
        $qualification->save();

        $qualification = new Qualification;
        $qualification->name = 'Sharpshooter';
        $qualification->storage_image = 'cloud';
        $qualification->public_image  = 'awards_02_zzqacz';
        $qualification->description  = '';
        $qualification->promotionPoints = 6;
        $qualification->save();

        $qualification = new Qualification;
        $qualification->name = 'Marksman';
        $qualification->storage_image = 'cloud';
        $qualification->public_image  = 'awards_03_jvsf0q';
        $qualification->description  = '';
        $qualification->promotionPoints = 3;
        $qualification->save();

        $qualification = new Qualification;
        $qualification->name = 'Rifleman';
        $qualification->storage_image = 'cloud';
        $qualification->public_image  = 'awards_05_qyf5li';
        $qualification->description  = '';
        $qualification->promotionPoints = 1;
        $qualification->save();





    }
}
