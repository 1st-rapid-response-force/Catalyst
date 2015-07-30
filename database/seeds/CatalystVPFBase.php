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
        //////////////////////////////////////////
        /// REMOVE THESE BEFORE PRODUCTION, TESTING
        //Remove Operation before Production Push
        $operation = new Operation;
        $operation->name = 'Test Operation';
        $operation->storage_image = 'false';
        $operation->public_image  = 'placeholder.png';
        $operation->description  = '';
        $operation->date  = '2015-01-01 00:00:00';
        $operation->promotionPoints = 5;
        $operation->save();

        $operation = new Operation;
        $operation->name = 'Test Operation 2';
        $operation->storage_image = 'false';
        $operation->public_image  = 'placeholder.png';
        $operation->description  = '';
        $operation->date  = '2015-01-05 00:00:00';
        $operation->promotionPoints = 5;
        $operation->save();

        $ribbons = new Ribbon;
        $ribbons->name = 'Test Ribbon';
        $ribbons->storage_image = 'cloud';
        $ribbons->public_image  = 'v7qsezjleq9d2o3cgiuj';
        $ribbons->description  = 'Test Ribbon';
        $ribbons->promotionPoints = 5;
        $ribbons->save();


        ////////////// REMOVE END
        //////////////////////////////////////////////

        // Schools
        $school = new School;
        $school->name = 'Basic Combat Training';
        $school->storage_image = 'false';
        $school->public_image  = 'placeholder.png';
        $school->description  = 'Basic Combat Training Course - Transitions Recruit to a combat member within the 1st RRF';
        $school->docs = 'None';
        $school->videos = 'None';
        $school->prerequisites = '';
        $school->published = true;
        $school->promotionPoints = 10;
        $school->save();

        $school = new School;
        $school->name = 'Advanced Infantry Training - Infantry';
        $school->storage_image = 'false';
        $school->public_image  = 'placeholder.png';
        $school->description  = 'AIT - Infantry';
        $school->docs = 'None';
        $school->videos = 'None';
        $school->prerequisites = '';
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
