<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_title')->default('DigitalPatterns Ltd');
            $table->string('company_logo')->nullable();
            $table->boolean('rank_is_king')->default(false);
            $table->boolean('freeze_mode_activated')->default(false);
            $table->string('cargodriveClientId')->nullable();
            $table->string('cargodriveSecret')->nullable();
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
        Schema::dropIfExists('app_configs');
    }
}
