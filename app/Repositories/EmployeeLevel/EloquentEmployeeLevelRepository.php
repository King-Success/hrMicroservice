<?php

namespace App\Repositories\EmployeeLevel;

use App\EmployeeLevel;
use App\Repositories\EmployeeLevel\EmployeeLevelContract;

class EloquentEmployeeLevelRepository implements EmployeeLevelContract
{
    public function create($request) {
        $employeeLevel = new EmployeeLevel;

        // Set the EmployeeLevel properties
        $this->setEmployeeLevelProperties($employeeLevel, $request);

        $employeeLevel->save();
        return $employeeLevel;
    }

    public function edit($employeeLevelId, $request) {
        $employeeLevel = $this->findById($employeeLevelId);

        // Edit the EmployeeLevel properties
        $this->setEmployeeLevelProperties($employeeLevel, $request);

        $employeeLevel->save();
        return $employeeLevel;
    }

    public function findAll() {
        return EmployeeLevel::all();
    }

    public function findById($employeeLevelId) {
        return EmployeeLevel::find($employeeLevelId);
    }

    public function remove($employeeLevelId) {
        $employeeLevel = $this->findById($employeeLevelId);
        return $employeeLevel->delete();
    }

    private function setEmployeeLevelProperties($employeeLevel, $request) {
        // Assign attributes to the employeeLevel here
        $employeeLevel->title = $request->title;
    }
}
