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
        $object->peculiar_allowance = 0; //PAA or PNAA
        $object->consolidated_salary = 50000; //Real Annual Paycheck
        $this->objectModel->create($object);
    }
}
