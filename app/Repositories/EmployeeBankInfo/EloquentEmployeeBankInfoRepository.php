<?php

namespace App\Repositories\EmployeeBankInfo;

use App\EmployeeBankInfo;
use App\Repositories\EmployeeBankInfo\EmployeeBankInfoContract;

class EloquentEmployeeBankInfoRepository implements EmployeeBankInfoContract
{
    public function create($request) {
        $employeeBankInfo = new EmployeeBankInfo;

        // Set the EmployeeBankInfo properties
        $this->setEmployeeBankInfoProperties($employeeBankInfo, $request);

        $employeeBankInfo->save();
        return $employeeBankInfo;
    }

    public function edit($employeeBankInfoId, $request) {
        $employeeBankInfo = $this->findById($employeeBankInfoId);

        // Edit the EmployeeBankInfo properties
        $this->setEmployeeBankInfoProperties($employeeBankInfo, $request);

        $employeeBankInfo->save();
        return $employeeBankInfo;
    }

    public function findAll() {
        return EmployeeBankInfo::all();
    }

    public function findById($employeeBankInfoId) {
        return EmployeeBankInfo::find($employeeBankInfoId);
    }

    public function remove($employeeBankInfoId) {
        $employeeBankInfo = $this->findById($employeeBankInfoId);
        return $employeeBankInfo->delete();
    }

    private function setEmployeeBankInfoProperties($employeeBankInfo, $request) {
        // Assign attributes to the employeeBankInfo here
    }
}
