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
    
    public function findByEmployeeId($employeeId){
        return EmployeeSalaryComponentInfo::where('employee_id', $employeeId)->get();
    }

    public function remove($employeeSalaryComponentInfoId) {
        $employeeSalaryComponentInfo = $this->findById($employeeSalaryComponentInfoId);
        return $employeeSalaryComponentInfo->delete();
    }
    
    public function clear($employerId){
        return EmployeeSalaryComponentInfo::where('employee_id', $employerId)->delete();
    }

    private function setEmployeeSalaryComponentInfoProperties($employeeSalaryComponentInfo, $request) {
        // Assign attributes to the employeeSalaryComponentInfo here
        $employeeSalaryComponentInfo->employee_id = $request->employee;
        $employeeSalaryComponentInfo->salary_component_id = $request->salary_component;
        $employeeSalaryComponentInfo->amount = $request->amount ? $request->amount : 0.00;
    }
}
