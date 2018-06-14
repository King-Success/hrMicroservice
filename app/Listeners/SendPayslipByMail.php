<?php

namespace App\Listeners;

use App\Events\PayslipDispatch;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Repositories\Payroll\PayrollContract;
use App\Repositories\Employee\EmployeeContract;

use Mail;
use Illuminate\Support\Facades\Log;
use Cache;

class SendPayslipByMail
{
    protected $payrollModel;
    protected $employeeModel;
    protected $appConfig;
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(PayrollContract $payrollContract, EmployeeContract $employeeContract)
    {
        //
        $this->payrollModel = $payrollContract;
        $this->employeeModel = $employeeContract;
        $this->appConfig = Cache::get('AppConfig');
    }

    /**
     * Handle the event.
     *
     * @param  PayslipDispatch  $event
     * @return void
     */
    public function handle(PayslipDispatch $event)
    {
        $payroll_id = $event->payroll_id;
        $employee_id = $event->employee_id;
        
        $employee = $this->employeeModel->findById($employee_id);
        if(!$employee && !$employee->email){
            Log::info("User does not have a valid email");
            return;
        }
        $payroll = $this->payrollModel->findById($payroll_id);
        $payslips = \DB::table('paycheck_components')
        ->join('paycheck_summaries', function($join){
            $join->on('paycheck_summaries.payroll_id', 'paycheck_components.payroll_id');
            $join->on('paycheck_summaries.employee_id', 'paycheck_components.employee_id');
        })
        ->select(
        ['paycheck_components.component_title', 
        'paycheck_components.component_permanent_title', 
        'paycheck_components.employee_id', 
        'paycheck_components.cycle',
        'paycheck_components.component_type',
        'paycheck_components.amount',
        'paycheck_components.employee_surname', 'paycheck_components.employee_othernames', 'paycheck_summaries.employee_prefix',
        'paycheck_summaries.pension_employer_contribution_amount',
        'paycheck_summaries.pension_voluntary_contribution_amount',
        'paycheck_summaries.pension_amount', 
        'paycheck_summaries.pensionable', 'paycheck_summaries.consolidated_salary', 
        'paycheck_summaries.consolidated_allowance', 'paycheck_summaries.basic_salary', 
        'paycheck_summaries.gross_total', 'paycheck_summaries.total_deductions', 'paycheck_summaries.total_earnings',
        'paycheck_summaries.net_pay',
        'paycheck_summaries.payroll_id as ps_payroll_id',
        'paycheck_components.payroll_id',
        'paycheck_summaries.employee_number'])
        ->where('paycheck_components.payroll_id', $payroll_id)
        ->where('paycheck_components.employee_id', $employee_id)
        ->get();
            
        $title = "Payslip - " . $this->appConfig->company_title;
        $template = null;
        try{
            Mail::send($template == null ? 'payrolls.one_payslipV2' : $template, 
                ['paycheck' => $payslips, 'payroll' => $payroll, 'view_type' => 'print'], 
                function ($message) use($employee, $title)
            {
                $message->from('no-reply@logicaladdress.com', 'Alert');
                $message->to($employee->email);
                $message->subject($title);
            });
        }catch(\Exception $e){
             Log::info($e->getMessage());
        }
    }
}
