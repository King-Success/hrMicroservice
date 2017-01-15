<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryComponent extends Model
{
    //
    public function employee_salary_components(){
        return $this->hasMany('App\EmployeeSalaryComponent');
    }
}
