<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeBankInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_bank_infos', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('sort_code')->nullable();
            $table->integer('employee_id')->unsigned();
            $table->integer('bank_id')->unsigned();
            
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('bank_id')->references('id')->on('banks');
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
        Schema::dropIfExists('employee_bank_infos');
    }
}
