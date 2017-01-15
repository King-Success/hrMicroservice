<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalaryComponent extends Model
{
    //
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    
    public function salary_component(){
        return $this->belongsTo('App\SalaryComponent');
    }
}
