<?php

namespace App\Providers;

use App\cb009131_ssp;
use Illuminate\Support\ServiceProvider;

class cb009131_sspServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('cb009131_ssp', function(){
            return new cb009131_ssp();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
