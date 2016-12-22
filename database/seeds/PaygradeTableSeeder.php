<?php

use Illuminate\Database\Seeder;

use App\Repositories\Paygrade\PaygradeContract as ObjectContract;

class PaygradeTableSeeder extends Seeder
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
        $object->title = "Level 7";
        $object->amount = 7000;
        $this->objectModel->create($object);
    }
}
