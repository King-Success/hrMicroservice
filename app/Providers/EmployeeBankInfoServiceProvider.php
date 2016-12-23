<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EmployeeBankInfoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind('App\Repositories\EmployeeBankInfo\EmployeeBankInfoContract', 'App\Repositories\EmployeeBankInfo\EloquentEmployeeBankInfoRepository');
    }
}
