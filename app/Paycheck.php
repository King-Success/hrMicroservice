<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paycheck extends Model
{
    //
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    
    public function payroll(){
        return $this->belongsTo('App\Payroll');
    }
}
