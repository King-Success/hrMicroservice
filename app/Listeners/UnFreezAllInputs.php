<?php

namespace App\Listeners;

use App\Events\PayrollCreationFinished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UnFreezAllInputs
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
     * @param  PayrollCreationFinished  $event
     * @return void
     */
    public function handle(PayrollCreationFinished $event)
    {
        //
    }
}
