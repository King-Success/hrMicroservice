<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EmployeeRankInfo\EmployeeRankInfoContract;

class EmployeeRankInfoController extends Controller
{
    protected $employeeRankInfoModel;
    public function __construct(EmployeeRankInfoContract $employeeRankInfoContract) {
        $this->employeeRankInfoModel = $employeeRankInfoContract;
    }

    // Display employeerankinfos.index with all employeerankinfos
    public function index() {
        $employeeRankInfos = $this->employeeRankInfoModel->findAll();
        return view('employeerankinfos.index', ['employeeRankInfos' => $employeeRankInfos]);
    }

    // Display employeerankinfos.create
    public function create() {
        return view('employeerankinfos.create');
    }

    /**
     * Validate form.
     * Save EmployeeRankInfo to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $employeeRankInfo = $this->employeeRankInfoModel->create($request);
         if ($employeeRankInfo->id) {
             // Redirect or do whatever you like
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create EmployeeRankInfo. Try again!');
         }
     }

    // Display employeerankinfos.edit with employeerankinfo to edit
    public function edit($id) {
        $employeeRankInfo = $this->employeeRankInfoModel->findById($id);
        return view('employeerankinfos.edit', ['employeeRankInfo' => $employeeRankInfo]);
    }

    /**
     * Validate form.
     * Update EmployeeRankInfo in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employeeRankInfo = $this->employeeRankInfoModel->edit($id, $request);
        if ($employeeRankInfo->id) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update EmployeeRankInfo. Try again!');
        }
    }

    /**
     * Delete EmployeeRankInfo from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->employeeRankInfoModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete EmployeeRankInfo. Try again!');
        }
    }
}
