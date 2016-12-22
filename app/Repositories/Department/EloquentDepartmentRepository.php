<?php

namespace App\Repositories\Department;

use App\Department;
use App\Repositories\Department\DepartmentContract;

class EloquentDepartmentRepository implements DepartmentContract
{
    public function create($request) {
        $department = new Department;

        // Set the Department properties
        $this->setDepartmentProperties($department, $request);

        $department->save();
        return $department;
    }

    public function edit($departmentId, $request) {
        $department = $this->findById($departmentId);

        // Edit the Department properties
        $this->setDepartmentProperties($department, $request);

        $department->save();
        return $department;
    }

    public function findAll() {
        return Department::all();
    }

    public function findById($departmentId) {
        return Department::find($departmentId);
    }

    public function remove($departmentId) {
        $department = $this->findById($departmentId);
        return $department->delete();
    }

    private function setDepartmentProperties($department, $request) {
        // Assign attributes to the department here
        $department->title = $request->title;
    }
}
