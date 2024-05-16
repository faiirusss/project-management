<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutingCostCaseFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executing_cost_case_flows', function (Blueprint $table) {
            $table->id();
            $table->string('nilai_rupiah');
            $table->date('waktu');
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
        Schema::dropIfExists('executing_cost_case_flows');
    }
}
