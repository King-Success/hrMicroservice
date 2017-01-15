<?php

namespace App\Repositories\EmployeeTax;

interface EmployeeTaxContract
{
    public function create($request);
    public function edit($employeeTaxId, $request);
    public function findAll();
    public function findById($employeeTaxId);
    public function remove($employeeTaxId);
    public function findByEmployeeId($employeeId);
}
