<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $env = \App::environment();

        Model::unguard();
        if ($env == 'production')
        {
            $this->call(EventCategorySeeder::class);
        }

        if ($env == 'local')
        {
            /*
            $this->call(CatalystSeeder::class);
            $this->call(CatalystRankSeeder::class);
            $this->call(CatalystGroupsSeeder::class);
            $this->call(CatalystAssignmentsSeeder::class);
            $this->call(CatalystMOSSeeder::class);
            $this->call(CatalystVPFBase::class);
            $this->call(AddMOSImage::class);
            $this->call(CatalystLoadouts::class);
            $this->call(DischargeAssignment::class);
            $this->call(CreateFirstPerstat::class);
            */
            $this->call(EventCategorySeeder::class);
        }

        Model::reguard();
    }
}
