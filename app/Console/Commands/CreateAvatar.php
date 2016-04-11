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
        $membersAvatars = 'frontend/images/avatars/members';
        //Destroy all images
        \Storage::disk('public')->deleteDirectory($membersAvatars);
        \Storage::disk('public')->makeDirectory($membersAvatars);
        
        
        VPF::chunk(10, function ($vpfs) {
            foreach ($vpfs as $vpf) {
                $images = public_path().'/frontend/images/avatars/';
                $membersAvatars = '/frontend/images/avatars/members/';
                $random_string = str_random();
                $user = User::find($vpf->user->id);
                $user->vpf->avatar = $membersAvatars.$random_string.'.png';
                $user->push();

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
                        ->save($images.'members/'.$random_string.'.png');
                }

            }
        });
    }
}
