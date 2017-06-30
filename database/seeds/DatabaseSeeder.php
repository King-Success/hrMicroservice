<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AppConfigTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RankTableSeeder::class);
        $this->call(PrefixTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(EmployeeLevelTableSeeder::class);
        $this->call(PaygradeTableSeeder::class);
        $this->call(SalaryComponentTableSeeder::class);
        $this->call(EmployeeTypeTableSeeder::class);
        $this->call(PensionTableSeeder::class);
        $this->call(BankTableSeeder::class);
        $this->call(TaxTableSeeder::class);
        if (!App::environment('production')) {
            $this->call(EmployeeTableSeeder::class);
        }
    }
}
