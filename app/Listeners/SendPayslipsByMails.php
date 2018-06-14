<?php

namespace App\Listeners;

use App\Events\SendPayslipsByMails;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Repositories\Payroll\PayrollContract;

class SendPayslipsByMails
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
     * @param  SendPayslipsByMails  $event
     * @return void
     */
    public function handle(SendPayslipsByMails $event)
    {
        $payroll = $this->payrollModel->find($event->payroll_id);
    }
}
