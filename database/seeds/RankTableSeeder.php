<?php

use Illuminate\Database\Seeder;

use App\Repositories\Rank\RankContract as ObjectContract;

class RankTableSeeder extends Seeder
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
        $object->title = "Provost";
        $this->objectModel->create($object);
    }
}
