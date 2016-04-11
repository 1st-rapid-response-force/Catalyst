<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class encryptMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'encrypt:messages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Encrypt the Messages';

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
        $messages = \DB::table('messages')->select(['id','body'])->get();

        foreach ($messages as $message)
        {
            \DB::table('messages')->where('id',$message->id)->update(['body' => \Crypt::encrypt($message->body)]);
        }
    }
}
