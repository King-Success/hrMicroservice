<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePensionInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_pension_infos', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('pin_number')->nullable();
            $table->integer('employee_id')->unsigned();
            $table->integer('pension_id')->unsigned();
            $table->decimal('employer_contribution', 12, 2)->default(0.00);
            
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('pension_id')->references('id')->on('pensions');
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
        Schema::dropIfExists('employee_pension_infos');
    }
}
