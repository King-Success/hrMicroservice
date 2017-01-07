<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\EmployeeCreated' => [
            'App\Listeners\CreateUserForEmployee',
            'App\Listeners\CreateBasicSalaryForEmployee',
        ],
        'App\Events\PayrollCreationStarted' => [
            'App\Listeners\FreezAllInputs',
        ],
        
        'App\Events\PayrollCreationCancelled' => [
            'App\Listeners\UnFreezAllInputs',
        ],
        
        'App\Events\PayrollCreationFinished' => [
            'App\Listeners\UnFreezAllInputs',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
