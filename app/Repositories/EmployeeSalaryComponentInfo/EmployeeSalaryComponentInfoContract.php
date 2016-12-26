<?php

namespace App\Repositories\EmployeeSalaryComponentInfo;

interface EmployeeSalaryComponentInfoContract
{
    public function create($request);
    public function edit($employeeSalaryComponentInfoId, $request);
    public function findAll();
    public function findById($employeeSalaryComponentInfoId);
    public function remove($employeeSalaryComponentInfoId);
    public function findByEmployeeId($employeeId);
    public function clear($employerId);
}
