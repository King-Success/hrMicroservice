<?php

namespace App\Repositories\Payroll;

use App\Payroll;
use App\Repositories\Payroll\PayrollContract;

class EloquentPayrollRepository implements PayrollContract
{
    public function create($request) {
        $payroll = new Payroll;

        // Set the Payroll properties
        $this->setPayrollProperties($payroll, $request);

        $payroll->save();
        return $payroll;
    }

    public function edit($payrollId, $request) {
        $payroll = $this->findById($payrollId);

        // Edit the Payroll properties
        $this->setPayrollProperties($payroll, $request);

        $payroll->save();
        return $payroll;
    }

    public function findAll() {
        return Payroll::all();
    }

    public function findById($payrollId) {
        return Payroll::find($payrollId);
    }

    public function remove($payrollId) {
        $payroll = $this->findById($payrollId);
        return $payroll->delete();
    }

    private function setPayrollProperties($payroll, $request) {
        // Assign attributes to the payroll here
    }
}
