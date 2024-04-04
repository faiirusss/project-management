<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutingProjectDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executing_project_definitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_definition_id');
            $table->unsignedBigInteger('scope_id');
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('cost_projectincome_id');
            $table->unsignedBigInteger('cost_caseflow_id');
            $table->unsignedBigInteger('cost_listasumsition_id');
            $table->unsignedBigInteger('quality_id');
            $table->unsignedBigInteger('resource_id');
            $table->unsignedBigInteger('reports_id');
            $table->unsignedBigInteger('presentation_id');
            $table->unsignedBigInteger('projectanouncement_id');
            $table->unsignedBigInteger('reviewmeeting_id');
            $table->unsignedBigInteger('teammorale_id');
            $table->unsignedBigInteger('risk_id');
            $table->unsignedBigInteger('costcontract_id');
            $table->unsignedBigInteger('bebanbahan_id');
            $table->unsignedBigInteger('bebansubkon_id');
            $table->unsignedBigInteger('termpayment_id');
            $table->unsignedBigInteger('guarantee_id');
            $table->unsignedBigInteger('stakeholder_id');
            $table->string('status');
            $table->timestamps();

            $table->foreign('project_definition_id')->references('id')->on('initiating__project_definitions');
            $table->foreign('scope_id')->references('id')->on('executing_scopes');
            $table->foreign('schedule_id')->references('id')->on('executing_schedules');
            $table->foreign('cost_projectincome_id')->references('id')->on('executing_cost_incomes');
            $table->foreign('cost_caseflow_id')->references('id')->on('executing_cost_case_flows');
            $table->foreign('cost_listasumsition_id')->references('id')->on('executing_cost_list_assumsitions');
            $table->foreign('quality_id')->references('id')->on('executing_qualities');
            $table->foreign('resource_id')->references('id')->on('executing_resources');
            $table->foreign('reports_id')->references('id')->on('executing_com_reports');
            $table->foreign('presentation_id')->references('id')->on('executing_com_presentations');
            $table->foreign('projectanouncement_id')->references('id')->on('executing_com_announcements');
            $table->foreign('reviewmeeting_id')->references('id')->on('executing_com_reviews');
            $table->foreign('teammorale_id')->references('id')->on('executing_com_tems');
            $table->foreign('risk_id')->references('id')->on('executing_risks');
            $table->foreign('costcontract_id')->references('id')->on('executing_procurement_contracts');
            $table->foreign('bebanbahan_id')->references('id')->on('executing_procurement_bahans');
            $table->foreign('bebansubkon_id')->references('id')->on('executing_procurement_subkons');
            $table->foreign('termpayment_id')->references('id')->on('executing_procurement_termplans');
            $table->foreign('guarantee_id')->references('id')->on('executing_procurement_guarantees');
            $table->foreign('stakeholder_id')->references('id')->on('executing_stakeholders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('executing_project_definitions');
    }
}
