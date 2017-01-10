<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Employee;
use App\Payroll;

use App\Repositories\Paycheck\PaycheckContract;
use App\Repositories\PaycheckComponent\PaycheckComponentContract;
use App\Repositories\PaycheckSummary\PaycheckSummaryContract;

class PayEmployee implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    
    protected $employee;
    protected $payroll;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Employee $employee, Payroll $payroll)
    {
        //
        $this->employee = $employee;
        $this->payroll = $payroll;
    }

    /**
     * Execute the job.
     * @param  PaycheckContract  $paycheckContract
     * @param  PaycheckComponentContract  $paycheckComponentContract
     * @param  PaycheckSummaryContract  $paycheckSummaryContract
     * @return void
     */
    public function handle(PaycheckContract  $paycheckContract, 
        PaycheckComponentContract  $paycheckComponentContract,
        PaycheckSummaryContract  $paycheckSummaryContract)
    {
        //
        
    }
}
