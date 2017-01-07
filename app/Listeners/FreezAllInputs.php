<?php

namespace App\Listeners;

use App\Events\PayrollCreationStarted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Repositories\Payroll\PayrollContract;
use App\Repositories\AppConfig\AppConfigContract;

class FreezAllInputs
{
    protected $payrollModel;
    protected $appConfigModel;
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(AppConfigContract $appConfigContract, PayrollContract $payrollContract)
    {
        $this->payrollModel = $payrollContract;
        $this->appConfigModel = $appConfigContract;
    }

    /**
     * Handle the event.
     *
     * @param  PayrollCreationStarted  $event
     * @return void
     */
    public function handle(PayrollCreationStarted $event)
    {
        //$event->employee['other_names'];
    }
}
