<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Paygrade\PaygradeContract;
use App\Repositories\EmployeeLevel\EmployeeLevelContract;

class PaygradeController extends Controller
{
    protected $paygradeModel;
    protected $employeeLevelModel;
    
    public function __construct(PaygradeContract $paygradeContract, EmployeeLevelContract $employeeLevelContract) {
        $this->paygradeModel = $paygradeContract;
        $this->employeeLevelModel = $employeeLevelContract;
    }

    // Display paygrades.index with all paygrades
    public function index() {
        $paygrades = $this->paygradeModel->findAll();
        $employeeLevels = $this->employeeLevelModel->findAll();
        return view('paygrades.index', ['paygrades' => $paygrades, 'employeeLevels' => $employeeLevels]);
    }

    // Display paygrades.create
    public function create() {
        return view('paygrades.create');
    }

    /**
     * Validate form.
     * Save Paygrade to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $paygrade = $this->paygradeModel->create($request);
         if ($paygrade->id) {
             // Redirect or do whatever you like
             $request->session()->flash('status', 'Task was successful!');
             return back();
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create Paygrade. Try again!');
         }
     }

    // Display paygrades.edit with paygrade to edit
    public function edit($id) {
        $paygrade = $this->paygradeModel->findById($id);
        $paygrades = $this->paygradeModel->findAll();
        $employeeLevels = $this->employeeLevelModel->findAll();
        return view('paygrades.edit', ['paygrade' => $paygrade, 'paygrades' => $paygrades, 'employeeLevels' => $employeeLevels]);
    }

    /**
     * Validate form.
     * Update Paygrade in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $paygrade = $this->paygradeModel->edit($id, $request);
        if ($paygrade->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update Paygrade. Try again!');
        }
    }

    /**
     * Delete Paygrade from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->paygradeModel->remove($id)) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/paygrade');
        } else {
            return back()
               ->with('error', 'Could not delete Paygrade. Try again!');
        }
    }
}
