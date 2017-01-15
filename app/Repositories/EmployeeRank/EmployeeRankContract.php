<?php

namespace App\Repositories\EmployeeRank;

interface EmployeeRankContract
{
    public function create($request);
    public function edit($employeeRankId, $request);
    public function findAll();
    public function findById($employeeRankId);
    public function remove($employeeRankId);
    public function findByEmployeeId($employeeId);
}
