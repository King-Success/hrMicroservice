<?php

namespace App\Repositories\EmployeeRankInfo;

interface EmployeeRankInfoContract
{
    public function create($request);
    public function edit($employeeRankInfoId, $request);
    public function findAll();
    public function findById($employeeRankInfoId);
    public function remove($employeeRankInfoId);
}
