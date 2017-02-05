<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Employee\EmployeeContract;
use App\Repositories\Prefix\PrefixContract;
use App\Repositories\EmployeeType\EmployeeTypeContract;

// 
use App\Repositories\Department\DepartmentContract;
use App\Repositories\Rank\RankContract;
use App\Repositories\Paygrade\PaygradeContract;
use App\Repositories\Bank\BankContract;
use App\Repositories\Pension\PensionContract;
use App\Repositories\SalaryComponent\SalaryComponentContract;

// 
use App\Repositories\EmployeeDepartment\EmployeeDepartmentContract;
use App\Repositories\EmployeeRank\EmployeeRankContract;
use App\Repositories\EmployeePaygrade\EmployeePaygradeContract;
use App\Repositories\EmployeeBank\EmployeeBankContract;
use App\Repositories\EmployeePension\EmployeePensionContract;
use App\Repositories\EmployeeSalaryComponent\EmployeeSalaryComponentContract;
use App\Repositories\EmployeeBasicSalary\EmployeeBasicSalaryContract;


// Third Party
use Yajra\Datatables\Datatables;

class EmployeeController extends Controller
{
    protected $employeeModel;
    protected $prefixModel;
    protected $employeeTypeModel;
    
    // 
    protected $departmentModel;
    protected $rankModel;
    protected $paygradeModel;
    protected $bankModel;
    protected $pensionModel;
    protected $salaryComponentModel;
    
    // 
    protected $employeeDepartmentModel;
    protected $employeeRankModel;
    protected $employeePaygradeModel;
    protected $employeeBankModel;
    protected $employeePensionModel;
    protected $employeeSalaryComponentModel;
    protected $employeeBasicSalaryModel;
    
    public function __construct(EmployeeContract $employeeContract, 
        PrefixContract $prefixContract,
        EmployeeTypeContract $employeeTypeContract,
        
        DepartmentContract $departmentContract,
        RankContract $rankContract,
        PaygradeContract $paygradeContract,
        BankContract $bankContract,
        PensionContract $pensionContract,
        SalaryComponentContract $salaryComponentContract,
        
        EmployeeDepartmentContract $employeeDepartmentContract,
        EmployeeRankContract $employeeRankContract,
        EmployeePaygradeContract $employeePaygradeContract,
        EmployeeBankContract $employeeBankContract,
        EmployeePensionContract $employeePensionContract,
        EmployeeSalaryComponentContract $employeeSalaryComponentContract,
        EmployeeBasicSalaryContract $employeeBasicSalaryContract
        ) {
        $this->employeeModel = $employeeContract;
        $this->prefixModel = $prefixContract;
        $this->employeeTypeModel = $employeeTypeContract;
        
        $this->departmentModel = $departmentContract;
        $this->rankModel = $rankContract;
        $this->paygradeModel = $paygradeContract;
        $this->bankModel = $bankContract;
        $this->pensionModel = $pensionContract;
        $this->salaryComponentModel = $salaryComponentContract;
        
        $this->employeeDepartmentModel = $employeeDepartmentContract;
        $this->employeeRankModel = $employeeRankContract;
        $this->employeePaygradeModel = $employeePaygradeContract;
        $this->employeeBankModel = $employeeBankContract;
        $this->employeePensionModel = $employeePensionContract;
        $this->employeeSalaryComponentModel = $employeeSalaryComponentContract;
        $this->employeeBasicSalaryModel = $employeeBasicSalaryContract;
    }
    
    public function ajaxSearch(){
         return Datatables::of($this->employeeModel->findAll())->make(true);
    }

    // Display employees.index with all employees
    public function index() {
        $employees = $this->employeeModel->findAll();
        return view('employees.index', ['employees' => $employees]);
    }

    // Display employees.create
    public function create() {
        $prefixes = $this->prefixModel->findAll();
        $employeeTypes = $this->employeeTypeModel->findAll();
        return view('employees.create', ['prefixes' => $prefixes, 'employeeTypes' => $employeeTypes]);
    }

    /**
     * Validate form.
     * Save Employee to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
            'surname' => 'required',
            'other_names' => 'required',
            'email' => 'required|email|unique:users',
         ]);

         $employee = $this->employeeModel->create($request);
         if ($employee->id) {
             // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create Employee. Try again!');
         }
     }
     
     // Display employees.edit with employee to edit
    public function show(Request $request, $id) {
        $employee = $this->employeeModel->findById($id);
        // 
        $departments = $this->departmentModel->findAll();
        $ranks = $this->rankModel->findAll();
        $paygrades = $this->paygradeModel->findAll();
        $banks = $this->bankModel->findAll();
        $pensions = $this->pensionModel->findAll();
        $salaryComponents = $this->salaryComponentModel->findAll(); //Allowances
        
        // 
        $employeeRank = $this->employeeRankModel->findByEmployeeId($id);
        $employeeDepartment = $this->employeeDepartmentModel->findByEmployeeId($id);
        $employeePaygrade = $this->employeePaygradeModel->findByEmployeeId($id);
        $employeeBank = $this->employeeBankModel->findByEmployeeId($id);
        $employeePension = $this->employeePensionModel->findByEmployeeId($id);
        $employeeSalaryComponents = $this->employeeSalaryComponentModel->findByEmployeeId($id); //Allowances //Array Expected
        $employeeBasicSalary = $this->employeeBasicSalaryModel->findByEmployeeId($id);
        
        return view('employees.show', ['employee'=>$employee, 'departments'=>$departments, 'ranks'=>$ranks, 'paygrades'=>$paygrades,
        'banks'=>$banks, 'pensions'=> $pensions,'salaryComponents'=>$salaryComponents,
        'employeeRank'=>$employeeRank, 'employeeDepartment'=>$employeeDepartment,'employeePaygrade'=>$employeePaygrade,
        'employeeBank'=>$employeeBank,'employeePension'=>$employeePension, 'employeeSalaryComponents'=>$employeeSalaryComponents,
        'employeeBasicSalary'=>$employeeBasicSalary]);
    }

    // Display employees.edit with employee to edit
    public function edit($id) {
        $employee = $this->employeeModel->findById($id);
        
        $prefixes = $this->prefixModel->findAll();
        $employeeTypes = $this->employeeTypeModel->findAll();
        
        return view('employees.edit', ['employee' => $employee, 'prefixes' => $prefixes, 'employeeTypes' => $employeeTypes]);
    }

    /**
     * Validate form.
     * Update Employee in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
           'surname' => 'required',
           'other_names' => 'required',
           'email' => 'required|email|unique:users',
        ]);

        $employee = $this->employeeModel->edit($id, $request);
        if ($employee->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update Employee. Try again!');
        }
    }

    /**
     * Delete Employee from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->employeeModel->remove($id)) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee');
        } else {
            return back()
               ->with('error', 'Could not delete Employee. Try again!');
        }
    }
}
