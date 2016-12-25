<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EmployeePaygradeInfo\EmployeePaygradeInfoContract;

class EmployeePaygradeInfoController extends Controller
{
    protected $employeePaygradeInfoModel;
    public function __construct(EmployeePaygradeInfoContract $employeePaygradeInfoContract) {
        $this->employeePaygradeInfoModel = $employeePaygradeInfoContract;
    }

    // Display employeepaygradeinfos.index with all employeepaygradeinfos
    public function index() {
        $employeePaygradeInfos = $this->employeePaygradeInfoModel->findAll();
        return view('employeepaygradeinfos.index', ['employeePaygradeInfos' => $employeePaygradeInfos]);
    }

    // Display employeepaygradeinfos.create
    public function create() {
        return view('employeepaygradeinfos.create');
    }

    /**
     * Validate form.
     * Save EmployeePaygradeInfo to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $employeePaygradeInfo = $this->employeePaygradeInfoModel->create($request);
         if ($employeePaygradeInfo->id) {
             // Redirect or do whatever you like
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create EmployeePaygradeInfo. Try again!');
         }
     }

    // Display employeepaygradeinfos.edit with employeepaygradeinfo to edit
    public function edit($id) {
        $employeePaygradeInfo = $this->employeePaygradeInfoModel->findById($id);
        return view('employeepaygradeinfos.edit', ['employeePaygradeInfo' => $employeePaygradeInfo]);
    }

    /**
     * Validate form.
     * Update EmployeePaygradeInfo in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employeePaygradeInfo = $this->employeePaygradeInfoModel->edit($id, $request);
        if ($employeePaygradeInfo->id) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update EmployeePaygradeInfo. Try again!');
        }
    }

    /**
     * Delete EmployeePaygradeInfo from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->employeePaygradeInfoModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete EmployeePaygradeInfo. Try again!');
        }
    }
}
