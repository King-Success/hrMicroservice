<?php

use Illuminate\Database\Seeder;

use App\Repositories\Employee\EmployeeContract as ObjectContract;

class EmployeeTableSeeder extends Seeder
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
        $object->name = "John Doe";
        $object->dob = "2003-05-11";
        $this->objectModel->create($object);
    }
}
