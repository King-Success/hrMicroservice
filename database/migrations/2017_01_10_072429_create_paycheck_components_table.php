<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaycheckComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('paycheck_components', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('payroll_id')->unsigned();
            $table->integer('component_id');
            $table->string('component_title')->nullable();
            $table->string('component_permanent_title')->nullable();
            $table->decimal('amount', 12, 2)->default(0.00);
            $table->enum('component_type', ['Earning', 'Deduction']);
            $table->integer('cycle')->default(1); //monthly X 1, 2 months = X 2
            $table->timestamps();
            
            $table->string('rank')->nullable();
            $table->string('level')->nullable();
            $table->string('step')->nullable();
            
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
        Schema::dropIfExists('paycheck_components');
    }
}
