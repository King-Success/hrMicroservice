<?php

namespace App\Repositories\EmployeePaygradeInfo;

use App\EmployeePaygradeInfo;
use App\Repositories\EmployeePaygradeInfo\EmployeePaygradeInfoContract;

class EloquentEmployeePaygradeInfoRepository implements EmployeePaygradeInfoContract
{
    public function create($request) {
        $employeePaygradeInfo = new EmployeePaygradeInfo;

        // Set the EmployeePaygradeInfo properties
        $this->setEmployeePaygradeInfoProperties($employeePaygradeInfo, $request);

        $employeePaygradeInfo->save();
        return $employeePaygradeInfo;
    }

    public function edit($employeePaygradeInfoId, $request) {
        $employeePaygradeInfo = $this->findById($employeePaygradeInfoId);

        // Edit the EmployeePaygradeInfo properties
        $this->setEmployeePaygradeInfoProperties($employeePaygradeInfo, $request);

        $employeePaygradeInfo->save();
        return $employeePaygradeInfo;
    }

    public function findAll() {
        return EmployeePaygradeInfo::all();
    }

    public function findById($employeePaygradeInfoId) {
        return EmployeePaygradeInfo::find($employeePaygradeInfoId);
    }

    public function remove($employeePaygradeInfoId) {
        $employeePaygradeInfo = $this->findById($employeePaygradeInfoId);
        return $employeePaygradeInfo->delete();
    }

    private function setEmployeePaygradeInfoProperties($employeePaygradeInfo, $request) {
        // Assign attributes to the employeePaygradeInfo here
    }
}
