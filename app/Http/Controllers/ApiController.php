<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\PayslipDispatch;

class ApiController extends Controller
{
    public function sendPayslip($payroll_id, $employee_id, Request $request){
        event(new PayslipDispatch($payroll_id, $employee_id));
        $response = json_encode(["status"=>"pending"]);
        return response($response, '200')->header('Content-Type', 'application/json');
    }
}
