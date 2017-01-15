<?php

namespace App\Repositories\EmployeeSalaryComponent;

use App\EmployeeSalaryComponent;
use App\Repositories\EmployeeSalaryComponent\EmployeeSalaryComponentContract;

class EloquentEmployeeSalaryComponentRepository implements EmployeeSalaryComponentContract
{
    public function create($request) {
        $employeeSalaryComponent = new EmployeeSalaryComponent;

        // Set the EmployeeSalaryComponent properties
        $this->setEmployeeSalaryComponentProperties($employeeSalaryComponent, $request);

        $employeeSalaryComponent->save();
        return $employeeSalaryComponent;
    }

    public function edit($employeeSalaryComponentId, $request) {
        $employeeSalaryComponent = $this->findById($employeeSalaryComponentId);

        // Edit the EmployeeSalaryComponent properties
        $this->setEmployeeSalaryComponentProperties($employeeSalaryComponent, $request);

        $employeeSalaryComponent->save();
        return $employeeSalaryComponent;
    }

    public function findAll() {
        return EmployeeSalaryComponent::all();
    }

    public function findById($employeeSalaryComponentId) {
        return EmployeeSalaryComponent::find($employeeSalaryComponentId);
    }
    
    public function findByEmployeeId($employeeId){
        return EmployeeSalaryComponent::where('employee_id', $employeeId)->get();
    }

    public function remove($employeeSalaryComponentId) {
        $employeeSalaryComponent = $this->findById($employeeSalaryComponentId);
        return $employeeSalaryComponent->delete();
    }
    
    public function clear($employeeId){
        return EmployeeSalaryComponent::where('employee_id', $employeeId)->delete();
    }

    private function setEmployeeSalaryComponentProperties($employeeSalaryComponent, $request) {
        // Assign attributes to the employeeSalaryComponent here
        $employeeSalaryComponent->employee_id = $request->employee;
        $employeeSalaryComponent->salary_component_id = $request->salary_component;
        $employeeSalaryComponent->amount = $request->amount ? $request->amount : 0.00;
    }
}
