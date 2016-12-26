<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EmployeeSalaryComponentInfo\EmployeeSalaryComponentInfoContract;

class EmployeeSalaryComponentInfoController extends Controller
{
    protected $employeeSalaryComponentInfoModel;
    public function __construct(EmployeeSalaryComponentInfoContract $employeeSalaryComponentInfoContract) {
        $this->employeeSalaryComponentInfoModel = $employeeSalaryComponentInfoContract;
    }

    // Display employeesalarycomponentinfos.index with all employeesalarycomponentinfos
    public function index() {
        $employeeSalaryComponentInfos = $this->employeeSalaryComponentInfoModel->findAll();
        return view('employeesalarycomponentinfos.index', ['employeeSalaryComponentInfos' => $employeeSalaryComponentInfos]);
    }

    // Display employeesalarycomponentinfos.create
    public function create() {
        return view('employeesalarycomponentinfos.create');
    }

    /**
     * Validate form.
     * Save EmployeeSalaryComponentInfo to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $employeeSalaryComponentInfo = $this->employeeSalaryComponentInfoModel->create($request);
         if ($employeeSalaryComponentInfo->id) {
             // Redirect or do whatever you like
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create EmployeeSalaryComponentInfo. Try again!');
         }
     }

    // Display employeesalarycomponentinfos.edit with employeesalarycomponentinfo to edit
    public function edit($id) {
        $employeeSalaryComponentInfo = $this->employeeSalaryComponentInfoModel->findById($id);
        return view('employeesalarycomponentinfos.edit', ['employeeSalaryComponentInfo' => $employeeSalaryComponentInfo]);
    }

    /**
     * Validate form.
     * Update EmployeeSalaryComponentInfo in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employeeSalaryComponentInfo = $this->employeeSalaryComponentInfoModel->edit($id, $request);
        if ($employeeSalaryComponentInfo->id) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update EmployeeSalaryComponentInfo. Try again!');
        }
    }

    /**
     * Delete EmployeeSalaryComponentInfo from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->employeeSalaryComponentInfoModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete EmployeeSalaryComponentInfo. Try again!');
        }
    }
}
