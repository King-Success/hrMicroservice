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
        $paygrade = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->amount : 0;
        $paygradeAllowance = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->allowance : 0;
        $this->consolidatedSalary = ($this->employee->employee_basic_salary->amount + $paygrade) / 12;
        $this->consolidatedAllowance = ($this->employee->employee_basic_salary->allowance + $paygradeAllowance) / 12;
        $this->grossTotal = $this->consolidatedSalary + $this->consolidatedAllowance;
        $paycheck = $this->paycheckModel->getInstance();
        $paycheck->employee_id = $this->employee->id;
        $paycheck->payroll_id = $this->payroll->id;
        $paycheck->consolidated_salary = $this->consolidatedSalary;
        $paycheck->consolidated_allowance = $this->consolidatedAllowance;
        if(!$paycheck->save()){
            throw new \Exception("Error Creating paycheck for employee " . $this->employee->surname);
        }
    }
    
    private function populate_paycheck_components(){
        $this->totalDeductions = 0;
        $this->totalEarnings = 0;
        if(count($this->employee->employee_salary_components) > 0){
            foreach($this->employee->employee_salary_components as $employee_salary_component_info){
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
                $paycheckComponent = $this->paycheckComponentModel->getInstance();
                $paycheckComponent->employee_id = $this->employee->id;
                $paycheckComponent->payroll_id = $this->payroll->id;
                $paycheckComponent->component_title = $employee_salary_component_info->salary_component->title;
                $paycheckComponent->component_permanent_title = $employee_salary_component_info->salary_component->permanent_title;
                $paycheckComponent->component_id = $employee_salary_component_info->salary_component->id;
                $paycheckComponent->amount = $amount;
                $paycheckComponent->component_type = $employee_salary_component_info->salary_component->component_type;
                $paycheckComponent->cycle = $this->payroll->cycle;
                $paycheckComponent->rank = $this->employee->employee_rank ? $this->employee->employee_rank->rank->title : '';
                $paycheckComponent->level = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->employee_level->title : '';
                $paycheckComponent->step = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->title : '';
                if(!$paycheckComponent->save()){
                    throw new \Exception("Error Creating paycheck component for employee " . $this->employee->surname);
                }
            }
        }
    }
    
    private function populate_paycheck_summary(){
        $paycheckSummary = $this->paycheckSummarymodel->getInstance();
        $paycheckSummary->employee_id = $this->employee->id;
        $paycheckSummary->payroll_id = $this->payroll->id;
        $paycheckSummary->rank = $this->employee->employee_rank ? $this->employee->employee_rank->rank->title : '';
        $paycheckSummary->level = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->employee_level->title : '';
        $paycheckSummary->step = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->title : '';
        $paycheckSummary->basic_salary = $this->employee->employee_basic_salary->amount;
        $paycheckSummary->allowance = $this->employee->employee_basic_salary->allowance;
        $paycheckSummary->paygrade_amount = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->amount : 0;
        $paycheckSummary->paygrade_allowance = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->allowance : 0;
        $paycheckSummary->consolidated_salary = $this->consolidatedSalary;
        $paycheckSummary->consolidated_allowance = $this->consolidatedAllowance;
        $paycheckSummary->gross_total = $this->grossTotal;
        $paycheckSummary->total_deductions = $this->totalDeductions;
        $paycheckSummary->total_earnings = $this->totalEarnings;
        $paycheckSummary->net_pay = $this->grossTotal + $this->totalEarnings - $this->totalDeductions;
        $paycheckSummary->cycle = $this->payroll->cycle; 
        
        $pensionAmount = 0;
        if(count($this->employee->employee_salary_components) > 0){
            foreach($this->employee->employee_salary_components as $employee_salary_component_info){
                if($employee_salary_component_info->salary_component->permanent_title != "pension") continue;
                if($employee_salary_component_info->salary_component->value_type == 'Amount'){
                    $pensionAmount = $employee_salary_component_info->amount;
                }else{
                    $pensionAmount = $this->consolidatedSalary * ($employee_salary_component_info->amount / 100);
                }
                $paycheckSummary->pension_amount = $pensionAmount;
                $paycheckSummary->pension_employee_contribution_amount = $this->employee->employee_pension->employer_contribution;
                $paycheckSummary->pension_pin_number = $this->employee->employee_pension->pin_number;
                $paycheckSummary->pension_company = $this->employee->employee_pension->pension->title;
                $paycheckSummary->pensionable = true;
                $paycheckSummary->pension_id = $this->employee->employee_pension->pension_id;
            }
        }
        
        $taxAmount = 0;
        if(count($this->employee->employee_salary_components) > 0){
            foreach($this->employee->employee_salary_components as $employee_salary_component_info){
                if($employee_salary_component_info->salary_component->permanent_title != "tax") continue;
                if($employee_salary_component_info->salary_component->value_type == 'Amount'){
                    $taxAmount = $employee_salary_component_info->amount;
                }else{
                    $taxAmount = $this->consolidatedSalary * ($employee_salary_component_info->amount / 100);
                }
                $paycheckSummary->tax_amount = $taxAmount;
                $paycheckSummary->taxable = true;
                $paycheckSummary->tax_id = $employee_salary_component_info->salary_component->id;
            }
        }
        
        if($this->employee->employee_bank->bank && $this->employee->employee_bank->bank->title){
            $paycheckSummary->bank = $this->employee->employee_bank->bank->title;
            $paycheckSummary->bankable = true;
            $paycheckSummary->bank_id = $this->employee->employee_bank->bank->id;
            $paycheckSummary->bank_account_name = $this->employee->employee_bank->account_name;
            $paycheckSummary->bank_account_number = $this->employee->employee_bank->account_number;
            $paycheckSummary->bank_sort_code = $this->employee->employee_bank->sort_code;
        }
        
        if(!$paycheckSummary->save()){
            throw new \Exception("Error Creating paycheck summary for employee " . $this->employee->surname);
        }
    }
}
