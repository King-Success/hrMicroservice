<?php

namespace App\Repositories\EmployeePension;

interface EmployeePensionContract
{
    public function create($request);
    public function edit($employeePensionId, $request);
    public function findAll();
    public function findById($employeePensionId);
    public function remove($employeePensionId);
    public function findByEmployeeId($employeeId);
}
