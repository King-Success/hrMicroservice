<?php

namespace App\Listeners;

use App\Events\EmployeeCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Repositories\User\UserContract;
use App\Repositories\UserEmployeeMap\UserEmployeeMapContract;

class CreateUserForEmployee
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    protected $userModel;
    protected $userEmployeeMapModel;
    
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
    }
}
