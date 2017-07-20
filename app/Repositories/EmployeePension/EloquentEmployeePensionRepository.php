<?php

namespace App\Repositories\EmployeePension;

use App\EmployeePension;
use App\Repositories\EmployeePension\EmployeePensionContract;

class EloquentEmployeePensionRepository implements EmployeePensionContract
{
    public function create($request) {
        $employeePension = new EmployeePension;

        // Set the EmployeePension properties
        $this->setEmployeePensionProperties($employeePension, $request);

        $employeePension->save();
        return $employeePension;
    }

    public function edit($employeePensionId, $request) {
        $employeePension = $this->findById($employeePensionId);

        // Edit the EmployeePension properties
        $this->setEmployeePensionProperties($employeePension, $request);

        $employeePension->save();
        return $employeePension;
    }

    public function findAll() {
        return EmployeePension::all();
    }

    public function findById($employeePensionId) {
        return EmployeePension::find($employeePensionId);
    }

    public function remove($employeePensionId) {
        $employeePension = $this->findById($employeePensionId);
        return $employeePension->delete();
    }
    
    public function findByEmployeeId($employeeId){
        return EmployeePension::where('employee_id', $employeeId)->first();
    }

    private function setEmployeePensionProperties($employeePension, $request) {
        // Assign attributes to the employeePension here
        $employeePension->pin_number = $request->pin_number;
        $employeePension->pension_id = $request->pension;
        $employeePension->employee_id = $request->employee;
        $employeePension->employer_contribution = $request->employer_contribution;
        $employeePension->voluntary_contribution = $request->voluntary_contribution;
    }
}
