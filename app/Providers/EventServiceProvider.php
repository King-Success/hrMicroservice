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
            'App\Listeners\CreateTaxEntryForEmployee',
        ],
        'App\Events\PayrollCreationStarted' => [
            'App\Listeners\FreezeAllInputs',
        ],
        
        'App\Events\PayrollCreationCancelled' => [
            'App\Listeners\UnFreezeAllInputs',
        ],
        
        'App\Events\PayrollCreationFinished' => [
            'App\Listeners\UnFreezeAllInputs',
            'App\Listeners\FlagPayrollInactive',
        ],
        
        'App\Events\EmployeeAssignedRank' => [
            'App\Listeners\PopulateEmployeeBasicSalaryIf',
        ],
        
        'App\Events\PayslipDispatch' => [
            'App\Listeners\SendPayslipByMail',
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
