<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paygrade extends Model
{
    public function employee_level(){
        return $this->belongsTo('App\EmployeeLevel');
    }
}
