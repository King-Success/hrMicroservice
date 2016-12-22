<?php

namespace App\Repositories\Employee;

interface EmployeeContract
{
    public function create($request);
    public function edit($employeeId, $request);
    public function findAll();
    public function findById($employeeId);
    public function remove($employeeId);
}
