<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\PayslipDispatch;
use DigitalPatterns\PayrollGlobals;
use App\Jobs\MailPayrollPaylip;
use Cache;
use App\Repositories\Payroll\PayrollContract;

class ApiController extends Controller
{
    protected $payrollModel;
    
    public function __construct(PayrollContract $payrollContract) {
        $this->payrollModel = $payrollContract;
        $this->appConfig = Cache::get('AppConfig');
    }
    
    public function sendPayslip($payroll_id, $employee_id, Request $request){
        $payroll = $this->payrollModel->findById($payroll_id);
        if ($payroll) {
            event(new PayslipDispatch($payroll_id, $employee_id));
            $response = json_encode(["status"=> true, "message" => "The payslip will be sent provided you have a working internet connection"]);
        }else{
            $response = json_encode(["status"=> true, "message" => "Payroll does not exists"]);
        }
        return response($response, '200')->header('Content-Type', 'application/json');
    }
    
    public function sendPayslips($payroll_id, Request $request){
        $payroll = $this->payrollModel->findById($payroll_id);
        if ($payroll) {
            $paychecks = \DB::table('paycheck_summaries')->where('payroll_id', $payroll_id)->select(['employee_id'])->get();
            if(count($paychecks) <= PayrollGlobals::$MAX_PAYSLIPS_TO_SEND_BY_MAIL_VIA_WEB){
                foreach($paychecks as $paycheck){
                    event(new PayslipDispatch($payroll_id, $paycheck->employee_id));
                }
                $response = json_encode(["status"=> true, "message" => "The payslips will be sent by mail provided you have a working internet connection"]);
            }else{
                foreach($paychecks as $paycheck){
                    dispatch(new MailPayrollPaylip($payroll_id, $paycheck->employee_id));
                }
                $response = json_encode(["status"=> true, "message" => "You have have exceeded the maximum number of payslip count of ". PayrollGlobals::$MAX_PAYSLIPS_TO_SEND_BY_MAIL_VIA_WEB . ' being limit to process via the web, An external process if setup will trigger this task automatically. You can also run it manually from terminal with: <br/> <code>php /var/www/payroll/artisan queue:work</code>']);
            }
        }else{
            $response = json_encode(["status"=> true, "message" => "Payroll does not exists"]);
        }
        return response($response, '200')->header('Content-Type', 'application/json');
    }
}
