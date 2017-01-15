<?php

namespace App\Repositories\EmployeeTax;

use App\EmployeeTax;
use App\Repositories\EmployeeTax\EmployeeTaxContract;

class EloquentEmployeeTaxRepository implements EmployeeTaxContract
{
    public function create($request) {
        $employeeTax = new EmployeeTax;

        // Set the EmployeeTax properties
        $this->setEmployeeTaxProperties($employeeTax, $request);

        $employeeTax->save();
        return $employeeTax;
    }

    public function edit($employeeTaxId, $request) {
        $employeeTax = $this->findById($employeeTaxId);

        // Edit the EmployeeTax properties
        $this->setEmployeeTaxProperties($employeeTax, $request);

        $employeeTax->save();
        return $employeeTax;
    }

    public function findAll() {
        return EmployeeTax::all();
    }

    public function findById($employeeTaxId) {
        return EmployeeTax::find($employeeTaxId);
    }

    public function remove($employeeTaxId) {
        $employeeTax = $this->findById($employeeTaxId);
        return $employeeTax->delete();
    }
    
    public function findByEmployeeId($employeeId){
        return EmployeeTax::where('employee_id', $employeeId)->first();
    }

    private function setEmployeeTaxProperties($employeeTax, $request) {
        // Assign attributes to the employeeTax here
        $employeeTax->tax_id = $request->tax;
        $employeeTax->employee_id = $request->employee;
    }
}
