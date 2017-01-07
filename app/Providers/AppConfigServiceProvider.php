<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Cache;
use Illuminate\Support\Facades\Auth;

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
        
        view()->composer('*', function($view) use ($appConfig){
            if (Auth::check()) {
                $view->with('User', Auth::user());   
            }else{
                $anomnimous = new \StdClass;
                $anomnimous->id = 0;
                $anomnimous->name = "Anonymous";
                $view->with('User', $anomnimous);   
            }
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
