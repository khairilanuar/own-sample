<?php

use App\HealthProblem;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupHealthTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_problems', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('form_health_problem', function(Blueprint $table) {
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('health_problem_id');

            $table->primary(['form_id', 'health_problem_id']);

            $table->foreign('form_id')->references('id')->on('forms');
            $table->foreign('health_problem_id')->references('id')->on('health_problems');
        });

        // seeds
        HealthProblem::insert([
            ['name' => 'Health 1'],
            ['name' => 'Health 2'],
            ['name' => 'Health 3'],
            ['name' => 'Health 4'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_health_problem');
        Schema::dropIfExists('health_problems');
    }
}
