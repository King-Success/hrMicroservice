<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Prefix\PrefixContract;

class PrefixController extends Controller
{
    protected $prefixModel;
    public function __construct(PrefixContract $prefixContract) {
        $this->prefixModel = $prefixContract;
    }

    // Display prefixes.index with all prefixes
    public function index() {
        $prefixes = $this->prefixModel->findAll();
        return view('prefixes.index', ['prefixes' => $prefixes]);
    }

    // Display prefixes.create
    public function create() {
        return view('prefixes.create');
    }

    /**
     * Validate form.
     * Save Prefix to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
            'title' => 'required',
         ]);

         $prefix = $this->prefixModel->create($request);
         if ($prefix->id) {
             // Redirect or do whatever you like
             $request->session()->flash('status', 'Task was successful!');
             return back();
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create Prefix. Try again!');
         }
     }

    // Display prefixes.edit with prefix to edit
    public function edit($id) {
        $prefix = $this->prefixModel->findById($id);
        $prefixes = $this->prefixModel->findAll();
        return view('prefixes.edit', ['prefix' => $prefix, 'prefixes' => $prefixes]);
    }

    /**
     * Validate form.
     * Update Prefix in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
            'title' => 'required',
        ]);

        $prefix = $this->prefixModel->edit($id, $request);
        if ($prefix->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update Prefix. Try again!');
        }
    }

    /**
     * Delete Prefix from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->prefixModel->remove($id)) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/prefix');
        } else {
            return back()
               ->with('error', 'Could not delete Prefix. Try again!');
        }
    }
}