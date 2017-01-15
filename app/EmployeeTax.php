<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeTax extends Model
{
    //
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    
    public function tax(){
        return $this->belongsTo('App\Tax');
    }
}
