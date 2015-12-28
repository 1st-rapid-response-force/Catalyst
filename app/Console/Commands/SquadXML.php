<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\VPF;


class SquadXML extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'squadxml:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates SquadXML to filesystem';

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
        $vpfs = VPF::where('status','=','Active')->get();
        $xml = '<?xml version="1.0"?>'. PHP_EOL;
        $xml .= '<!DOCTYPE squad SYSTEM "squad.dtd">'. PHP_EOL;
        $xml .= '<?xml-stylesheet href="squad.xsl" type="text/xsl"?>'. PHP_EOL;
        $xml .= '<squad nick="1RRF">'. PHP_EOL;
        $xml .= '<name>1st Rapid Response Force</name>'. PHP_EOL;
        $xml .= '<email>contactus@1st-rrf.com</email>'. PHP_EOL;
        $xml .= '<web>1st-rrf.com</web>'. PHP_EOL;
        $xml .= '<picture>logo.paa</picture>'. PHP_EOL;
        $xml .= '<title>1st Rapid Response Force</title>'. PHP_EOL;
        foreach($vpfs as $vpf)
        {
            $xml .= '<member id="'.$vpf->user->steam_id.'" nick="'.$vpf.'">'. PHP_EOL;
            $xml .= '<name>'.$vpf->first_name.' '.$vpf->last_name.'</name>'. PHP_EOL;
            $xml .= '<email>'.$vpf->user->email.'</email>'. PHP_EOL;
            $xml .= '<icq>N/A</icq>'. PHP_EOL;
            $xml .= '<remark>1st Rapid Response Force Member</remark>'. PHP_EOL;
            $xml .= '</member>'. PHP_EOL;
        }
        $xml .= '</squad>'. PHP_EOL;

        //Save to file system just in case
        $file = fopen(public_path().'/squad.xml','w');
        fwrite($file,$xml);
        fclose($file);
    }
}
