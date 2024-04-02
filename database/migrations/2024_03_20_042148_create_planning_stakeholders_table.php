<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanningStakeholdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning_stakeholders', function (Blueprint $table) {
            $table->id();
            $table->string('stakeholder');
            $table->string('role');
            $table->string('power');
            $table->string('interest');
            $table->string('initiation');
            $table->string('planning');
            $table->string('executing');
            $table->string('control');
            $table->string('close');
            $table->string('engagement_level');
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
        Schema::dropIfExists('planning_stakeholders');
    }
}
