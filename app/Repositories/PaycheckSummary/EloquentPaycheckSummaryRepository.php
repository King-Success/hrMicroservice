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
    
    public function create($request) {
        $paycheckSummary = new PaycheckSummary;
        
        $paycheckSummary->save();
        return $paycheckSummary;
    }

    public function findById($paycheckSummaryId) {
        return PaycheckSummary::find($paycheckSummaryId);
    }
}
