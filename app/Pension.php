<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    //
    public function salary_component(){
        return $this->belongsTo('App\SalaryComponent');
    }
}
