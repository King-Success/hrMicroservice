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
        // $this->digitalPatterns();
        $this->generateCOEData();
    }
    
    private function digitalPatterns(){
        
    }
    
    private function generateCOEData(){
        $object = new StdClass;
        $object->surname = "John";
        $object->other_names = "Doe";
        $object->employee_number = "0001";
        $object->gender = "Female";
        $object->email = "dretnan@logicaladdress.com";
        $object->address = "32 Yakubu Gowon Way, Jos";
        $object->logical_address = "";
        $object->mobile_home = "08161730129";
        $object->mobile_work = "08036504287";
        $object->dob = "2003-05-11";
        $object->prefix = "1";
        $object->employee_type = "1";
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->surname = "Emmanuel";
        $object->other_names = "Akita";
        $object->employee_number = "0002";
        $object->gender = "Female";
        $object->email = "e.atika@logicaladdress.com";
        $object->address = "32 Yakubu Gowon Way, Jos";
        $object->logical_address = "";
        $object->mobile_home = "08161730129";
        $object->mobile_work = "08036504287";
        $object->dob = "2003-05-11";
        $object->prefix = "1";
        $object->employee_type = "1";
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->surname = "Kator";
        $object->other_names = "Bryan";
        $object->employee_number = "0003";
        $object->gender = "Male";
        $object->email = "kb.james@logicaladdress.com";
        $object->address = "32 Yakubu Gowon Way, Jos";
        $object->logical_address = "";
        $object->mobile_home = "08161730129";
        $object->mobile_work = "08036504287";
        $object->dob = "2003-05-11";
        $object->prefix = "1";
        $object->employee_type = "1";
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->surname = "Nani";
        $object->other_names = "Chang";
        $object->employee_number = "0004";
        $object->gender = "Male";
        $object->email = "n.chang@logicaladdress.com";
        $object->address = "32 Yakubu Gowon Way, Jos";
        $object->logical_address = "";
        $object->mobile_home = "08161730129";
        $object->mobile_work = "08036504287";
        $object->dob = "2003-05-11";
        $object->prefix = "1";
        $object->employee_type = "1";
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->surname = "Taiwo";
        $object->other_names = "Taye";
        $object->employee_number = "0005";
        $object->gender = "Male";
        $object->email = "t.taiwo@logicaladdress.com";
        $object->address = "32 Yakubu Gowon Way, Jos";
        $object->logical_address = "";
        $object->mobile_home = "08161730129";
        $object->mobile_work = "08036504287";
        $object->dob = "2003-05-11";
        $object->prefix = "1";
        $object->employee_type = "1";
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->surname = "Osie";
        $object->other_names = "Ugendu";
        $object->employee_number = "0006";
        $object->gender = "Male";
        $object->email = "o.ugendu@nhubnigeria.com";
        $object->address = "32 Yakubu Gowon Way, Jos";
        $object->logical_address = "";
        $object->mobile_home = "08161730129";
        $object->mobile_work = "08036504287";
        $object->dob = "2003-05-11";
        $object->prefix = "1";
        $object->employee_type = "1";
        $this->objectModel->create($object);
    }
}
