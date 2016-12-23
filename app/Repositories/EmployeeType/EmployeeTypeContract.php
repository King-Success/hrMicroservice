<?php

namespace App\Repositories\EmployeeType;

interface EmployeeTypeContract
{
    public function create($request);
    public function edit($employeeTypeId, $request);
    public function findAll();
    public function findById($employeeTypeId);
    public function remove($employeeTypeId);
}
