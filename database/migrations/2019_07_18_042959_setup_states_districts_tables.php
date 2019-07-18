<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupStatesDistrictsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('districts', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('state_id');
            $table->string('name');

            $table->foreign('state_id')->references('id')->on('states');
        });

        Schema::create('parliaments', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('state_id')->nullable();
            $table->unsignedInteger('district_id');
            $table->string('name');

            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('district_id')->references('id')->on('districts');
        });

        Schema::create('duns', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('state_id')->nullable();
            $table->unsignedInteger('district_id')->nullable();
            $table->unsignedInteger('parliament_id');
            $table->string('name');

            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('parliament_id')->references('id')->on('parliaments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duns');
        Schema::dropIfExists('parliaments');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('states');
    }
}
