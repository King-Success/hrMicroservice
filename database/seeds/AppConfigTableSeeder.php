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
        $object->rank_is_king = true;
        $object->cargodriveClientId = "d6386c0651d6380745846efe300b9869";
        $object->cargodriveSecret = "3f9573e88f65787d86d8a685aeb4bd13";
        $this->objectModel->create($object);
    }
}