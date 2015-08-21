<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TeamspeakServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    public function registerBindings()
    {
        $this->app->bind(
            'App\Modules\Teamspeak\TeamspeakContract',
            'App\Modules\Teamspeak\Teamspeak'
        );
    }
}
