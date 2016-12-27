<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\UserEmployeeMap\UserEmployeeMapContract;

class UserEmployeeMapController extends Controller
{
    protected $userEmployeeMapModel;
    public function __construct(UserEmployeeMapContract $userEmployeeMapContract) {
        $this->userEmployeeMapModel = $userEmployeeMapContract;
    }

    // Display useremployeemaps.index with all useremployeemaps
    public function index() {
        $userEmployeeMaps = $this->userEmployeeMapModel->findAll();
        return view('useremployeemaps.index', ['userEmployeeMaps' => $userEmployeeMaps]);
    }

    // Display useremployeemaps.create
    public function create() {
        return view('useremployeemaps.create');
    }

    /**
     * Validate form.
     * Save UserEmployeeMap to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $userEmployeeMap = $this->userEmployeeMapModel->create($request);
         if ($userEmployeeMap->id) {
             // Redirect or do whatever you like
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create UserEmployeeMap. Try again!');
         }
     }

    // Display useremployeemaps.edit with useremployeemap to edit
    public function edit($id) {
        $userEmployeeMap = $this->userEmployeeMapModel->findById($id);
        return view('useremployeemaps.edit', ['userEmployeeMap' => $userEmployeeMap]);
    }

    /**
     * Validate form.
     * Update UserEmployeeMap in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $userEmployeeMap = $this->userEmployeeMapModel->edit($id, $request);
        if ($userEmployeeMap->id) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update UserEmployeeMap. Try again!');
        }
    }

    /**
     * Delete UserEmployeeMap from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->userEmployeeMapModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete UserEmployeeMap. Try again!');
        }
    }
}
