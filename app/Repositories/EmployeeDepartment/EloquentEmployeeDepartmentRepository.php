<?php

namespace App\Repositories\EmployeeDepartment;

use App\EmployeeDepartment;
use App\Repositories\EmployeeDepartment\EmployeeDepartmentContract;

class EloquentEmployeeDepartmentRepository implements EmployeeDepartmentContract
{
    public function create($request) {
        $employeeDepartment = new EmployeeDepartment;

        // Set the EmployeeDepartment properties
        $this->setEmployeeDepartmentProperties($employeeDepartment, $request);

        $employeeDepartment->save();
        return $employeeDepartment;
    }

    public function edit($employeeDepartmentId, $request) {
        $employeeDepartment = $this->findById($employeeDepartmentId);

        // Edit the EmployeeDepartment properties
        $this->setEmployeeDepartmentProperties($employeeDepartment, $request);

        $employeeDepartment->save();
        return $employeeDepartment;
    }

    public function findAll() {
        return EmployeeDepartment::all();
    }

    public function findById($employeeDepartmentId) {
        return EmployeeDepartment::find($employeeDepartmentId);
    }
    
    public function findByEmployeeId($employeeId){
        return EmployeeDepartment::where('employee_id', $employeeId)->first();
    }

    public function remove($employeeDepartmentId) {
        $employeeDepartment = $this->findById($employeeDepartmentId);
        return $employeeDepartment->delete();
    }

    private function setEmployeeDepartmentProperties($employeeDepartment, $request) {
        // Assign attributes to the employeeDepartment here
        $employeeDepartment->employee_id = $request->employee;
        $employeeDepartment->department_id = $request->department;
    }
}
