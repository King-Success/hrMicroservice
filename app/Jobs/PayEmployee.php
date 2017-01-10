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
    protected $paycheckModel;
    protected $paycheckComponentModel;
    protected $paycheckSummarymodel;
    
    protected $consolidatedSalary;
    protected $consolidatedAllowance;
    protected $grossTotal;
    
    protected $totalDeductions;
    protected $totalEarnings;
    protected $netPay;

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
        $this->paycheckModel = $paycheckContract;
        $this->paycheckComponentModel = $paycheckComponentContract;
        $this->paycheckSummarymodel = $paycheckSummaryContract;
        $this->populate_paycheck();
        $this->populate_paycheck_components();
        $this->populate_paycheck_summary();
    }
    
    private function populate_paycheck(){
        $paygrade = $this->employee->employee_paygrade_info ? $this->employee->employee_paygrade_info->paygrade->amount : 0;
        $paygradeAllowance = $this->employee->employee_paygrade_info ? $this->employee->employee_paygrade_info->paygrade->allowance : 0;
        $this->consolidatedSalary = $this->employee->employee_basic_salary->amount + $paygrade;
        $this->consolidatedAllowance = $this->employee->employee_basic_salary->allowance + $paygradeAllowance;
        $this->grossTotal = $this->consolidatedSalary + $this->consolidatedAllowance;
        $paycheck = new \StdClass;
        $paycheck->employee_id = $this->employee->id;
        $paycheck->payroll_id = $this->payroll->id;
        $paycheck->consolidated_salary = $this->consolidatedSalary;
        $paycheck->consolidated_allowance = $this->consolidatedAllowance;
        if(!$this->paycheckModel->create($paycheck)){
            throw new \Exception("Error Creating paycheck for employee " . $this->employee->surname);
        }
    }
    
    private function populate_paycheck_components(){
        $this->totalDeductions = 0;
        $this->totalEarnings = 0;
        if(count($this->employee->employee_salary_component_infos) > 0){
            foreach($this->employee->employee_salary_component_infos as $employee_salary_component_info){
                $amount = 0;
                if($employee_salary_component_info->salary_component->component_type == 'Earning'){
                    if($employee_salary_component_info->salary_component->value_type == 'Amount'){
                        $this->totalEarnings += $employee_salary_component_info->amount;
                        $amount = $employee_salary_component_info->amount;
                    }else{
                        $this->totalEarnings += $this->consolidatedSalary * ($employee_salary_component_info->amount / 100);
                        $amount = $this->consolidatedSalary * ($employee_salary_component_info->amount / 100);
                    }
                }else{
                    if($employee_salary_component_info->salary_component->value_type == 'Amount'){
                        $this->totalDeductions += $employee_salary_component_info->amount;
                        $amount = $employee_salary_component_info->amount;
                    }else{
                        $this->totalDeductions += $this->consolidatedSalary * ($employee_salary_component_info->amount / 100);
                        $amount = $this->consolidatedSalary * ($employee_salary_component_info->amount / 100);
                    }
                }
                $paycheckComponent = new \StdClass;
                $paycheckComponent->employee_id = $this->employee->id;
                $paycheckComponent->payroll_id = $this->payroll->id;
                $paycheckComponent->employee_salary_component_info_id = $employee_salary_component_info->id;
                $paycheckComponent->amount = $amount;
                $paycheckComponent->component_type = $employee_salary_component_info->salary_component->value_type;
                $paycheckComponent->cycle = $this->payroll->cycle;
                if(!$this->paycheckComponentModel->create($paycheckComponent)){
                    throw new \Exception("Error Creating paycheck component for employee " . $this->employee->surname);
                }
            }
        }
    }
    
    private function populate_paycheck_summary(){
        $paycheckSummary = new \StdClass;
        $paycheckSummary->employee_id = $this->employee->id;
        $paycheckSummary->payroll_id = $this->payroll->id;
        $paycheckSummary->rank = $this->employee->employee_rank_info ? $this->employee->employee_rank_info->rank->title : '';
        $paycheckSummary->level = $this->employee->employee_paygrade_info ? $this->employee->employee_paygrade_info->paygrade->employee_level->title : '';
        $paycheckSummary->step = $this->employee->employee_paygrade_info ? $this->employee->employee_paygrade_info->paygrade->title : '';
        $paycheckSummary->paygrade_amount = $this->employee->employee_paygrade_info ? $this->employee->employee_paygrade_info->paygrade->amount : 0;
        $paycheckSummary->paygrade_amount = $this->employee->employee_paygrade_info ? $this->employee->employee_paygrade_info->paygrade->allowance : 0;
        $paycheckSummary->consolidated_salary = $this->consolidatedSalary;
        $paycheckSummary->consolidated_allowance = $this->consolidatedAllowance;
        $paycheckSummary->gross_total = $this->grossTotal;
        $paycheckSummary->total_deductions = $this->totalDeductions;
        $paycheckSummary->total_earnings = $this->totalEarnings;
        $paycheckSummary->net_pay = $this->grossTotal + $this->totalEarnings - $this->totalDeductions;
        $paycheckSummary->cycle = $this->payroll->cycle; 
        
        if(!$this->paycheckSummarymodel->create($paycheckSummary)){
            throw new \Exception("Error Creating paycheck summary for employee " . $this->employee->surname);
        }
    }
}
