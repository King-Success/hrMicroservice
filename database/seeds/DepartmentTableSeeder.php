<?php

use Illuminate\Database\Seeder;

use App\Repositories\Department\DepartmentContract as ObjectContract;

class DepartmentTableSeeder extends Seeder
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
        $object->title = "Engineering";
        $this->objectModel->create($object);
    }
}
