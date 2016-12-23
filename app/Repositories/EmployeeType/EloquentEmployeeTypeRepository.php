<?php

namespace App\Repositories\EmployeeType;

use App\EmployeeType;
use App\Repositories\EmployeeType\EmployeeTypeContract;

class EloquentEmployeeTypeRepository implements EmployeeTypeContract
{
    public function create($request) {
        $employeeType = new EmployeeType;

        // Set the EmployeeType properties
        $this->setEmployeeTypeProperties($employeeType, $request);

        $employeeType->save();
        return $employeeType;
    }

    public function edit($employeeTypeId, $request) {
        $employeeType = $this->findById($employeeTypeId);

        // Edit the EmployeeType properties
        $this->setEmployeeTypeProperties($employeeType, $request);

        $employeeType->save();
        return $employeeType;
    }

    public function findAll() {
        return EmployeeType::all();
    }

    public function findById($employeeTypeId) {
        return EmployeeType::find($employeeTypeId);
    }

    public function remove($employeeTypeId) {
        $employeeType = $this->findById($employeeTypeId);
        return $employeeType->delete();
    }

    private function setEmployeeTypeProperties($employeeType, $request) {
        // Assign attributes to the employeeType here
        $employeeType->title = $request->title;
        $employeeType->isPensionable = $request->isPensionable;
    }
}
