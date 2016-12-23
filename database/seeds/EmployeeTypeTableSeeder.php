<?php

use Illuminate\Database\Seeder;

use App\Repositories\EmployeeType\EmployeeTypeContract as ObjectContract;

class EmployeeTypeTableSeeder extends Seeder
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
        $object->title = "Permanent Staff";
        $object->isPensionable = true;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Part Time Staff";
        $object->isPensionable = false;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Contract Staff";
        $object->isPensionable = false;
        $this->objectModel->create($object);
    }
}
