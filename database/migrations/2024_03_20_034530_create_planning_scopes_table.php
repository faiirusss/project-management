<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanningScopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning_scopes', function (Blueprint $table) {
            $table->id();
            $table->string('technical_requirements');
            $table->string('perfomance_requirements');
            $table->string('bussines_requirements');
            $table->string('regulatory_requirements');
            $table->string('user_requirements');
            $table->string('system_requirements');
            $table->unsignedBigInteger('project_definition_id');
            $table->timestamps();


            $table->foreign('project_definition_id')->references('id')->on('initiating__project_definitions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planning_scopes');
    }
}
