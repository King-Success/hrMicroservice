<?php

namespace App\Repositories\EmployeeBank;

use App\EmployeeBank;
use App\Repositories\EmployeeBank\EmployeeBankContract;

class EloquentEmployeeBankRepository implements EmployeeBankContract
{
    public function create($request) {
        $employeeBank = new EmployeeBank;

        // Set the EmployeeBank properties
        $this->setEmployeeBankProperties($employeeBank, $request);

        $employeeBank->save();
        return $employeeBank;
    }

    public function edit($employeeBankId, $request) {
        $employeeBank = $this->findById($employeeBankId);

        // Edit the EmployeeBank properties
        $this->setEmployeeBankProperties($employeeBank, $request);

        $employeeBank->save();
        return $employeeBank;
    }

    public function findAll() {
        return EmployeeBank::all();
    }

    public function findById($employeeBankId) {
        return EmployeeBank::find($employeeBankId);
    }
    
    public function findByEmployeeId($employeeId){
        return EmployeeBank::where('employee_id', $employeeId)->first();
    }

    public function remove($employeeBankId) {
        $employeeBank = $this->findById($employeeBankId);
        return $employeeBank->delete();
    }

    private function setEmployeeBankProperties($employeeBank, $request) {
        // Assign attributes to the employeeBank here
        $employeeBank->sort_code = $request->sort_code;
        $employeeBank->bank_id = $request->bank;
        $employeeBank->employee_id = $request->employee;
        $employeeBank->account_name = $request->account_name;
        $employeeBank->account_number = $request->account_number;
    }
}
