<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePensionInfo extends Model
{
    //
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
