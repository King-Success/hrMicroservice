<?php

namespace App\Repositories\Payroll;

interface PayrollContract
{
    public function create($request);
    public function edit($payrollId, $request);
    public function findAll();
    public function findById($payrollId);
    public function remove($payrollId);
}
