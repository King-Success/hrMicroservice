<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaycheckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('paychecks', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('employee_id')->unsigned();
            $table->string('employee_prefix')->nullable();
            $table->integer('employee_id')->default(0);
            $table->string('employee_surname')->nullable();
            $table->string('employee_othernames')->nullable();
            $table->string('employee_number')->nullable();
            $table->string('employee_type')->nullable();
            // $table->foreign('employee_id')->references('id')->on('employees');
            $table->integer('payroll_id')->unsigned();
            $table->foreign('payroll_id')->references('id')->on('payrolls')->onDelete('cascade');
            $table->decimal('consolidated_salary', 12, 2)->default(0.00);
            $table->decimal('consolidated_allowance', 12, 2)->default(0.00);
            $table->integer('cycle')->default(1); //monthly X 1, 2 months = X 2
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
        //
        Schema::dropIfExists('paychecks');
    }
}
