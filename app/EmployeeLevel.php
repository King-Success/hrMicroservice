<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeLevel extends Model
{
    //
    public function paygrade(){
        return $this->belongsTo('App\Paygrade');
    }
}
