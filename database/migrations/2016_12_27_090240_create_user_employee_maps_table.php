<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEmployeeMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_employee_maps', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('employee_id')->unsigned();
            $table->integer('user_id')->unsigned();
            
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('user_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('user_employee_maps');
    }
}
