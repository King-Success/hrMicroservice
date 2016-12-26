<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EmployeePensionInfo\EmployeePensionInfoContract;

class EmployeePensionInfoController extends Controller
{
    protected $employeePensionInfoModel;
    public function __construct(EmployeePensionInfoContract $employeePensionInfoContract) {
        $this->employeePensionInfoModel = $employeePensionInfoContract;
    }

    // Display employeepensioninfos.index with all employeepensioninfos
    public function index() {
        $employeePensionInfos = $this->employeePensionInfoModel->findAll();
        return view('employeepensioninfos.index', ['employeePensionInfos' => $employeePensionInfos]);
    }

    // Display employeepensioninfos.create
    public function create() {
        return view('employeepensioninfos.create');
    }

    /**
     * Validate form.
     * Save EmployeePensionInfo to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);
         
         $employeePensionInfo = $this->employeePensionInfoModel->findByEmployeeId($request->input('employee'));
         if($employeePensionInfo){
             return $this->update($request, $employeePensionInfo->id);
         }

         $employeePensionInfo = $this->employeePensionInfoModel->create($request);
         if ($employeePensionInfo->id) {
             // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=pension');
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create EmployeePensionInfo. Try again!');
         }
     }

    // Display employeepensioninfos.edit with employeepensioninfo to edit
    public function edit($id) {
        $employeePensionInfo = $this->employeePensionInfoModel->findById($id);
        return view('employeepensioninfos.edit', ['employeePensionInfo' => $employeePensionInfo]);
    }

    /**
     * Validate form.
     * Update EmployeePensionInfo in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employeePensionInfo = $this->employeePensionInfoModel->edit($id, $request);
        if ($employeePensionInfo->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=pension');
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update EmployeePensionInfo. Try again!');
        }
    }

    /**
     * Delete EmployeePensionInfo from database
     * Redirect to prefered route or perform other action
     */
    public function delete($id) {
        if ($this->employeePensionInfoModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete EmployeePensionInfo. Try again!');
        }
    }
}
