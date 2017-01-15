<?php

namespace App\Repositories\EmployeePaygrade;

interface EmployeePaygradeContract
{
    public function create($request);
    public function edit($employeePaygradeId, $request);
    public function findAll();
    public function findById($employeePaygradeId);
    public function remove($employeePaygradeId);
    public function findByEmployeeId($employeeId);
}
