<?php

namespace App\Listeners;

use App\Events\PayrollCreationFinished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Repositories\Payroll\PayrollContract;
use App\Repositories\AppConfig\AppConfigContract;

class UnFreezeAllInputs
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
     * @param  PayrollCreationFinished  $event
     * @return void
     */
    public function handle(PayrollCreationFinished $event)
    {
        $appConfigModel = $this->appConfigModel->findById(1);
        $appConfigModel->freeze_mode_activated = false;
        $this->appConfigModel->setFreezeMode(1, $appConfigModel);
    }
}
