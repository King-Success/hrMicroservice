<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Payroll\PayrollContract;
use App\Repositories\Employee\EmployeeContract;

use DigitalPatterns\PayrollState;
use DigitalPatterns\PayrollGlobals;
use Cache;
use Carbon\Carbon;

use App\Jobs\PayEmployee;
use App\Jobs\CachePayroll;
use App\Events\PayrollCreationStarted;
use App\Events\PayrollCreationCancelled;
use App\Events\PayrollCreationFinished;

use App\Repositories\Paycheck\PaycheckContract;
use App\Repositories\PaycheckComponent\PaycheckComponentContract;
use App\Repositories\PaycheckSummary\PaycheckSummaryContract;
use App\Repositories\SalaryComponent\SalaryComponentContract;

use App\Repositories\Bank\BankContract;
use App\Repositories\Pension\PensionContract;
use App\Repositories\Tax\TaxContract;

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
    protected $taxModel;
    
    public function __construct(PayrollContract $payrollContract, EmployeeContract $employeeContract,
        PaycheckContract $paycheckContract, PaycheckSummaryContract $paycheckSummaryContract, 
        PaycheckComponentContract $paycheckComponentContract, SalaryComponentContract $salaryComponentModelContract,
        BankContract $bankContract, PensionContract $pensionContract, TaxContract $taxContract) {
        $this->payrollModel = $payrollContract;
        $this->employeeModel = $employeeContract;
        $this->appConfig = Cache::get('AppConfig');
        $this->paycheckModel = $paycheckContract;
        $this->paycheckComponentModel = $paycheckComponentContract;
        $this->paycheckSummaryModel = $paycheckSummaryContract;
        $this->salaryComponentModel = $salaryComponentModelContract;
        $this->bankModel = $bankContract;
        $this->pensionModel = $pensionContract;
        $this->taxModel = $taxContract;
    }
    
    public function oneBankReport($payrollId, $bankId, Request $request){
        $payroll = $this->payrollModel->findById($payrollId);
        $paycheckSummaries = $this->paycheckSummaryModel->findByPayrollId($payrollId);
        $bank = $this->bankModel->findById($bankId);
        return view('payrolls.bank', ['payroll' => $payroll, 'paycheckSummaries' => $paycheckSummaries,
            'bank' => $bank, 'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false]);
    }
    
    public function showOnePaySlip($payroll_id, $employee_id, Request $request){
        $payroll = $this->payrollModel->findById($payroll_id);
        $paycheck = $this->paycheckModel->findByPayrollEmployeeId($payroll_id, $employee_id);
        $paycheckSummaries = $this->paycheckSummaryModel->findByPayrollEmployeeId($payroll_id, $employee_id);
        $paycheckComponents = $this->paycheckComponentModel->findByPayrollEmployeeId($payroll_id, $employee_id);
        return view('payrolls.one_payslip', [
            'paycheck' => $paycheck,
            'paycheckSummaries' => $paycheckSummaries, 
            'paycheckComponents' => $paycheckComponents,
            'payroll' => $payroll,
            'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false,
            ]);
    }
    
    public function showOnePaySlipV2($payroll_id, $employee_id, Request $request){
        $payroll = $this->payrollModel->findById($payroll_id);
        $payslips = \DB::table('paycheck_components')
        ->join('paycheck_summaries', function($join){
            $join->on('paycheck_summaries.payroll_id', 'paycheck_components.payroll_id');
            $join->on('paycheck_summaries.employee_id', 'paycheck_components.employee_id');
        })
        ->select(
        ['paycheck_components.component_title', 
        'paycheck_components.component_permanent_title', 
        'paycheck_components.employee_id', 
        'paycheck_components.cycle',
        'paycheck_components.component_type',
        'paycheck_components.amount',
        'paycheck_components.employee_surname', 'paycheck_components.employee_othernames', 'paycheck_summaries.employee_prefix',
        'paycheck_summaries.pension_employer_contribution_amount',
        'paycheck_summaries.pension_voluntary_contribution_amount',
        'paycheck_summaries.pension_amount', 
        'paycheck_summaries.pensionable', 'paycheck_summaries.consolidated_salary', 
        'paycheck_summaries.consolidated_allowance', 'paycheck_summaries.basic_salary', 
        'paycheck_summaries.gross_total', 'paycheck_summaries.total_deductions', 'paycheck_summaries.total_earnings',
        'paycheck_summaries.net_pay',
        'paycheck_summaries.payroll_id as ps_payroll_id',
        'paycheck_components.payroll_id',
        'paycheck_summaries.employee_number'])
        ->where('paycheck_components.payroll_id', $payroll_id)
        ->where('paycheck_components.employee_id', $employee_id)
        ->get();
        
        return view('payrolls.one_payslipV2', [
            'paycheck' => $payslips,
            'payroll' => $payroll,
            'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false,
            ]);
    }
    
    public function showComponent($payrollId, $componentId, Request $request){
        $payroll = $this->payrollModel->findById($payrollId);
        $paycheckComponents = $this->paycheckComponentModel->findByPayrollId($payrollId);
        $salaryComponent = $this->salaryComponentModel->findById($componentId);
        $paycheckSummaries = $this->paycheckSummaryModel->findByPayrollId($payrollId);
        return view('payrolls.salary_component', ['payroll' => $payroll, 'paycheckComponents' => $paycheckComponents,
            'salaryComponent' => $salaryComponent, 'paycheckSummaries' => $paycheckSummaries,
            'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false]);
    }
    
    public function showPension($payrollId, $pensionId, Request $request){
        $payroll = $this->payrollModel->findById($payrollId);
        $pension = $this->pensionModel->findById($pensionId);
        $paycheckComponents = $this->paycheckComponentModel->findByPayrollId($payrollId);
        $paycheckSummaries = $this->paycheckSummaryModel->findByPayrollId($payrollId);
        $pensionables = $paycheckSummaries->where('pensionable', true)->where('pension_id', $pensionId);
        return view('payrolls.pension', ['payroll' => $payroll, 
            'paycheckComponents' => $paycheckComponents, 'pension' => $pension,
            'pensions' => $this->pensionModel->findAll(), 'paycheckSummaries' => $paycheckSummaries,
            'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false,
            'pensionables' => $pensionables,]);
    }
    
    public function showPensionComponent($payrollId, Request $request){
        $payroll = $this->payrollModel->findById($payrollId);
        $paycheckComponents = $this->paycheckComponentModel->findByPayrollId($payrollId);
        $paycheckSummaries = $this->paycheckSummaryModel->findByPayrollId($payrollId);
        $pensionables = $paycheckSummaries->where('pensionable', true);
        return view('payrolls.pensions', ['payroll' => $payroll, 
            'paycheckComponents' => $paycheckComponents,
            'pensions' => $this->pensionModel->findAll(), 'paycheckSummaries' => $paycheckSummaries,
            'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false,
            'pensionables' => $pensionables,]);
    }
    
    //TODO See:
    public function getPaycheckSummary($payrollId, Request $request){
        $payroll = $this->payrollModel->findById($payrollId);
        $paycheckComponents = $this->paycheckComponentModel->findByPayrollId($payrollId);
        $componentGroups = $paycheckComponents->groupBy('component_type');
        // dd($componentGroups['Earning']);
        $paycheckSummaries = $this->paycheckSummaryModel->findByPayrollId($payrollId);
        return view('payrolls.paycheck_summary', ['payroll' => $payroll, 
            'componentGroups' => $componentGroups,
            'earnings' => $componentGroups['Earning']->unique('component_title'),
            'deductions' => $componentGroups['Deduction']->unique('component_title'),
            'paycheckComponents' => $paycheckComponents, 'paycheckSummaries' => $paycheckSummaries,
            'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false]);
    }
    
    public function showTax($payrollId, Request $request){
        $payroll = $this->payrollModel->findById($payrollId);
        $taxes = $this->taxModel->findAll();
        $paycheckComponents = $this->paycheckComponentModel->findByPayrollId($payrollId);
        $paycheckSummaries = $this->paycheckSummaryModel->findByPayrollId($payrollId);
        return view('payrolls.tax', ['payroll' => $payroll, 'paycheckSummaries' => $paycheckSummaries,
            'paycheckComponents' => $paycheckComponents, 'tax' => $taxes->last(),
            'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false]);
    }
    
    public function showNetPay($payrollId, Request $request){
        $payroll = $this->payrollModel->findById($payrollId);
        $paycheckSummaries = $this->paycheckSummaryModel->findByPayrollId($payrollId);
        return view('payrolls.net_pay', ['payroll' => $payroll, 'paycheckSummaries' => $paycheckSummaries,
        'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false]);
    }
    
    public function show($id, Request $request){
        
        ini_set("memory_limit", "2048M");
        ini_set("max_execution_time", 0);
        
        $payroll = $this->payrollModel->findById($id);
        $paychecks = $this->paycheckModel->findByPayrollId($id);
        // $paychecks = \App\Paycheck::where('payroll_id', $id)->get();
        $paycheckSummaries = $this->paycheckSummaryModel->findByPayrollId($id);
        $paycheckComponents = $this->paycheckComponentModel->findByPayrollId($id);
        $pensionables = $paycheckSummaries->where('pensionable', true)->groupBy('pension_company')->toArray();
        $taxables = $paycheckSummaries->where('taxable', true)->toArray();
        $bankables = $paycheckSummaries->where('bankable', true)->groupBy('bank')->toArray();
        $salaryComponents = $this->salaryComponentModel->findAll();
        $taxes = $this->taxModel->findAll();
        $payslips = \DB::table('paycheck_components')
        ->join('paycheck_summaries', function($join){
            $join->on('paycheck_summaries.payroll_id', 'paycheck_components.payroll_id');
            $join->on('paycheck_summaries.employee_id', 'paycheck_components.employee_id');
        })
        ->select(
        ['paycheck_components.component_title', 
        'paycheck_components.component_permanent_title', 
        'paycheck_components.employee_id', 
        'paycheck_components.cycle',
        'paycheck_components.component_type',
        'paycheck_components.amount',
        'paycheck_components.employee_surname', 'paycheck_components.employee_othernames', 'paycheck_summaries.employee_prefix',
        'paycheck_summaries.pension_employer_contribution_amount',
        'paycheck_summaries.pension_voluntary_contribution_amount',
        'paycheck_summaries.pension_amount', 
        'paycheck_summaries.pensionable', 'paycheck_summaries.consolidated_salary', 
        'paycheck_summaries.consolidated_allowance', 'paycheck_summaries.basic_salary', 
        'paycheck_summaries.gross_total', 'paycheck_summaries.total_deductions', 'paycheck_summaries.total_earnings',
        'paycheck_summaries.net_pay',
        'paycheck_summaries.payroll_id as ps_payroll_id',
        'paycheck_components.payroll_id',
        'paycheck_summaries.employee_number'])
        ->where('paycheck_components.payroll_id', $id)
        ->get()->groupBy('employee_id');
        
        // foreach($payslips as $paycheck){
        //     if($paycheck[0]->employee_id != 230) continue;
        //     dd($paycheck);
        // }
        return view('payrolls.report', ['paychecks' => $paychecks,
            'paycheckSummaries' => $paycheckSummaries, 'paycheckComponents' => $paycheckComponents,
            'salaryComponents' => $salaryComponents,
            'banks' => $this->bankModel->findAll(),
            'pensions' => $this->pensionModel->findAll(),
            'payroll' => $payroll,
            'tax' => $taxes->last(),
            'pensionables' => $pensionables,
            'taxables' => $taxables,
            'bankables' => $bankables,
            'payslips' => $payslips
            ]);
    }
    
    public function createPayslipV2($id, Request $request){
        ini_set("memory_limit", "2048M");
        ini_set("max_execution_time", 0);
        
        $payroll = $this->payrollModel->findById($id);
        $payslips = \DB::table('paycheck_components')
        ->join('paycheck_summaries', function($join){
            $join->on('paycheck_summaries.payroll_id', 'paycheck_components.payroll_id');
            $join->on('paycheck_summaries.employee_id', 'paycheck_components.employee_id');
        })
        ->select(
        ['paycheck_components.component_title', 
        'paycheck_components.component_permanent_title', 
        'paycheck_components.employee_id', 
        'paycheck_components.cycle',
        'paycheck_components.component_type',
        'paycheck_components.amount',
        'paycheck_components.employee_surname', 'paycheck_components.employee_othernames', 'paycheck_summaries.employee_prefix',
        'paycheck_summaries.pension_employer_contribution_amount',
        'paycheck_summaries.pension_voluntary_contribution_amount',
        'paycheck_summaries.pension_amount', 
        'paycheck_summaries.pensionable', 'paycheck_summaries.consolidated_salary', 
        'paycheck_summaries.consolidated_allowance', 'paycheck_summaries.basic_salary', 
        'paycheck_summaries.gross_total', 'paycheck_summaries.total_deductions', 'paycheck_summaries.total_earnings',
        'paycheck_summaries.net_pay',
        'paycheck_summaries.payroll_id as ps_payroll_id',
        'paycheck_components.payroll_id',
        'paycheck_summaries.employee_number'])
        ->where('paycheck_components.payroll_id', $id)
        ->get()->groupBy('employee_id');
        
        return view('payrolls.payslipV2', ['payslips' => $payslips,
            'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false, 'payroll' => $payroll]);
    }

    public function createPayslip($id, Request $request){
        ini_set("memory_limit", "2048M");
        ini_set("max_execution_time", 0);
        
        $payroll = $this->payrollModel->findById($id);
        $paychecks = $this->paycheckModel->findByPayrollId($id);
        $paycheckSummaries = $this->paycheckSummaryModel->findByPayrollId($id);
        $paycheckComponents = $this->paycheckComponentModel->findByPayrollId($id);
        
        return view('payrolls.payslip', ['paychecks' => $paychecks,
            'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false,
            'paycheckSummaries' => $paycheckSummaries, 'paycheckComponents' => $paycheckComponents, 'payroll' => $payroll]);
        
        view()->share('paychecks', $paychecks);
        view()->share('paycheckSummaries', $paycheckSummaries);
        view()->share('paycheckComponents', $paycheckSummaries);
        view()->share('paycheckSummaries', $paycheckComponents);
        view()->share('payroll', $payroll);
        $pdf = \PDF::loadView('payrolls.payslip2')->setPaper('a4', 'landscape');
        return $pdf->download($payroll->title . '_' . $payroll->paid_at . '_payslip.pdf');
        
        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML(loadView('payrolls.payslip', ['paychecks' => $paychecks, 
        //     'paycheckSummaries' => $paycheckSummaries, 'paycheckComponents' => $paycheckComponents, 'payroll' => $payroll]));
        // return $pdf->stream();
    
        // $payslip = View::make('payrolls.payslip', ['paychecks' => $paychecks, 
        //     'paycheckSummaries' => $paycheckSummaries, 'paycheckComponents' => $paycheckComponents, 'payroll' => $payroll])->render();
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
            'title' => 'required',
            'paid_at' => 'required|date',
            'cycle' => 'required|numeric',
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
            'title' => 'required',
            'paid_at' => 'required|date',
            'cycle' => 'required|numeric',
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
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/');
        } else {
            return back()
               ->with('error', 'Could not delete Payroll. Try again!');
        }
    }
}
