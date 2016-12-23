<?php

use Illuminate\Database\Seeder;

use App\Repositories\Pension\PensionContract as ObjectContract;

class PensionTableSeeder extends Seeder
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
        $object->title = "Trust Fund";
        $this->objectModel->create($object);
    }
}
