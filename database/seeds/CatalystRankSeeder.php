<?php

use Illuminate\Database\Seeder;
use App\Rank;

class CatalystRankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ////////////////////////// RANKS
        // 1
        $rank = new Rank;
        $rank->abbreviation = '';
        $rank->name = '';
        $rank->pay_grade = 'None';
        $rank->image = '/images/ranks/blank.png';
        $rank->promotionPointsRequired = 0;
        $rank->tigRequired = 0;
        $rank->trainingRequired = '';
        $rank->weight = 0;
        $rank->next_rank = 1;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 2
        $rank = new Rank;
        $rank->abbreviation = 'PV1';
        $rank->name = 'Private';
        $rank->pay_grade = 'E-1';
        $rank->image = '/images/ranks/private.png';
        $rank->promotionPointsRequired = 0;
        $rank->tigRequired = 0;
        $rank->trainingRequired = '';
        $rank->weight = 1;
        $rank->next_rank = 3;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 3
        $rank = new Rank;
        $rank->abbreviation = 'PV2';
        $rank->name = 'Private';
        $rank->pay_grade = 'E-2';
        $rank->image = '/images/ranks/private.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 2;
        $rank->next_rank = 4;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 4
        $rank = new Rank;
        $rank->abbreviation = 'PFC';
        $rank->name = 'Private';
        $rank->pay_grade = 'E-3';
        $rank->image = '/images/ranks/private_first_class.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 3;
        $rank->next_rank = 5;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 5
        $rank = new Rank;
        $rank->abbreviation = 'SPC';
        $rank->name = 'Specialist';
        $rank->pay_grade = 'E-4';
        $rank->image = '/images/ranks/specialist.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 4;
        $rank->next_rank = 6;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 6
        $rank = new Rank;
        $rank->abbreviation = 'CPL';
        $rank->name = 'Corporal';
        $rank->pay_grade = 'E-4';
        $rank->image = '/images/ranks/corporal.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 5;
        $rank->next_rank = 7;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 7
        $rank = new Rank;
        $rank->abbreviation = 'SGT';
        $rank->name = 'Sergeant';
        $rank->pay_grade = 'E-5';
        $rank->image = '/images/ranks/sergeant.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 6;
        $rank->next_rank = 8;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 8
        $rank = new Rank;
        $rank->abbreviation = 'SSG';
        $rank->name = 'Staff Sergeant';
        $rank->pay_grade = 'E-6';
        $rank->image = '/images/ranks/staff_sergeant.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 7;
        $rank->next_rank = 9;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 9
        $rank = new Rank;
        $rank->abbreviation = 'SFC';
        $rank->name = 'Sergeant First Class';
        $rank->pay_grade = 'E-7';
        $rank->image = '/images/ranks/staff_sergeant.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 8;
        $rank->next_rank = 10;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 10
        $rank = new Rank;
        $rank->abbreviation = 'MSG';
        $rank->name = 'Master Sergeant';
        $rank->pay_grade = 'E-8';
        $rank->image = '/images/ranks/master_sergeant.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 10;
        $rank->next_rank = 12;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 11
        $rank = new Rank;
        $rank->abbreviation = '1SG';
        $rank->name = 'First Sergeant';
        $rank->pay_grade = 'E-8';
        $rank->image = '/images/ranks/first_sergeant.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 11;
        $rank->next_rank = 1;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 12
        $rank = new Rank;
        $rank->abbreviation = 'SGM';
        $rank->name = 'Sergeant Major';
        $rank->pay_grade = 'E-9';
        $rank->image = '/images/ranks/sergeant_major.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 12;
        $rank->next_rank = 1;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 13
        $rank = new Rank;
        $rank->abbreviation = 'CSM';
        $rank->name = 'Command Sergeant Major';
        $rank->pay_grade = 'E-9';
        $rank->image = '/images/ranks/command_sergeant_major.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 13;
        $rank->next_rank = 1;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 14
        $rank = new Rank;
        $rank->abbreviation = 'WO1';
        $rank->name = 'Warrant Officer 1';
        $rank->pay_grade = 'W-1';
        $rank->image = '/images/ranks/warrant_officer_1.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 14;
        $rank->next_rank = 15;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 15
        $rank = new Rank;
        $rank->abbreviation = 'CW2';
        $rank->name = 'Chief Warrant Officer 2';
        $rank->pay_grade = 'W-2';
        $rank->image = '/images/ranks/chief_warrant_officer_2.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 15;
        $rank->next_rank = 16;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 16
        $rank = new Rank;
        $rank->abbreviation = 'CW3';
        $rank->name = 'Chief Warrant Officer 3';
        $rank->pay_grade = 'W-3';
        $rank->image = '/images/ranks/chief_warrant_officer_3.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 16;
        $rank->next_rank = 17;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 17
        $rank = new Rank;
        $rank->abbreviation = 'CW4';
        $rank->name = 'Chief Warrant Officer 4';
        $rank->pay_grade = 'W-4';
        $rank->image = '/images/ranks/chief_warrant_officer_4.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 17;
        $rank->next_rank = 18;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 18
        $rank = new Rank;
        $rank->abbreviation = 'CW5';
        $rank->name = 'Chief Warrant Officer 5';
        $rank->pay_grade = 'W-4';
        $rank->image = '/images/ranks/chief_warrant_officer_5.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 18;
        $rank->next_rank = 1;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 19
        $rank = new Rank;
        $rank->abbreviation = '2LT';
        $rank->name = 'Second Lieutenant';
        $rank->pay_grade = 'O-1';
        $rank->image = '/images/ranks/second_lieutenant.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 19;
        $rank->next_rank = 20;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 20
        $rank = new Rank;
        $rank->abbreviation = '1LT';
        $rank->name = 'First Lieutenant';
        $rank->pay_grade = 'O-2';
        $rank->image = '/images/ranks/first_lieutenant.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 20;
        $rank->next_rank = 21;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 21
        $rank = new Rank;
        $rank->abbreviation = 'CPT';
        $rank->name = 'Captain';
        $rank->pay_grade = 'O-3';
        $rank->image = '/images/ranks/captain.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 21;
        $rank->next_rank = 22;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 22
        $rank = new Rank;
        $rank->abbreviation = 'MAJ';
        $rank->name = 'Major';
        $rank->pay_grade = 'O-4';
        $rank->image = '/images/ranks/major.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 22;
        $rank->next_rank = 23;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 23
        $rank = new Rank;
        $rank->abbreviation = 'LTC';
        $rank->name = 'Lieutenant Colonel';
        $rank->pay_grade = 'O-5';
        $rank->image = '/images/ranks/lieutenant_colonel.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 23;
        $rank->next_rank = 24;
        $rank->teamspeakGroup = 0;
        $rank->save();

        // 24
        $rank = new Rank;
        $rank->abbreviation = 'COL';
        $rank->name = 'Colonel';
        $rank->pay_grade = 'O-6';
        $rank->image = '/images/ranks/colonel.png';
        $rank->promotionPointsRequired = 10;
        $rank->tigRequired = 30;
        $rank->trainingRequired = '';
        $rank->weight = 24;
        $rank->next_rank = 1;
        $rank->teamspeakGroup = 0;
        $rank->save();
    }
}
