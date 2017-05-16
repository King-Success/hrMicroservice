<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Employee\EmployeeContract;
use App\Repositories\Department\DepartmentContract;
use App\Repositories\SalaryComponent\SalaryComponentContract;
use App\Repositories\Bank\BankContract;
use App\Repositories\EmployeeType\EmployeeTypeContract;
use App\Repositories\Rank\RankContract;
use App\Repositories\Pension\PensionContract;

class SearchController extends Controller
{
    private $employeeModel;
    private $bankModel;
    private $departmentModel;
    private $salaryComponentModel;
    private $employeeTypeModel;
    private $rankModel;
    private $pensionModel;
    
    public function __construct(EmployeeContract $employeeContract,
        SalaryComponentContract $salaryComponentContract,
        DepartmentContract $departmentContract,
        BankContract $bankContract,
        RankContract $rankContract,
        PensionContract $pensionContract,
        EmployeeTypeContract $employeeTypeContract){
            
        $this->employeeModel = $employeeContract;
        $this->departmentModel = $departmentContract; 
        $this->salaryComponentModel = $salaryComponentContract;
        $this->bankModel = $bankContract;
        $this->employeeTypeModel = $employeeTypeContract;
        $this->rankModel = $rankContract;
        $this->pensionModel = $pensionContract;
    }
    
    public function index(Request $request){
        
        return view('search.index', [
            'department_present'=> array_key_exists('department', $_GET) && is_numeric($_GET['department']) ? $_GET['department'] : false,
            'salary_component_present'=> array_key_exists('salary_component', $_GET) && is_numeric($_GET['salary_component']) ? $_GET['salary_component'] : false,
            'rank_present'=> array_key_exists('rank', $_GET) && is_numeric($_GET['rank']) ? $_GET['rank'] : false,
            'pension_present'=> array_key_exists('pension', $_GET) && is_numeric($_GET['pension']) ? $_GET['pension'] : false,
            'bank_present'=> array_key_exists('bank', $_GET) && is_numeric($_GET['bank']) ? $_GET['bank'] : false,
            'employee_type_present'=> array_key_exists('employee_type', $_GET) && is_numeric($_GET['employee_type']) ? $_GET['employee_type'] : false,
            
            'employees' => $this->employeeModel->findAll(),
            'salaryComponents' => $this->salaryComponentModel->findAll(),
            'banks' => $this->bankModel->findAll(),
            'ranks' => $this->rankModel->findAll(),
            'pensions' => $this->pensionModel->findAll(),
            'departments' => $this->departmentModel->findAll(),
            'employeeTypes' => $this->employeeTypeModel->findAll(),
            ]);
    }
    
    private function getDeptQuery($id){
        if(is_numeric($id)){
            return 'ON department.id ';
        }
        return '';
    }
}
