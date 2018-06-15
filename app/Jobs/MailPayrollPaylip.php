<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Listeners\SendPayslipByMail;
use Illuminate\Support\Facades\Log;
use App\Events\PayslipDispatch;

class MailPayrollPaylip implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    
    protected $employee_id;
    protected $payroll_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($payroll_id, $employee_id)
    {
        $this->employee_id = $employee_id;
        $this->payroll_id = $payroll_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info("handling jobs for employee: " . $this->employee_id . ", payroll: " . $this->payroll_id);
        event(new PayslipDispatch($this->payroll_id, $this->employee_id));
    }
}
