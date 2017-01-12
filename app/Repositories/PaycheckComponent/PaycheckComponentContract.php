<?php

namespace App\Repositories\PaycheckComponent;

interface PaycheckComponentContract
{
    public function getInstance();
    public function findById($paycheckComponentId);
    public function findByPayrollId($payrollId);
}
