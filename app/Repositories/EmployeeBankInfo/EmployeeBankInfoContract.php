<?php

namespace App\Repositories\EmployeeBankInfo;

interface EmployeeBankInfoContract
{
    public function create($request);
    public function edit($employeeBankInfoId, $request);
    public function findAll();
    public function findById($employeeBankInfoId);
    public function remove($employeeBankInfoId);
    public function findByEmployeeId($employeeId);
}
