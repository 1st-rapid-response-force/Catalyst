<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Group;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CatalystSeeder::class);
        $this->call(CatalystRankSeeder::class);
        $this->call(CatalystGroupsSeeder::class);
        $this->call(CatalystAssignmentsSeeder::class);
        Model::reguard();
    }
}
