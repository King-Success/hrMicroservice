<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePension extends Model
{
    //
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    
    public function pension(){
        return $this->belongsTo('App\Pension');
    }
}
