<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanningProjectDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning__project_definitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_definition_id');
            $table->unsignedBigInteger('scope_id');
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('cost_projectincome_id')->nullable();
            $table->unsignedBigInteger('cost_caseflow_id')->nullable();
            $table->unsignedBigInteger('cost_listasumsition_id')->nullable();
            $table->unsignedBigInteger('quality_id')->nullable();
            $table->unsignedBigInteger('resource_id')->nullable();
            $table->unsignedBigInteger('reports_id')->nullable();
            $table->unsignedBigInteger('presentation_id')->nullable();
            $table->unsignedBigInteger('projectanouncement_id')->nullable();
            $table->unsignedBigInteger('reviewmeeting_id')->nullable();
            $table->unsignedBigInteger('teammorale_id')->nullable();
            $table->unsignedBigInteger('risk_id')->nullable();
            $table->unsignedBigInteger('costcontract_id')->nullable();
            $table->unsignedBigInteger('bebanbahan_id')->nullable();
            $table->unsignedBigInteger('bebansubkon_id')->nullable();
            $table->unsignedBigInteger('termpayment_id')->nullable();
            $table->unsignedBigInteger('guarantee_id')->nullable();
            $table->unsignedBigInteger('stakeholder_id')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('project_definition_id')->references('id')->on('initiating__project_definitions');
            $table->foreign('scope_id')->references('id')->on('planning_scopes');
            $table->foreign('schedule_id')->references('id')->on('planning_schedules');
            $table->foreign('cost_projectincome_id')->references('id')->on('planning_cost_project_income_statements');
            $table->foreign('cost_caseflow_id')->references('id')->on('planning_cost_case_flows');
            $table->foreign('cost_listasumsition_id')->references('id')->on('planning_cost_list_assumsitions');
            $table->foreign('quality_id')->references('id')->on('planning_qualities');
            $table->foreign('resource_id')->references('id')->on('planning_resources');
            $table->foreign('reports_id')->references('id')->on('planning_communication_reports');
            $table->foreign('presentation_id')->references('id')->on('planning_communication_presentations');
            $table->foreign('projectanouncement_id')->references('id')->on('planning_communication_project_announcements');
            $table->foreign('reviewmeeting_id')->references('id')->on('planning_communication_review_and_meetings');
            $table->foreign('teammorale_id')->references('id')->on('planning_communication_team_morales');
            $table->foreign('risk_id')->references('id')->on('planning_risks');
            $table->foreign('costcontract_id')->references('id')->on('planning_procurement_cost_contract_to_values');
            $table->foreign('bebanbahan_id')->references('id')->on('planning_procurement_beban_bahans');
            $table->foreign('bebansubkon_id')->references('id')->on('planning_procurement_beban_subkons');
            $table->foreign('termpayment_id')->references('id')->on('planning_procurement_term_of_payment_plans');
            $table->foreign('guarantee_id')->references('id')->on('planning_procurement_guarantees');
            $table->foreign('stakeholder_id')->references('id')->on('planning_stakeholders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planning__project_definitions');
    }
}
