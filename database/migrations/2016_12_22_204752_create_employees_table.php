<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname');
            $table->string('other_names');
            $table->string('gender')->nullable();
            $table->string('employee_number')->nullable();
            $table->string('dob')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_home')->nullable();
            $table->string('mobile_work')->nullable();
            $table->string('address')->nullable();
            $table->integer('prefix_id')->unsigned();
            $table->string('profile_is_complete')->default(0);
            $table->integer('setup_stage')->default(1);
            $table->timestamps();
            
            $table->foreign('prefix_id')->references('id')->on('prefixes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}