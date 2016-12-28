<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\AppConfig\AppConfigContract;

class AppConfigController extends Controller
{
    protected $appConfigModel;
    public function __construct(AppConfigContract $appConfigContract) {
        $this->appConfigModel = $appConfigContract;
    }

    // Display appconfigs.index with all appconfigs
    public function index() {
        $appConfigs = $this->appConfigModel->findAll();
        return view('appconfigs.index', ['appConfigs' => $appConfigs]);
    }

    // Display appconfigs.create
    public function create() {
        return view('appconfigs.create');
    }

    /**
     * Validate form.
     * Save AppConfig to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $appConfig = $this->appConfigModel->create($request);
         if ($appConfig->id) {
             // Redirect or do whatever you like
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create AppConfig. Try again!');
         }
     }

    // Display appconfigs.edit with appconfig to edit
    public function edit($id) {
        $appConfig = $this->appConfigModel->findById($id);
        return view('appconfigs.edit', ['appConfig' => $appConfig]);
    }

    /**
     * Validate form.
     * Update AppConfig in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $appConfig = $this->appConfigModel->edit($id, $request);
        if ($appConfig->id) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update AppConfig. Try again!');
        }
    }

    /**
     * Delete AppConfig from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->appConfigModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete AppConfig. Try again!');
        }
    }
}
