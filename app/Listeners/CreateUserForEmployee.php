<?php

namespace App\Listeners;

use App\Events\EmployeeCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Repositories\User\UserContract;
use App\Repositories\UserEmployeeMap\UserEmployeeMapContract;

class CreateUserForEmployee
{
    protected $userModel;
    protected $userEmployeeMapModel;
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    
    public function __construct(UserContract $userContract, UserEmployeeMapContract $userEmployeeMapContract)
    {
        //
        $this->userModel = $userContract;
        $this->userEmployeeMapModel = $userEmployeeMapContract;
    }

    /**
     * Handle the event.
     *
     * @param  EmployeeCreated  $event
     * @return void
     */
    public function handle(EmployeeCreated $event)
    {
        //
        $userObject = new \StdClass;
        $userObject->name = $event->employee['surname'] . " " . $event->employee['other_names'];
        $userObject->email = $event->employee['email'];
        $userObject->password =  "password";
        
        $user = $this->userModel->create($userObject);
        
        $userEmployeeMapObject = new \StdClass;
        $userEmployeeMapObject->employee_id = $event->employee['id'];
        $userEmployeeMapObject->user_id = $user->id;
        
        $this->userEmployeeMapModel->create($userEmployeeMapObject);
    }
}
