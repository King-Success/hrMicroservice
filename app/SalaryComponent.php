<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryComponent extends Model
{
    //
    public function employee_salary_component_infos(){
        return $this->hasMany('App\EmployeeSalaryComponentInfo');
    }
}
