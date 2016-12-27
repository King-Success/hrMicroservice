<?php

use Illuminate\Database\Seeder;

use App\Repositories\User\UserContract as ObjectContract;

class UserTableSeeder extends Seeder
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
        $object->name = "Administrator";
        $object->email = "admin@cargospace.ng";
        $object->password = 'faker00tX';
        $this->objectModel->create($object);
    }
}
