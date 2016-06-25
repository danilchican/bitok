<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\ExchangeApiController;


class ExchangeApiProvider extends ServiceProvider
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
        $this->app->bind('App\Helpers\ExchangeApiContract', function(){
            return new ExchangeApiController();
        });
    }
}

?>