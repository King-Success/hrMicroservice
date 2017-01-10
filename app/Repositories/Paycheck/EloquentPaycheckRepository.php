<?php

namespace App\Repositories\Paycheck;

use App\Paycheck;
use App\Repositories\Payroll\PayrollContract;
use App\Repositories\PaycheckComponent\PaycheckComponentContract;
use App\Repositories\PaycheckSummary\PaycheckSummaryContract;

class EloquentPaycheckRepository implements PaycheckContract
{
    protected $payrollModel;
    protected $paycheckComponentModel;
    protected $paycheckSummaryModel;
    
    public function __construct(PayrollContract $payrollContract, 
        PaycheckComponentContract $paycheckComponentContract,
        PaycheckSummaryContract $paycheckSummaryContract){
        $this->payrollModel = $payrollContract;
        $this->paycheckComponentModel = $paycheckComponentContract;
        $this->paycheckSummaryModel = $paycheckSummaryContract;
    }
    
    public function create($request) {
        $paygrade = new Paycheck;
        
        $paygrade->save();
        return $paygrade;
    }

    public function findById($paygradeId) {
        return Paycheck::find($paygradeId);
    }
}