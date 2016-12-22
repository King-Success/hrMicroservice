<?php

namespace App\Repositories\Employee;

use App\Employee;
use App\Repositories\Employee\EmployeeContract;

class EloquentEmployeeRepository implements EmployeeContract
{
    public function create($request) {
        $employee = new Employee;

        // Set the Employee properties
        $this->setEmployeeProperties($employee, $request);

        $employee->save();
        return $employee;
    }

    public function edit($employeeId, $request) {
        $employee = $this->findById($employeeId);

        // Edit the Employee properties
        $this->setEmployeeProperties($employee, $request);

        $employee->save();
        return $employee;
    }

    public function findAll() {
        return Employee::all();
    }

    public function findById($employeeId) {
        return Employee::find($employeeId);
    }

    public function remove($employeeId) {
        $employee = $this->findById($employeeId);
        return $employee->delete();
    }

    private function setEmployeeProperties($employee, $request) {
        // Assign attributes to the employee here
    }
}
