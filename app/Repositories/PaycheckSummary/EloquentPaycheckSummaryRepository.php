<?php

namespace App\Repositories\PaycheckSummary;

use App\PaycheckSummary;
use App\Repositories\Payroll\PayrollContract;

class EloquentPaycheckSummaryRepository implements PaycheckSummaryContract
{
    protected $payrollModel;
    
    public function __construct(PayrollContract $payrollContract){
        $this->payrollModel = $payrollContract;
    }
    
    public function getInstance(){
        return new PaycheckSummary;
    }

    public function findById($paycheckSummaryId) {
        return PaycheckSummary::find($paycheckSummaryId);
    }
    
    public function findByPayrollId($payrollId){
        return PaycheckSummary::where('payroll_id', '=', $payrollId)->get();
    }
}
