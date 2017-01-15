<?php

namespace App\Repositories\EmployeePaygrade;

use App\EmployeePaygrade;
use App\Repositories\EmployeePaygrade\EmployeePaygradeContract;

class EloquentEmployeePaygradeRepository implements EmployeePaygradeContract
{
    public function create($request) {
        $employeePaygrade = new EmployeePaygrade;

        // Set the EmployeePaygrade properties
        $this->setEmployeePaygradeProperties($employeePaygrade, $request);

        $employeePaygrade->save();
        return $employeePaygrade;
    }

    public function edit($employeePaygradeId, $request) {
        $employeePaygrade = $this->findById($employeePaygradeId);

        // Edit the EmployeePaygrade properties
        $this->setEmployeePaygradeProperties($employeePaygrade, $request);

        $employeePaygrade->save();
        return $employeePaygrade;
    }

    public function findAll() {
        return EmployeePaygrade::all();
    }

    public function findById($employeePaygradeId) {
        return EmployeePaygrade::find($employeePaygradeId);
    }
    
    public function findByEmployeeId($employeeId){
        return EmployeePaygrade::where('employee_id', $employeeId)->first();
    }

    public function remove($employeePaygradeId) {
        $employeePaygrade = $this->findById($employeePaygradeId);
        return $employeePaygrade->delete();
    }

    private function setEmployeePaygradeProperties($employeePaygrade, $request) {
        // Assign attributes to the employeePaygrade here
        $employeePaygrade->employee_id = $request->employee;
        $employeePaygrade->paygrade_id = $request->paygrade;
    }
}
