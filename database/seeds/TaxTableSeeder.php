<?php

use Illuminate\Database\Seeder;

use App\Repositories\Tax\TaxContract as ObjectContract;

class TaxTableSeeder extends Seeder
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
        $object->title = "Tax";
        $object->salary_component = 2;
        $this->objectModel->create($object);
    }
}
