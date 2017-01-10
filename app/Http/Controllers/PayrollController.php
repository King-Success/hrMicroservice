<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Payroll\PayrollContract;
use App\Repositories\Employee\EmployeeContract;

use DigitalPatterns\PayrollState;
use Cache;

use App\Jobs\PayEmployee;

class PayrollController extends Controller
{
    protected $payrollModel;
    protected $appConfig;
    protected $employeeModel;
    
    public function __construct(PayrollContract $payrollContract, EmployeeContract $employeeContract) {
        $this->payrollModel = $payrollContract;
        $this->employeeModel = $employeeContract;
        $this->appConfig = Cache::get('AppConfig');
    }


    public function index() {
        
        $payrolls = $this->payrollModel->findAll();
        
        if(!$this->appConfig->freeze_mode_activated){
            return view('payrolls.index', ['payrolls' => $payrolls]);
        }
        
        $curPayroll = $this->payrollModel->getActive();
        
        switch ($curPayroll->state) {
            case PayrollState::$NEW_PAYROLL_CREATED:
                return view('payrolls.selection', ['payroll' => $curPayroll, 'employees' => $this->employeeModel->findAll()]);
                break;
            case PayrollState::$EMPLOYEE_SELECTED:
                return view('payrolls.preview', ['payrolls' => $payrolls]);
                break;
            case PayrollState::$PAYROLL_PROCESSING:
                return view('payrolls.processing', ['currentPayroll' => $curPayroll]);
                break;
            case PayrollState::$PAYROLL_APPROVED:
                return view('payrolls.paycheck', ['payrolls' => $payrolls]);
                break;
            default:
                throw new \Exception('Invalid Payroll State');
        }
    }

    // Display payrolls.create
    public function create() {
        if($this->appConfig->freeze_mode_activated){
            return redirect('/payroll');
        }
        return view('payrolls.create');
    }

    /**
     * Validate form.
     * Save Payroll to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $payroll = $this->payrollModel->create($request);
         if ($payroll->id) {
             // Redirect or do whatever you like
             return redirect('/payroll');
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create Payroll. Try again!');
         }
     }
     
     public function createPaycheck($id, Request $request) {
         $this->validate($request, [
            // Specify validation rules here
            'employees' => 'required',
         ]);

         $payroll = $this->payrollModel->findById($id);
         
         foreach ($request->employees as $employeeId => $value) {
             dispatch(new PayEmployee($this->employeeModel->findById($employeeId), $payroll));
         }
         
         if ($payroll) {
             // Redirect or do whatever you like
             $payroll->state = PayrollState::$PAYROLL_PROCESSING;
             $payroll->save();
            //  $this->payrollModel->edit($payroll->id, $payroll);
             return redirect('/payroll');
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create Payroll. Try again!');
         }
     }

    // Display payrolls.edit with payroll to edit
    public function edit($id) {
        $payroll = $this->payrollModel->findById($id);
        return view('payrolls.edit', ['payroll' => $payroll]);
    }

    /**
     * Validate form.
     * Update Payroll in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $payroll = $this->payrollModel->edit($id, $request);
        if ($payroll->id) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update Payroll. Try again!');
        }
    }

    /**
     * Delete Payroll from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->payrollModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete Payroll. Try again!');
        }
    }
}
