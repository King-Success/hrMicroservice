<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Employee\EmployeeContract;
use App\Repositories\Prefix\PrefixContract;

// 
use App\Repositories\Department\DepartmentContract;
use App\Repositories\Rank\RankContract;
use App\Repositories\Paygrade\PaygradeContract;
use App\Repositories\Bank\BankContract;
use App\Repositories\Pension\PensionContract;
use App\Repositories\SalaryComponent\SalaryComponentContract;

// 
use App\Repositories\EmployeeDepartmentInfo\EmployeeDepartmentInfoContract;
use App\Repositories\EmployeeRankInfo\EmployeeRankInfoContract;
use App\Repositories\EmployeePaygradeInfo\EmployeePaygradeInfoContract;
use App\Repositories\EmployeeBankInfo\EmployeeBankInfoContract;
use App\Repositories\EmployeePensionInfo\EmployeePensionInfoContract;
use App\Repositories\EmployeeSalaryComponentInfo\EmployeeSalaryComponentInfoContract;

// Third Party
use Yajra\Datatables\Datatables;

class EmployeeController extends Controller
{
    protected $employeeModel;
    protected $prefixModel;
    
    // 
    protected $departmentModel;
    protected $rankModel;
    protected $paygradeModel;
    protected $bankModel;
    protected $pensionModel;
    protected $salaryComponentModel;
    
    // 
    protected $employeeDepartmentInfoModel;
    protected $employeeRankInfoModel;
    protected $employeePaygradeInfoModel;
    protected $employeeBankInfoModel;
    protected $employeePensionInfoModel;
    protected $employeeSalaryComponentInfoModel;
    
    public function __construct(EmployeeContract $employeeContract, 
        PrefixContract $prefixContract,
        DepartmentContract $departmentContract,
        RankContract $rankContract,
        PaygradeContract $paygradeContract,
        BankContract $bankContract,
        PensionContract $pensionContract,
        SalaryComponentContract $salaryComponentContract,
        
        EmployeeDepartmentInfoContract $employeeDepartmentInfoContract,
        EmployeeRankInfoContract $employeeRankInfoContract,
        EmployeePaygradeInfoContract $employeePaygradeInfoContract,
        EmployeeBankInfoContract $employeeBankInfoContract,
        EmployeePensionInfoContract $employeePensionInfoContract,
        EmployeeSalaryComponentInfoContract $employeeSalaryComponentInfoContract
        ) {
        $this->employeeModel = $employeeContract;
        $this->prefixModel = $prefixContract;
        $this->departmentModel = $departmentContract;
        $this->rankModel = $rankContract;
        $this->paygradeModel = $paygradeContract;
        $this->bankModel = $bankContract;
        $this->pensionModel = $pensionContract;
        $this->salaryComponentModel = $salaryComponentContract;
        
        $this->employeeDepartmentInfoModel = $employeeDepartmentInfoContract;
        $this->employeeRankInfoModel = $employeeRankInfoContract;
        $this->employeePaygradeInfoModel = $employeePaygradeInfoContract;
        $this->employeeBankInfoModel = $employeeBankInfoContract;
        $this->employeePensionInfoModel = $employeePensionInfoContract;
        $this->employeeSalaryComponentInfoModel = $employeeSalaryComponentInfoContract;
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
        return view('employees.create', ['prefixes' => $prefixes]);
    }

    /**
     * Validate form.
     * Save Employee to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
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
        $data = array();
        $data['employee'] = $this->employeeModel->findById($id);
        // 
        $data['departments'] = $this->departmentModel->findAll();
        $data['ranks'] = $this->rankModel->findAll();
        $data['paygrades'] = $this->paygradeModel->findAll();
        $data['banks'] = $this->bankModel->findAll();
        $data['pensions'] = $this->pensionModel->findAll();
        $data['salaryComponents'] = $this->salaryComponentModel->findAll(); //Allowances
        
        // 
        $data['employeeRank'] = $this->employeeRankInfoModel->findById($id);
        $data['employeeDepartment'] = $this->employeeDepartmentInfoModel->findById($id);
        $data['employeePaygrade'] = $this->employeePaygradeInfoModel->findById($id);
        $data['employeeBank'] = $this->employeeBankInfoModel->findById($id);
        $data['pensions'] = $this->employeePensionInfoModel->findById($id);
        $data['employeeSalaryComponents'] = $this->employeeSalaryComponentInfoModel->findById($id); //Allowances //Array Expected
        
        return view('employees.show', $data);
    }

    // Display employees.edit with employee to edit
    public function edit($id) {
        $employee = $this->employeeModel->findById($id);
        return view('employees.edit', ['employee' => $employee]);
    }

    /**
     * Validate form.
     * Update Employee in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
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
    public function delete($id) {
        if ($this->employeeModel->remove($id)) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->with('error', 'Could not delete Employee. Try again!');
        }
    }
}
