<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\CoinapultController;


class CoinapultProvider extends ServiceProvider
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
    public function register(){
        $this->app->bind('App\Helpers\CoinapultContract', function(){
            return new CoinapultController();
        });
    }
}

?>