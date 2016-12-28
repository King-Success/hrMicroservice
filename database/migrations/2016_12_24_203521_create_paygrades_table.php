<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaygradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paygrades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); //step
            $table->integer('employee_level_id')->unsigned();
            $table->decimal('amount', 12, 2)->default(0.00);
            $table->timestamps();
            
            $table->foreign('employee_level_id')->references('id')->on('employee_levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paygrades');
    }
}
