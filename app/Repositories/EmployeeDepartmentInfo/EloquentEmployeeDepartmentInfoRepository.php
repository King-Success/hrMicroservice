<?php

namespace App\Repositories\EmployeeDepartmentInfo;

use App\EmployeeDepartmentInfo;
use App\Repositories\EmployeeDepartmentInfo\EmployeeDepartmentInfoContract;

class EloquentEmployeeDepartmentInfoRepository implements EmployeeDepartmentInfoContract
{
    public function create($request) {
        $employeeDepartmentInfo = new EmployeeDepartmentInfo;

        // Set the EmployeeDepartmentInfo properties
        $this->setEmployeeDepartmentInfoProperties($employeeDepartmentInfo, $request);

        $employeeDepartmentInfo->save();
        return $employeeDepartmentInfo;
    }

    public function edit($employeeDepartmentInfoId, $request) {
        $employeeDepartmentInfo = $this->findById($employeeDepartmentInfoId);

        // Edit the EmployeeDepartmentInfo properties
        $this->setEmployeeDepartmentInfoProperties($employeeDepartmentInfo, $request);

        $employeeDepartmentInfo->save();
        return $employeeDepartmentInfo;
    }

    public function findAll() {
        return EmployeeDepartmentInfo::all();
    }

    public function findById($employeeDepartmentInfoId) {
        return EmployeeDepartmentInfo::find($employeeDepartmentInfoId);
    }

    public function remove($employeeDepartmentInfoId) {
        $employeeDepartmentInfo = $this->findById($employeeDepartmentInfoId);
        return $employeeDepartmentInfo->delete();
    }

    private function setEmployeeDepartmentInfoProperties($employeeDepartmentInfo, $request) {
        // Assign attributes to the employeeDepartmentInfo here
    }
}
