<?php

use Illuminate\Database\Seeder;

use App\Repositories\AppConfig\AppConfigContract as ObjectContract;

class AppConfigTableSeeder extends Seeder
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
        $object->company_title = "College of Education Billiry, Gombe";
        $object->rank_is_king = false;
        $this->objectModel->create($object);
    }
}
