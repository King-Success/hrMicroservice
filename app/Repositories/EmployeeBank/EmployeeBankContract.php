<?php

namespace App\Repositories\EmployeeBank;

interface EmployeeBankContract
{
    public function create($request);
    public function edit($employeeBankId, $request);
    public function findAll();
    public function findById($employeeBankId);
    public function remove($employeeBankId);
    public function findByEmployeeId($employeeId);
}
