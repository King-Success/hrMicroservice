<?php

namespace App\Listeners;

use App\Events\PayrollCreationFinished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Repositories\Payroll\PayrollContract;
use App\Repositories\AppConfig\AppConfigContract;

class FlagPayrollInactive
{
    protected $payrollModel;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(PayrollContract $payrollContract)
    {
        //
        $this->payrollModel = $payrollContract;
    }

    /**
     * Handle the event.
     *
     * @param  PayrollCreationFinished  $event
     * @return void
     */
    public function handle(PayrollCreationFinished $event)
    {
        $payrollModel = $this->payrollModel->findById($event->payroll['id']);
        $payrollModel->active = false;
        $payrollModel->save();
    }
}
