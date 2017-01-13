<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaycheckComponent extends Model
{
    //
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    
    public function employee_salary_component_info(){
        return $this->belongsTo('App\EmployeeSalaryComponentInfo');
    }
}
