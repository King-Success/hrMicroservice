<?php

namespace App\Repositories\EmployeeRankInfo;

use App\EmployeeRankInfo;
use App\Repositories\EmployeeRankInfo\EmployeeRankInfoContract;

class EloquentEmployeeRankInfoRepository implements EmployeeRankInfoContract
{
    public function create($request) {
        $employeeRankInfo = new EmployeeRankInfo;

        // Set the EmployeeRankInfo properties
        $this->setEmployeeRankInfoProperties($employeeRankInfo, $request);

        $employeeRankInfo->save();
        return $employeeRankInfo;
    }

    public function edit($employeeRankInfoId, $request) {
        $employeeRankInfo = $this->findById($employeeRankInfoId);

        // Edit the EmployeeRankInfo properties
        $this->setEmployeeRankInfoProperties($employeeRankInfo, $request);

        $employeeRankInfo->save();
        return $employeeRankInfo;
    }

    public function findAll() {
        return EmployeeRankInfo::all();
    }

    public function findById($employeeRankInfoId) {
        return EmployeeRankInfo::find($employeeRankInfoId);
    }
    
    public function findByEmployeeId($employeeId){
        return EmployeeRankInfo::where('employee_id', $employeeId)->first();
    }

    public function remove($employeeRankInfoId) {
        $employeeRankInfo = $this->findById($employeeRankInfoId);
        return $employeeRankInfo->delete();
    }

    private function setEmployeeRankInfoProperties($employeeRankInfo, $request) {
        // Assign attributes to the employeeRankInfo here
        $employeeRankInfo->employee_id = $request->employee;
        $employeeRankInfo->rank_id = $request->rank;
    }
}
