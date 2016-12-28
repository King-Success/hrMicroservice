<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\AppConfig\AppConfigContract;
use App\Repositories\User\UserContract;
use Illuminate\Support\Facades\Auth;

class AppSettingController extends Controller
{
    protected $appConfigModel;
    protected $userModel;
    
    public function __construct(AppConfigContract $appConfigContract, UserContract $userContract) {
        $this->appConfigModel = $appConfigContract;
        $this->userModel = $userContract;
    }

    // Display appsettings.index with all appsettings
    public function index() {
        $appSetting = $this->appConfigModel->findById(1);
        return view('appsettings.index', ['appSetting' => $appSetting]);
    }
    
    /**
     * Validate form.
     * Update AppSetting in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);
        
        if($request->input('tab') == 'company_profile'){
            $appSetting = $this->appConfigModel->updateCompanyProfile($id, $request);
        }else if($request->input('tab') == 'cargodrive'){
            $appSetting = $this->appConfigModel->updateCargoProfile($id, $request);
        }else if($request->input('tab') == 'security'){
            if (Auth::check()) {
                $userId = Auth::user()->id;
            }else{
                //Safe to forget to comment here since we are gonna use Auth Middleware later
               $userId = $this->userModel->findById(1)->id; //for testing purposes.
            }
            $appSetting = $this->userModel->updatePassword($userId, $request);
        }else{
            $appSetting = false;
        }
        
        if ($appSetting && $appSetting->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/appsetting');
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update Settings. Try again!');
        }
    }
}