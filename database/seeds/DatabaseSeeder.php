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
        // $this->call(UsersTableSeeder::class);
        $this->call(RankTableSeeder::class);
        $this->call(TitleTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(PaygradeTableSeeder::class);
        $this->call(SalaryComponentTableSeeder::class);
        $this->call(EmployeeTypeTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
    }
}
