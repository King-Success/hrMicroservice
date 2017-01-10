<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaycheckSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('paycheck_summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('payroll_id')->unsigned();
            $table->string('rank')->nullable();
            $table->string('level')->nullable();
            $table->string('step')->nullable();
            $table->decimal('consolidated_salary', 12, 2)->default(0.00);
            $table->decimal('consolidated_allowance', 12, 2)->default(0.00);
            $table->decimal('gross_total', 12, 2)->default(0.00);
            $table->decimal('total_deductions', 12, 2)->default(0.00);
            $table->decimal('total_earnings', 12, 2)->default(0.00);
            $table->decimal('net_pay', 12, 2)->default(0.00);
            $table->integer('cycle')->default(1); //monthly X 1, 2 months = X 2
            $table->timestamps();
            
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('payroll_id')->references('id')->on('payrolls');
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
        Schema::dropIfExists('paycheck_summaries');
    }
}
