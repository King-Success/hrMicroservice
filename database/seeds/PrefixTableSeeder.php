<?php

use Illuminate\Database\Seeder;

use App\Repositories\Prefix\PrefixContract as ObjectContract;

class PrefixTableSeeder extends Seeder
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
        $object->title = "Mr.";
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Mrs.";
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Miss.";
        $this->objectModel->create($object);
    }
}
