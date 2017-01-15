<?php

namespace App\Repositories\EmployeeDepartment;

interface EmployeeDepartmentContract
{
    public function create($request);
    public function edit($employeeDepartmentId, $request);
    public function findAll();
    public function findById($employeeDepartmentId);
    public function remove($employeeDepartmentId);
    public function findByEmployeeId($employeeId);
}
