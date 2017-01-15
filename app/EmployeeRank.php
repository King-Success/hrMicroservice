<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeRank extends Model
{
    //
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    
    public function rank(){
        return $this->belongsTo('App\Rank');
    }
}
