<?php

namespace App\Repositories\EmployeeLevel;

interface EmployeeLevelContract
{
    public function create($request);
    public function edit($employeeLevelId, $request);
    public function findAll();
    public function findById($employeeLevelId);
    public function remove($employeeLevelId);
}
