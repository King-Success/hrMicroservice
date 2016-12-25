<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function employee_paygrade_info(){
        return $this->hasOne('App\EmployeePaygradeInfo'); //one-off access to level/step/basic_salary
    }
    
    public function employee_department_info(){
        return $this->hasOne('App\EmployeeDepartmentInfo');
    }
    
    public function employee_pension_info(){
        return $this->hasOne('App\EmployeePensionInfo');
    }
    
    public function employee_bank_info(){
        return $this->hasOne('App\EmployeeBankInfo');
    }
}
