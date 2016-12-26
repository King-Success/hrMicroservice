<?php

namespace App\Repositories\EmployeePaygradeInfo;

interface EmployeePaygradeInfoContract
{
    public function create($request);
    public function edit($employeePaygradeInfoId, $request);
    public function findAll();
    public function findById($employeePaygradeInfoId);
    public function remove($employeePaygradeInfoId);
    public function findByEmployeeId($employeeId);
}
