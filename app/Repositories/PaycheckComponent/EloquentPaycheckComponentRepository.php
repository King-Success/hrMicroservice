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
    
    public function create($request) {
        $paycheckComponent = new PaycheckComponent;
        
        $paycheckComponent->save();
        return $paycheckComponent;
    }

    public function findById($paycheckComponentId) {
        return Paycheck::find($paycheckComponentId);
    }
}
