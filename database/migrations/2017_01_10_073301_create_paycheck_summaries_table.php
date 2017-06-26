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
            // $table->integer('employee_id')->unsigned();
            $table->string('employee_prefix')->nullable();
            $table->integer('employee_id')->default(0);
            $table->string('employee_surname')->nullable();
            $table->string('employee_othernames')->nullable();
            $table->string('employee_number')->nullable();
            $table->string('employee_type')->nullable();
            $table->integer('payroll_id')->unsigned();
            $table->string('rank')->nullable();
            $table->string('level')->nullable();
            $table->string('step')->nullable();
            $table->decimal('basic_salary', 12, 2)->default(0.00);
            $table->decimal('allowance', 12, 2)->default(0.00);
            $table->decimal('paygrade_amount', 12, 2)->default(0.00);
            $table->decimal('paygrade_allowance', 12, 2)->default(0.00);
            $table->decimal('consolidated_salary', 12, 2)->default(0.00);
            $table->decimal('consolidated_allowance', 12, 2)->default(0.00);
            $table->decimal('gross_total', 12, 2)->default(0.00);
            $table->decimal('total_deductions', 12, 2)->default(0.00);
            $table->decimal('total_earnings', 12, 2)->default(0.00);
            $table->decimal('net_pay', 12, 2)->default(0.00);
            $table->integer('cycle')->default(1); //monthly X 1, 2 months = X 2
            $table->timestamps();
            
            $table->decimal('pension_amount', 12, 2)->default(0.00);
            $table->decimal('pension_employee_contribution_amount', 12, 2)->default(0.00);
            $table->string('pension_pin_number')->default('');
            $table->string('pension_company')->default('');
            $table->boolean('pensionable')->default(false);
            $table->integer('pension_id')->default(0);
            
            $table->decimal('tax_amount', 12, 2)->default(0.00);
            $table->boolean('taxable')->default(false);
            $table->integer('tax_id')->default(0);
            
            $table->string('bank')->nullable();
            $table->boolean('bankable')->default(false);
            $table->integer('bank_id')->default(0);
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_sort_code')->nullable();
            
            // $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('payroll_id')->references('id')->on('payrolls')->onDelete('cascade');
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
