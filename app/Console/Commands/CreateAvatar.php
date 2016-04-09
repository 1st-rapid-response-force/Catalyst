<?php

namespace App\Console\Commands;

use App\User;
use App\VPF;
use Illuminate\Console\Command;

class CreateAvatar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:avatar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates all VPF images on command run';

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
                $images = public_path().'/frontend/images/avatars/';
                $user = User::find($vpf->user->id);

                if(isset($user))
                {
                    if($user->vpf->rank->public_image == 'placeholder.png')
                    {
                        $rankImg = \Image::canvas(1, 1);
                    } else {
                        $rank = \Cloudder::show($vpf->rank->public_image, ['width' => '112','height'=>'110','crop'=>'fit']);
                        $rankImg = \Image::make($rank);
                    }

                    $img = \Image::canvas(160,160)
                        ->insert($images.'background.png')
                        ->insert($rankImg,'center',0,28)
                        ->save($images.'members/'.$user->steam_id.'.png');
                }

            }
        });
    }
}
