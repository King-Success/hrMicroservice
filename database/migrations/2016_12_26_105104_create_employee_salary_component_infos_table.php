<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeSalaryComponentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salary_component_infos', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('employee_id')->unsigned();
            $table->integer('salary_component_id')->unsigned();
            
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('salary_component_id')->references('id')->on('salary_components');
            
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_salary_component_infos');
    }
}
