<?php

namespace App\Repositories\Paycheck;

interface PaycheckContract
{
    public function getInstance();
    public function findById($paycheckId);
}
