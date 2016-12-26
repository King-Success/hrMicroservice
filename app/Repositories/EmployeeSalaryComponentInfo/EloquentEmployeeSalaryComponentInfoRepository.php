<?php

namespace App\Repositories\EmployeeSalaryComponentInfo;

use App\EmployeeSalaryComponentInfo;
use App\Repositories\EmployeeSalaryComponentInfo\EmployeeSalaryComponentInfoContract;

class EloquentEmployeeSalaryComponentInfoRepository implements EmployeeSalaryComponentInfoContract
{
    public function create($request) {
        $employeeSalaryComponentInfo = new EmployeeSalaryComponentInfo;

        // Set the EmployeeSalaryComponentInfo properties
        $this->setEmployeeSalaryComponentInfoProperties($employeeSalaryComponentInfo, $request);

        $employeeSalaryComponentInfo->save();
        return $employeeSalaryComponentInfo;
    }

    public function edit($employeeSalaryComponentInfoId, $request) {
        $employeeSalaryComponentInfo = $this->findById($employeeSalaryComponentInfoId);

        // Edit the EmployeeSalaryComponentInfo properties
        $this->setEmployeeSalaryComponentInfoProperties($employeeSalaryComponentInfo, $request);

        $employeeSalaryComponentInfo->save();
        return $employeeSalaryComponentInfo;
    }

    public function findAll() {
        return EmployeeSalaryComponentInfo::all();
    }

    public function findById($employeeSalaryComponentInfoId) {
        return EmployeeSalaryComponentInfo::find($employeeSalaryComponentInfoId);
    }

    public function remove($employeeSalaryComponentInfoId) {
        $employeeSalaryComponentInfo = $this->findById($employeeSalaryComponentInfoId);
        return $employeeSalaryComponentInfo->delete();
    }

    private function setEmployeeSalaryComponentInfoProperties($employeeSalaryComponentInfo, $request) {
        // Assign attributes to the employeeSalaryComponentInfo here
    }
}