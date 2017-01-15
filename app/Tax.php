<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    //
    public function salary_component(){
        return $this->belongsTo('App\SalaryComponent');
    }
}
