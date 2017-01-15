<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Only one entry would suffice for this table
        Schema::create('taxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('Tax');
            $table->integer('salary_component_id')->unsigned();
            
            $table->foreign('salary_component_id')->references('id')->on('salary_components');
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
        Schema::dropIfExists('taxes');
    }
}
