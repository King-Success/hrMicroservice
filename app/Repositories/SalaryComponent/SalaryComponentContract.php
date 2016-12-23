<?php

namespace App\Repositories\SalaryComponent;

interface SalaryComponentContract
{
    public function create($request);
    public function edit($salaryComponentId, $request);
    public function findAll();
    public function findById($salaryComponentId);
    public function remove($salaryComponentId);
}
