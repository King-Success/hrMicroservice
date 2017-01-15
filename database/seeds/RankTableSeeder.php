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
        // $this->digitalPatterns();
        $this->generateCOEData();
        //See 140 & 141 of the Spreadsheet given - It obviously not based on rank alone. but with paygrade
        //Part of the basic salary (based on rank), the rest is added to paygrade to get the real basic_salary added to
        //the basic_salary table
    }
    
    private function digitalPatterns(){
        $object = new StdClass;
        $object->title = "CEO";
        $object->allowance = 0;
        $object->basic_salary = 21073725;
        $this->objectModel->create($object);
    }
    
    private function generateCOEData(){
        //COE Specific
        $object = new StdClass;
        $object->title = "Provost";
        $object->allowance = 0;  //PAA or PNAA
        $object->basic_salary = 11073725;  //Real Annual Paycheck
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "D/Provost";
        $object->allowance = 0;
        $object->basic_salary = 5407503;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Registrar";
        $object->allowance = 0;
        $object->basic_salary = 5407503;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Librarian";
        $object->allowance = 0;
        $object->basic_salary = 5407503;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "D/Works";
        $object->allowance = 0;
        $object->basic_salary = 4844673;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "D/Registrar";
        $object->allowance = 0;
        $object->basic_salary = 4324879;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Registrar";
        $object->allowance = 0;
        $object->basic_salary = 5407503;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Asst. Lect.";
        $object->allowance = 0;
        $object->basic_salary = 1120895;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Lect.  III";
        $object->allowance = 0;
        $object->basic_salary = 1302057;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Lect.  III";
        $object->allowance = 0;
        $object->basic_salary = 1302057;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Librarian.  II";
        $object->allowance = 0;
        $object->basic_salary = 1120895;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Librarian.  II";
        $object->allowance = 0;
        $object->basic_salary = 1120895;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Admin II";
        $object->allowance = 0;
        $object->basic_salary = 1120895;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "H.O.D II";
        $object->allowance = 0;
        $object->basic_salary = 1120895;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "H.E.O II";
        $object->allowance = 0;
        $object->basic_salary = 1120895;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "P.R.O II";
        $object->allowance = 0;
        $object->basic_salary = 1120895;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "L/OFF I";
        $object->allowance = 0;
        $object->basic_salary = 1302057;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "ACCT II";
        $object->allowance = 0;
        $object->basic_salary = 1120895;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "ACCT I";
        $object->allowance = 0;
        $object->basic_salary = 1302057;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Auditor II";
        $object->allowance = 0;
        $object->basic_salary = 1120895;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Eng";
        $object->allowance = 0;
        $object->basic_salary = 1302057;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "H.T.O II";
        $object->allowance = 0;
        $object->basic_salary = 1120895;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Q.S II";
        $object->allowance = 0;
        $object->basic_salary = 1120895;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "H.S.O";
        $object->allowance = 0;
        $object->basic_salary = 1120895;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Chief Clerical Officer (Acct)";
        $object->allowance = 0;
        $object->basic_salary = 709051;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Senior Clerical Officer (Admin)";
        $object->allowance = 0;
        $object->basic_salary = 442816;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Senior Clerical Officer (Acct)";
        $object->allowance = 0;
        $object->basic_salary = 442816;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "AEO Audit";
        $object->allowance = 0;
        $object->basic_salary = 442816;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Asst. DPO";
        $object->allowance = 0;
        $object->basic_salary = 442816;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "SCG AUDIT";
        $object->allowance = 0;
        $object->basic_salary = 307910;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Clerical Officer Grade I";
        $object->allowance = 0;
        $object->basic_salary = 364300;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Clerical Officer Grade II";
        $object->allowance = 0;
        $object->basic_salary = 322242;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Clerical Officer Grade II (Admin)";
        $object->allowance = 0;
        $object->basic_salary = 322242;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Clrl Acct";
        $object->allowance = 0;
        $object->basic_salary = 307910;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Clerical";
        $object->allowance = 0;
        $object->basic_salary = 307910;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Con Sec III";
        $object->allowance = 0;
        $object->basic_salary = 442816;
        $this->objectModel->create($object);
        
        $object = new StdClass;
        $object->title = "Con Sec";
        $object->allowance = 0;
        $object->basic_salary = 364300;
        $this->objectModel->create($object);
    }
}
