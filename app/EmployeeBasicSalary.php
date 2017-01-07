<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Ignore this table if we are using the rank based model
// i.e rank_is_king is set. Since rank determines basic salary is rank

class EmployeeBasicSalary extends Model
{
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
