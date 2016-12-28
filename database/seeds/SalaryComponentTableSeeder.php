<?php

use Illuminate\Database\Seeder;

use App\Repositories\SalaryComponent\SalaryComponentContract as ObjectContract;

class SalaryComponentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $objectModel;
    
    public function __construct(ObjectContract $objectContract) {
        $this->objectModel = $objectContract;
    }
    
    public function run()
    {
        $object = new StdClass;
        $object->title = "Car Allowance";
        $object->component_type = "Earning"; //or Deduction
        $object->value_type = "Amount"; // or Percentage (of consolidated salary)
        $object->amount = 500; //globally, but overridable on employee's individual page
        $this->objectModel->create($object);
    }
}
