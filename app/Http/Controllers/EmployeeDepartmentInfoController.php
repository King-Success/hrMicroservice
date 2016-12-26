<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EmployeeDepartmentInfo\EmployeeDepartmentInfoContract;

class EmployeeDepartmentInfoController extends Controller
{
    protected $employeeDepartmentInfoModel;
    public function __construct(EmployeeDepartmentInfoContract $employeeDepartmentInfoContract) {
        $this->employeeDepartmentInfoModel = $employeeDepartmentInfoContract;
    }

    // Display employeedepartmentinfos.index with all employeedepartmentinfos
    public function index() {
        $employeeDepartmentInfos = $this->employeeDepartmentInfoModel->findAll();
        return view('employeedepartmentinfos.index', ['employeeDepartmentInfos' => $employeeDepartmentInfos]);
    }

    // Display employeedepartmentinfos.create
    public function create() {
        return view('employeedepartmentinfos.create');
    }

    /**
     * Validate form.
     * Save EmployeeDepartmentInfo to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);
         
         $employeeDepartmentInfo = $this->employeeDepartmentInfoModel->findByEmployeeId($request->input('employee'));
         if($employeeDepartmentInfo){
             return $this->update($request, $employeeDepartmentInfo->id);
         }

         $employeeDepartmentInfo = $this->employeeDepartmentInfoModel->create($request);
         if ($employeeDepartmentInfo->id) {
             // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=department');
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create EmployeeDepartmentInfo. Try again!');
         }
     }

    // Display employeedepartmentinfos.edit with employeedepartmentinfo to edit
    public function edit($id) {
        $employeeDepartmentInfo = $this->employeeDepartmentInfoModel->findById($id);
        return view('employeedepartmentinfos.edit', ['employeeDepartmentInfo' => $employeeDepartmentInfo]);
    }

    /**
     * Validate form.
     * Update EmployeeDepartmentInfo in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employeeDepartmentInfo = $this->employeeDepartmentInfoModel->edit($id, $request);
        if ($employeeDepartmentInfo->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=department');
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update EmployeeDepartmentInfo. Try again!');
        }
    }

    /**
     * Delete EmployeeDepartmentInfo from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->employeeDepartmentInfoModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete EmployeeDepartmentInfo. Try again!');
        }
    }
}
