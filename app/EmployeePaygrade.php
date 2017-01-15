<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePaygrade extends Model
{
    //
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    
    public function paygrade(){
        return $this->belongsTo('App\Paygrade');
    }
}
