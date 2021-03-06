<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable(); //call it "November, 2016 Salary" for all i care
            $table->text('description')->nullable(); //call it memo all you want
            $table->integer('state')->default(0); //see App/DigitalPatterns/PayrollState.php
            $table->integer('active')->default(true);
            $table->integer('cycle')->default(1); //monthly
            $table->date('paid_at')->nullable();
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
        Schema::dropIfExists('payrolls');
    }
}
