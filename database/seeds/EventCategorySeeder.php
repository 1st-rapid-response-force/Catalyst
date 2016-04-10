<?php

use Illuminate\Database\Seeder;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $training = \App\EventCategory::create([
            'title' => 'Training',
            'status' => 1,
        ]);

        $modpack = \App\EventCategory::create([
            'title' => 'Modpack',
            'status' => 1,
        ]);

        $meetings = \App\EventCategory::create([
            'title' => 'Meetings',
            'status' => 1,
        ]);

        $misc = \App\EventCategory::create([
            'title' => 'Misc',
            'status' => 1,
        ]);

        $admin = \App\EventCategory::create([
            'title' => 'Admin',
            'status' => 1,
        ]);

        $misc->events()->create([
            'vpf_id' => 1,
            'title' => '1st RRF Founded',
            'allDay' => 1,
            'start' => '2016-04-01',
            'end' => '2016-04-01',
        ]);
        $misc->events()->create([
            'vpf_id' => 1,
            'title' => '1st RRF 1st Anniversary',
            'allDay' => 1,
            'start' => '2017-04-01',
            'end' => '2017-04-01',
        ]);
        $misc->events()->create([
            'vpf_id' => 1,
            'title' => '1st RRF 2nd Anniversary',
            'allDay' => 1,
            'start' => '2018-04-01',
            'end' => '2018-04-01',
        ]);



    }
}
