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
        $object->surname = "John";
        $object->other_names = "Doe";
        $object->employee_number = "099";
        $object->gender = "Female";
        $object->email = "dretnan@logicaladdress.com";
        $object->address = "32 Yakubu Gowon Way, Jos";
        $object->mobile_home = "08161730129";
        $object->mobile_work = "08036504287";
        $object->dob = "2003-05-11";
        $object->prefix = "1";
        $object->employee_type = "1";
        $this->objectModel->create($object);
    }
}
