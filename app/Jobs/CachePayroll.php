<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Repositories\Paycheck\PaycheckContract;
use App\Repositories\PaycheckComponent\PaycheckComponentContract;
use App\Repositories\PaycheckSummary\PaycheckSummaryContract;

use App\Repositories\SalaryComponent\SalaryComponentContract;

use App\Repositories\Bank\BankContract;
use App\Repositories\Pension\PensionContract;
use App\Repositories\Tax\TaxContract;

use Cache;

class CachePayroll implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $payrollModel;
    protected $appConfig;
    protected $paycheckModel;
    protected $paycheckComponentModel;
    protected $paycheckSummarymodel;
    
    
    protected $bankModel;
    protected $pensionModel;
    protected $taxModel;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( PayrollContract $payrollContract, 
        PaycheckContract  $paycheckContract, 
        PaycheckSummaryContract $paycheckSummaryContract, 
        PaycheckComponentContract $paycheckComponentContract, SalaryComponentContract $salaryComponentModelContract,
        BankContract $bankContract, PensionContract $pensionContract, TaxContract $taxContract)
    {
        $this->appConfig = Cache::get('AppConfig');
        $this->payrollModel = $payrollContract;
        $this->paycheckModel = $paycheckContract;
        $this->paycheckComponentModel = $paycheckComponentContract;
        $this->paycheckSummaryModel = $paycheckSummaryContract;
        $this->salaryComponentModel = $salaryComponentModelContract;
        
        $this->bankModel = $bankContract;
        $this->pensionModel = $pensionContract;
        $this->taxModel = $taxContract;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($id)
    {
        $payroll = $this->payrollModel->findById($id);
        $paychecks = $this->paycheckModel->findByPayrollId($id);
        $paycheckSummaries = $this->paycheckSummaryModel->findByPayrollId($id);
        $paycheckComponents = $this->paycheckComponentModel->findByPayrollId($id);
        $pensionables = $paycheckSummaries->where('pensionable', true)->groupBy('pension_company')->toArray();
        $taxables = $paycheckSummaries->where('taxable', true)->toArray();
        $bankables = $paycheckSummaries->where('bankable', true)->groupBy('bank')->toArray();
        $salaryComponents = $this->salaryComponentModel->findAll();
        $taxes = $this->taxModel->findAll();
    }
}
