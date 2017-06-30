<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(isset($_SERVER['SERVER_PORT']) && /*!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' &&*/ $_SERVER['SERVER_PORT'] == 443) {
           \URL::forceSchema('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
