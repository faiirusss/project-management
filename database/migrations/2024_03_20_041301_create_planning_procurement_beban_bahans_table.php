<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanningProcurementBebanBahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning_procurement_beban_bahans', function (Blueprint $table) {
            $table->id();
            $table->string('procurement');
            $table->string('vendor');
            $table->string('description_service');
            $table->integer('volume');
            $table->string('units');
            $table->string('total');
            $table->date('start_toOrder');
            $table->date('finish_toOrder');
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
        Schema::dropIfExists('planning_procurement_beban_bahans');
    }
}
