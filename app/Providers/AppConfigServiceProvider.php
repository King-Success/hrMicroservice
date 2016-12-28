<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Cache;

class AppConfigServiceProvider extends ServiceProvider
{
    protected $appConfigModel;
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        
        $this->appConfigModel = new \App\Repositories\AppConfig\EloquentAppConfigRepository;
        
        if (Cache::has('AppConfig')){
            $appConfig = Cache::get('AppConfig');
        }else{
            $appConfig = $this->appConfigModel->findById(1);
            Cache::forever('AppConfig', $appConfig);
        }
        
        view()->composer('*', function($view) use ($appConfig){
            $view->with('AppConfig', $appConfig);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind('App\Repositories\AppConfig\AppConfigContract', 'App\Repositories\AppConfig\EloquentAppConfigRepository');
    }
}