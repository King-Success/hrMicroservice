<?php

namespace App\Listeners;

use App\Events\EmployeeCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Repositories\Tax\TaxContract;
use App\Repositories\EmployeeTax\EmployeeTaxContract;

class CreateTaxEntryForEmployee
{
    protected $taxModel;
    protected $employeeTaxModel;
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(TaxContract $taxContract, EmployeeTaxContract $employeeTaxContract)
    {
        //
        $this->taxModel = $taxContract;
        $this->employeeTaxModel = $employeeTaxContract;
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
        $employeeTaxObject = new \StdClass;
        $employeeTaxObject->employee = $event->employee['id'];
        $employeeTaxObject->tax = $this->taxModel->findAll()->last()->id; //guaranteed to succeed!
        $this->employeeTaxModel->create($employeeTaxObject);
    }
}
