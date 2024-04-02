<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanningProcurementGuaranteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning_procurement_guarantees', function (Blueprint $table) {
            $table->id();
            $table->string('deskripsi');
            $table->string('persen');
            $table->string('radio');
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
        Schema::dropIfExists('planning_procurement_guarantees');
    }
}
