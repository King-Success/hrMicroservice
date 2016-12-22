<?php

namespace App\Repositories\Department;

interface DepartmentContract
{
    public function create($request);
    public function edit($departmentId, $request);
    public function findAll();
    public function findById($departmentId);
    public function remove($departmentId);
}
