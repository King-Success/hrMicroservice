<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Payroll\PayrollContract;
use App\Repositories\Employee\EmployeeContract;

use DigitalPatterns\PayrollState;
use DigitalPatterns\PayrollGlobals;
use Cache;

use App\Jobs\PayEmployee;
use App\Events\PayrollCreationStarted;
use App\Events\PayrollCreationCancelled;
use App\Events\PayrollCreationFinished;

use App\Repositories\Paycheck\PaycheckContract;
use App\Repositories\PaycheckComponent\PaycheckComponentContract;
use App\Repositories\PaycheckSummary\PaycheckSummaryContract;
use App\Repositories\SalaryComponent\SalaryComponentContract;

use App\Repositories\Bank\BankContract;
use App\Repositories\Pension\PensionContract;

// use PDF;
// use View;

class PayrollController extends Controller
{
    protected $payrollModel;
    protected $appConfig;
    protected $employeeModel;
    
    protected $paycheckModel;
    protected $paycheckComponentModel;
    protected $paycheckSummaryModel;
    
    protected $bankModel;
    protected $pensionModel;
    
    public function __construct(PayrollContract $payrollContract, EmployeeContract $employeeContract,
        PaycheckContract $paycheckContract, PaycheckSummaryContract $paycheckSummaryContract, 
        PaycheckComponentContract $paycheckComponentContract, SalaryComponentContract $salaryComponentModelContract,
        BankContract $bankContract, PensionContract $pensionContract) {
        $this->payrollModel = $payrollContract;
        $this->employeeModel = $employeeContract;
        $this->appConfig = Cache::get('AppConfig');
        
        $this->paycheckModel = $paycheckContract;
        $this->paycheckComponentModel = $paycheckComponentContract;
        $this->paycheckSummaryModel = $paycheckSummaryContract;
        $this->salaryComponentModel = $salaryComponentModelContract;
        
        $this->bankModel = $bankContract;
        $this->pensionModel = $pensionContract;
    }
    
    public function oneBankReport($bankId, $payrollId, Request $request){
        $payroll = $this->payrollModel->findById($payrollId);
        $paycheckSummaries = $this->paycheckSummaryModel->findByPayrollId($payrollId);
        $bank = $this->bankModel->findById($bankId);
        return view('payrolls.bank', ['payroll' => $payroll, 'paycheckSummaries' => $paycheckSummaries,
            'bank' => $bank, 'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false]);
    }
    
    public function showComponent($componentId, $payrollId, Request $request){
        $payroll = $this->payrollModel->findById($payrollId);
        $paycheckComponents = $this->paycheckComponentModel->findByPayrollId($payrollId);
        $salaryComponent = $this->salaryComponentModel->findById($componentId);
        return view('payrolls.salary_component', ['payroll' => $payroll, 'paycheckComponents' => $paycheckComponents,
            'salaryComponent' => $salaryComponent, 'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false]);
    }
    
    public function showNetPay($payrollId, Request $request){
        $payroll = $this->payrollModel->findById($payrollId);
        $paycheckSummaries = $this->paycheckSummaryModel->findByPayrollId($payrollId);
        return view('payrolls.net_pay', ['payroll' => $payroll, 'paycheckSummaries' => $paycheckSummaries,
        'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false]);
    }
    
    public function show($id, Request $request){
        $payroll = $this->payrollModel->findById($id);
        $paychecks = $this->paycheckModel->findByPayrollId($id);
        $paycheckSummaries = $this->paycheckSummaryModel->findByPayrollId($id);
        $paycheckComponents = $this->paycheckComponentModel->findByPayrollId($id);
        $salaryComponents = $this->salaryComponentModel->findAll();
        return view('payrolls.report', ['paychecks' => $paychecks,
            'paycheckSummaries' => $paycheckSummaries, 'paycheckComponents' => $paycheckComponents,
            'salaryComponents' => $salaryComponents,
            'banks' => $this->bankModel->findAll(),
            'pensions' => $this->pensionModel->findAll(),
            'payroll' => $payroll,
            ]);
    }

    public function createPayslip($id, Request $request){
        $payroll = $this->payrollModel->findById($id);
        $paychecks = $this->paycheckModel->findByPayrollId($id);
        $paycheckSummaries = $this->paycheckSummaryModel->findByPayrollId($id);
        $paycheckComponents = $this->paycheckComponentModel->findByPayrollId($id);
        
        return view('payrolls.payslip', ['paychecks' => $paychecks,
            'paycheckSummaries' => $paycheckSummaries, 'paycheckComponents' => $paycheckComponents, 'payroll' => $payroll]);
        
        // $pdf = \PDF::loadView('payrolls.payslip', ['paychecks' => $paychecks, 
        //     'paycheckSummaries' => $paycheckSummaries, 'paycheckComponents' => $paycheckComponents]);
        // return $pdf->download($payroll->title . '_' . $payroll->paid_at . '_payslip.pdf');
        
        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML(loadView('payrolls.payslip', ['paychecks' => $paychecks, 
        //     'paycheckSummaries' => $paycheckSummaries, 'paycheckComponents' => $paycheckComponents]));
        // return $pdf->stream();
    
        // $payslip = View::make('payrolls.payslip', ['paychecks' => $paychecks, 
        //     'paycheckSummaries' => $paycheckSummaries, 'paycheckComponents' => $paycheckComponents])->render();
        // return \PDF::loadHTML($payslip)->setWarnings(false)->download($payroll->title . '_' . $payroll->paid_at . '_payslip.pdf');
    }
    
    public function index() {
        
        $payrolls = $this->payrollModel->findAll();
        
        if(!$this->appConfig->freeze_mode_activated){
            return view('payrolls.index', ['payrolls' => $payrolls, 'payroll'=> $payrolls ? $payrolls->last() : null]);
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
         
         if ($payroll) {
             
            if(count($request->employees) >= PayrollGlobals::$MAX_EMPLOYEES_CAN_PAY_VIA_WEB){
                foreach ($request->employees as $employeeId => $value) {
                    dispatch(new PayEmployee($this->employeeModel->findById($employeeId), $payroll));
                }
                $payroll->state = PayrollState::$PAYROLL_PROCESSING;
                $payroll->save();
            }else{
                foreach ($request->employees as $employeeId => $value) {
                    $payEmployee = new PayEmployee($this->employeeModel->findById($employeeId), $payroll);
                    $payEmployee->handle($this->paycheckModel, $this->paycheckComponentModel, $this->paycheckSummaryModel);
                }
                $payroll->state = PayrollState::$PAYROLL_APPROVED;
                $payroll->save();
                event(new PayrollCreationFinished($payroll->toArray()));
            }
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
