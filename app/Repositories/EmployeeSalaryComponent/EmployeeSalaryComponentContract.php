<?php

namespace App\Repositories\EmployeeSalaryComponent;

interface EmployeeSalaryComponentContract
{
    public function create($request);
    public function edit($employeeSalaryComponentId, $request);
    public function findAll();
    public function findById($employeeSalaryComponentId);
    public function remove($employeeSalaryComponentId);
    public function findByEmployeeId($employeeId);
    public function clear($employeeId);
}
