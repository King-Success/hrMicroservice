<?php

namespace App\Repositories\PaycheckComponent;

use App\PaycheckComponent;
use App\Repositories\Payroll\PayrollContract;

class EloquentPaycheckComponentRepository implements PaycheckComponentContract
{
    protected $payrollModel;
    
    public function __construct(PayrollContract $payrollContract){
        $this->payrollModel = $payrollContract;
    }
    
    public function getInstance(){
        return new PaycheckComponent;
    }

    public function findById($paycheckComponentId) {
        return PaycheckComponent::find($paycheckComponentId);
    }
    
    public function findByPayrollId($payrollId){
        return PaycheckComponent::where('payroll_id', '=', $payrollId)->get();
    }
}
