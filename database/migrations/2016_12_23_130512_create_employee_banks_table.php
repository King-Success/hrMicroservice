<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_banks', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('sort_code')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
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
        Schema::dropIfExists('employee_banks');
    }
}
