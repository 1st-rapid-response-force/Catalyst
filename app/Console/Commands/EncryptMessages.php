<?php

namespace App\Console\Commands;

use Cmgmyr\Messenger\Models\Message;
use Illuminate\Console\Command;

class EncryptMessages extends Command
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
    protected $description = 'Used to retroactively encrypt all messages in the database.';

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
        $messages = Message::all();

        foreach ($messages as $message)
        {
            $message->body = \Crypt::encrypt($message->body);
            $message->timestamps = false;
            $message->save();
        }
    }
}
