<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\CreatePayrollPdf;

class TestController extends Controller
{
    public static function test($id){
        dispatch(new CreatePayrollPdf(\App\Payroll::find($id)));
    }
}
