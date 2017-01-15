<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeBank extends Model
{
    //
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    
    public function bank(){
        return $this->belongsTo('App\Bank');
    }
}
