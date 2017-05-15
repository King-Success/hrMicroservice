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
        $object->title = "Pension Deduction";
        $object->component_type = "Deduction"; //or Deduction
        $object->permanent_title = "pension";
        $object->value_type = "Percentage"; // or Percentage (of consolidated salary)
        $object->amount = 8; //globally, but overridable on employee's individual page
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Tax Deduction";
        $object->permanent_title = "tax";
        $object->component_type = "Deduction"; //or Deduction
        $object->value_type = "Percentage"; // or Percentage (of consolidated salary)
        $object->amount = 5; //globally, but overridable on employee's individual page
        $this->objectModel->create($object);
    }
}
