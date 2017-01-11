<?php

use Illuminate\Database\Seeder;

use App\Repositories\EmployeeLevel\EmployeeLevelContract as ObjectContract;

class EmployeeLevelTableSeeder extends Seeder
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
        $object->title = "Level 5";
        $this->objectModel->create($object);
    }
}
