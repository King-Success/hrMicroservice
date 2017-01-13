<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryComponent extends Model
{
    //
    public function pension()
    {
        return $this->hasMany('App\Pension');
    }
}
