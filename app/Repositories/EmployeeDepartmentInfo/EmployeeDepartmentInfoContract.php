<?php

namespace App\Repositories\EmployeeDepartmentInfo;

interface EmployeeDepartmentInfoContract
{
    public function create($request);
    public function edit($employeeDepartmentInfoId, $request);
    public function findAll();
    public function findById($employeeDepartmentInfoId);
    public function remove($employeeDepartmentInfoId);
    public function findByEmployeeId($employeeId);
}
