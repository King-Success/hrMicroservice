<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Payroll\PayrollContract;

class PayrollController extends Controller
{
    protected $payrollModel;
    public function __construct(PayrollContract $payrollContract) {
        $this->payrollModel = $payrollContract;
    }

    // Display payrolls.index with all payrolls
    public function index() {
        $payrolls = $this->payrollModel->findAll();
        return view('payrolls.index', ['payrolls' => $payrolls]);
    }

    // Display payrolls.create
    public function create() {
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
