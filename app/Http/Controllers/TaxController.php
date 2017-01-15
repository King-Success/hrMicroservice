<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Tax\TaxContract;

class TaxController extends Controller
{
    protected $taxModel;
    public function __construct(TaxContract $taxContract) {
        $this->taxModel = $taxContract;
    }

    // Display taxs.index with all taxs
    public function index() {
        $taxs = $this->taxModel->findAll();
        return view('taxs.index', ['taxs' => $taxs]);
    }

    // Display taxs.create
    public function create() {
        return view('taxs.create');
    }

    /**
     * Validate form.
     * Save Tax to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $tax = $this->taxModel->create($request);
         if ($tax->id) {
             // Redirect or do whatever you like
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create Tax. Try again!');
         }
     }

    // Display taxs.edit with tax to edit
    public function edit($id) {
        $tax = $this->taxModel->findById($id);
        return view('taxs.edit', ['tax' => $tax]);
    }

    /**
     * Validate form.
     * Update Tax in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $tax = $this->taxModel->edit($id, $request);
        if ($tax->id) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update Tax. Try again!');
        }
    }

    /**
     * Delete Tax from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->taxModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete Tax. Try again!');
        }
    }
}
