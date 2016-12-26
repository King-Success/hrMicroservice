<?php

namespace App\Repositories\EmployeePensionInfo;

interface EmployeePensionInfoContract
{
    public function create($request);
    public function edit($employeePensionInfoId, $request);
    public function findAll();
    public function findById($employeePensionInfoId);
    public function remove($employeePensionInfoId);
    public function findByEmployeeId($employeeId);
}
