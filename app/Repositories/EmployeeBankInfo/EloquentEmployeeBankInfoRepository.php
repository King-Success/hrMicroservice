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
    
    public function findByEmployeeId($employeeId){
        return EmployeeBankInfo::where('employee_id', $employeeId)->first();
    }

    public function remove($employeeBankInfoId) {
        $employeeBankInfo = $this->findById($employeeBankInfoId);
        return $employeeBankInfo->delete();
    }

    private function setEmployeeBankInfoProperties($employeeBankInfo, $request) {
        // Assign attributes to the employeeBankInfo here
        $employeeBankInfo->sort_code = $request->sort_code;
        $employeeBankInfo->bank_id = $request->bank;
        $employeeBankInfo->employee_id = $request->employee;
        $employeeBankInfo->account_name = $request->account_name;
        $employeeBankInfo->account_number = $request->account_number;
    }
}
