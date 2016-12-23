<?php

use Illuminate\Database\Seeder;

use App\Repositories\Bank\BankContract as ObjectContract;

class BankTableSeeder extends Seeder
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
        $object->title = "Ecobank";
        $this->objectModel->create($object);
    }
}
