<?php

namespace App\Listeners;

use App\Events\PayrollCreationStarted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FreezAllInputs
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PayrollCreationStarted  $event
     * @return void
     */
    public function handle(PayrollCreationStarted $event)
    {
        //
    }
}
