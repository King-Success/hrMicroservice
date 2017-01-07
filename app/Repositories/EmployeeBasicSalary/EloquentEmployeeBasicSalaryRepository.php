<?php

namespace App\Repositories\EmployeeBasicSalary;

use App\EmployeeBasicSalary;
use App\Repositories\EmployeeBasicSalary\EmployeeBasicSalaryContract;

class EloquentEmployeeBasicSalaryRepository implements EmployeeBasicSalaryContract
{
    public function create($request) {
        $employeeBasicSalary = new EmployeeBasicSalary;

        // Set the EmployeeBasicSalary properties
        $this->setEmployeeBasicSalaryProperties($employeeBasicSalary, $request);

        $employeeBasicSalary->save();
        return $employeeBasicSalary;
    }

    public function edit($employeeBasicSalaryId, $request) {
        $employeeBasicSalary = $this->findById($employeeBasicSalaryId);

        // Edit the EmployeeBasicSalary properties
        $this->setEmployeeBasicSalaryProperties($employeeBasicSalary, $request);

        $employeeBasicSalary->save();
        return $employeeBasicSalary;
    }

    public function findAll() {
        return EmployeeBasicSalary::all();
    }

    public function findById($employeeBasicSalaryId) {
        return EmployeeBasicSalary::find($employeeBasicSalaryId);
    }
    
    public function findByEmployeeId($employeeId){
        return EmployeeBasicSalary::where('employee_id', $employeeId)->get();
    }

    public function remove($employeeBasicSalaryId) {
        $employeeBasicSalary = $this->findById($employeeBasicSalaryId);
        return $employeeBasicSalary->delete();
    }

    private function setEmployeeBasicSalaryProperties($employeeBasicSalary, $request) {
        // Assign attributes to the employeeSalaryComponentInfo here
        $employeeBasicSalary->employee_id = $request->employee_id;
        $employeeBasicSalary->amount = $request->amount ? $request->amount : 0.00;
    }
}
