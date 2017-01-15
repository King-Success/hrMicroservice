<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function prefix(){
        return $this->belongsTo('App\Prefix');
    }
    
    public function employee_paygrade(){
        return $this->hasOne('App\EmployeePaygrade'); //one-off access to level/step/basic_salary
    }
    
    public function employee_rank(){
        return $this->hasOne('App\EmployeeRank');
    }
    
    public function employee_department(){
        return $this->hasOne('App\EmployeeDepartment');
    }
    
    public function employee_basic_salary(){
        return $this->hasOne('App\EmployeeBasicSalary');
    }
    
    public function employee_pension(){
        return $this->hasOne('App\EmployeePension');
    }
    
    public function employee_bank(){
        return $this->hasOne('App\EmployeeBank');
    }
    
    public function employee_salary_components(){
        return $this->hasMany('App\EmployeeSalaryComponent');
    }
    
    public function employee_tax(){
        return $this->hasOne('App\EmployeeTax');
    }
    
}
