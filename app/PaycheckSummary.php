<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaycheckSummary extends Model
{
    //
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    
    public function payroll(){
        return $this->belongsTo('App\Payroll');
    }
}
