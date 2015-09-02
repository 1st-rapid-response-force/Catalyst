<?php

use Illuminate\Database\Seeder;

class CreateFirstPerstat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perstat = new \App\Perstat;
        $assigned = \App\VPF::where('status','=','Active')->get()->count();
        $perstat = new Perstat;
        $perstat->from = '2015-08-30';
        $perstat->to = '2015-09-06';
        $perstat->assigned = $assigned;
        $perstat->active = true;
        $perstat->save();
    }
}
