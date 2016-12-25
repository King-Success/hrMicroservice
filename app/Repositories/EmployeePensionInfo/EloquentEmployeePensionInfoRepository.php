<?php

namespace App\Repositories\EmployeePensionInfo;

use App\EmployeePensionInfo;
use App\Repositories\EmployeePensionInfo\EmployeePensionInfoContract;

class EloquentEmployeePensionInfoRepository implements EmployeePensionInfoContract
{
    public function create($request) {
        $employeePensionInfo = new EmployeePensionInfo;

        // Set the EmployeePensionInfo properties
        $this->setEmployeePensionInfoProperties($employeePensionInfo, $request);

        $employeePensionInfo->save();
        return $employeePensionInfo;
    }

    public function edit($employeePensionInfoId, $request) {
        $employeePensionInfo = $this->findById($employeePensionInfoId);

        // Edit the EmployeePensionInfo properties
        $this->setEmployeePensionInfoProperties($employeePensionInfo, $request);

        $employeePensionInfo->save();
        return $employeePensionInfo;
    }

    public function findAll() {
        return EmployeePensionInfo::all();
    }

    public function findById($employeePensionInfoId) {
        return EmployeePensionInfo::find($employeePensionInfoId);
    }

    public function remove($employeePensionInfoId) {
        $employeePensionInfo = $this->findById($employeePensionInfoId);
        return $employeePensionInfo->delete();
    }

    private function setEmployeePensionInfoProperties($employeePensionInfo, $request) {
        // Assign attributes to the employeePensionInfo here
    }
}