<?php

use Illuminate\Database\Seeder;

use App\Repositories\Title\TitleContract as ObjectContract;

class TitleTableSeeder extends Seeder
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
    }
}
