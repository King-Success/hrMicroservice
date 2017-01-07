<?php

namespace App\Repositories\EmployeeBasicSalary;

interface EmployeeBasicSalaryContract
{
    public function create($request);
    public function edit($employeeBasicSalary, $request);
    public function findAll();
    public function findById($employeeBasicSalaryId);
    public function remove($employeeBasicSalaryId);
    public function findByEmployeeId($employeeBasicSalaryId);
}
