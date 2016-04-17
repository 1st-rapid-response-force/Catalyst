<?php

namespace App\Console\Commands;

use App\VPF;
use Illuminate\Console\Command;

class CreateSearchable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vpf:searchable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a searchable string';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        VPF::chunk(10, function ($vpfs) {
            foreach ($vpfs as $vpf) {
                $vpf->searchable = $vpf;
                $vpf->save();
            }
        });
    }
}
