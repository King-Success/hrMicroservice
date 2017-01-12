<?php

namespace App\Repositories\PaycheckSummary;

interface PaycheckSummaryContract
{
    public function getInstance();
    public function findById($paycheckSummaryId);
    public function findByPayrollId($payrollId);
}
