<?php

namespace App\Http\Controllers;

use App\Models\executing_project_definitions;
use App\Models\Executing_ProjectDefinition;
use App\Models\executing_scope;
use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_com_announcements;
use App\Models\planning_com_presentations;
use App\Models\planning_com_reports;
use App\Models\planning_com_reviews;
use App\Models\planning_com_tems;
use App\Models\planning_cost_caseFlow;
use App\Models\planning_cost_incomes;
use App\Models\planning_cost_listAssumsition;
use App\Models\planning_procurement_bebanBahan;
use App\Models\planning_procurement_bebanSubkon;
use App\Models\planning_procurement_contracts;
use App\Models\planning_procurement_guarantee;
use App\Models\planning_procurement_termplans;
use App\Models\planning_project_definitions;
use App\Models\planning_quality;
use App\Models\planning_resources;
use App\Models\planning_risk;
use App\Models\planning_schedule;
use App\Models\planning_scope;
use App\Models\planning_stakeholder;
use Illuminate\Http\Request;

class PlanningProjectDefinitionController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            // $projectDefinition = Planning_ProjectDefinition::all();
            $planningFinal = planning_project_definitions::all();
            return view('planning.final.index', ['planningFinal' => $planningFinal]);
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $planningFinal = planning_project_definitions::all();
        $projectDefinition = Initiating_ProjectDefinition::all();
        $scope = planning_scope::all();
        $schedule = planning_schedule::all();
        $projectincome = planning_cost_incomes::all();
        $caseflow = planning_cost_caseFlow::all();
        $listasumsition = planning_cost_listAssumsition::all();
        $quality = planning_quality::all();
        $resource = planning_resources::all();
        $report = planning_com_reports::all();
        $presentations = planning_com_presentations::all();
        $projectannouncement = planning_com_announcements::all();
        $reviews = planning_com_reviews::all();
        $teammorale = planning_com_tems::all();
        $risk = planning_risk::all();
        $costcontract = planning_procurement_contracts::all();
        $bebanbahan = planning_procurement_bebanBahan::all();
        $bebansubkon = planning_procurement_bebanSubkon::all();
        $termpayment = planning_procurement_termplans::all();
        $guarantee = planning_procurement_guarantee::all();
        $stakeholder = planning_stakeholder::all();


        return view('planning.final.create', compact(
            'planningFinal',
            'projectDefinition',
            'scope',
            'schedule',
            'projectincome',
            'caseflow',
            'listasumsition',
            'quality',
            'resource',
            'report',
            'presentations',
            'projectannouncement',
            'reviews',
            'teammorale',
            'risk',
            'costcontract',
            'bebanbahan',
            'bebansubkon',
            'termpayment',
            'guarantee',
            'stakeholder',
        ));
    }

    public function store(Request $request)
    {
        // Lakukan query untuk mendapatkan scope berdasarkan project_definition_id
        $scope = planning_scope::where('project_definition_id', $request->name_project)->first();
        $schedule_id = planning_schedule::where('project_definition_id', $request->name_project)->first();
        $cost_projectincome_id = planning_cost_incomes::where('project_definition_id', $request->name_project)->first();
        $cost_caseflow_id = planning_cost_caseFlow::where('project_definition_id', $request->name_project)->first();
        $cost_listasumsition_id = planning_cost_listAssumsition::where('project_definition_id', $request->name_project)->first();
        $quality_id = planning_quality::where('project_definition_id', $request->name_project)->first();
        $resource_id = planning_resources::where('project_definition_id', $request->name_project)->first();
        $reports_id = planning_com_reports::where('project_definition_id', $request->name_project)->first();
        $presentation_id = planning_com_presentations::where('project_definition_id', $request->name_project)->first();
        $projectanouncement_id = planning_com_announcements::where('project_definition_id', $request->name_project)->first();
        $reviewmeeting_id = planning_com_reviews::where('project_definition_id', $request->name_project)->first();
        $teammorale_id = planning_com_tems::where('project_definition_id', $request->name_project)->first();
        $risk_id = planning_risk::where('project_definition_id', $request->name_project)->first();
        $costcontract_id = planning_procurement_contracts::where('project_definition_id', $request->name_project)->first();
        $bebanbahan_id = planning_procurement_bebanBahan::where('project_definition_id', $request->name_project)->first();
        $bebansubkon_id = planning_procurement_bebanSubkon::where('project_definition_id', $request->name_project)->first();
        $termpayment_id = planning_procurement_termplans::where('project_definition_id', $request->name_project)->first();
        $guarantee_id = planning_procurement_guarantee::where('project_definition_id', $request->name_project)->first();
        $stakeholder_id = planning_stakeholder::where('project_definition_id', $request->name_project)->first();
        // Buat instance baru dari model dan atur nilai attribut

        $planningProject = new planning_project_definitions();
        $planningProject->project_definition_id = $request->name_project;
        $planningProject->scope_id = $scope->id;
        $planningProject->schedule_id = $schedule_id->id;
        $planningProject->cost_projectincome_id = $cost_projectincome_id->id;
        $planningProject->cost_caseflow_id = $cost_caseflow_id->id;
        $planningProject->cost_listasumsition_id = $cost_listasumsition_id->id;
        $planningProject->quality_id = $quality_id->id;
        $planningProject->resource_id = $resource_id->id;
        $planningProject->reports_id = $reports_id->id;
        $planningProject->presentation_id = $presentation_id->id;
        $planningProject->projectanouncement_id = $projectanouncement_id->id;
        $planningProject->reviewmeeting_id = $reviewmeeting_id->id;
        $planningProject->teammorale_id = $teammorale_id->id;
        $planningProject->risk_id = $risk_id->id;
        $planningProject->costcontract_id = $costcontract_id->id;
        $planningProject->bebanbahan_id = $bebanbahan_id->id;
        $planningProject->bebansubkon_id = $bebansubkon_id->id;
        $planningProject->termpayment_id = $termpayment_id->id;
        $planningProject->guarantee_id = $guarantee_id->id;
        $planningProject->stakeholder_id = $stakeholder_id->id;

        // Atur atribut status
        $planningProject->status = 'open';

        // Atur atribut lainnya menggunakan data dari request
        $planningProject->fill($request->except(['_token']));

        // Simpan instance yang baru dibuat ke dalam database
        $planningProject->save();

        return redirect('/planning')->with('success', 'Risk has been added successfully.');
    }



    public function destroy($id)
    {
        $scope = planning_project_definitions::find($id);
        $scope->delete();
        return redirect('/planning');
    }

    public function show($id)
    {
        $planningFinal = planning_project_definitions::find($id);
        $planFinal = planning_project_definitions::all();
        $projectDefinition = Initiating_ProjectDefinition::all();
        $scope = planning_scope::all();
        $schedule = planning_schedule::all();
        $projectincome = planning_cost_incomes::all();
        $caseflow = planning_cost_caseFlow::all();
        $listasumsition = planning_cost_listAssumsition::all();
        $quality = planning_quality::all();
        $resource = planning_resources::all();
        $report = planning_com_reports::all();
        $presentations = planning_com_presentations::all();
        $projectannouncement = planning_com_announcements::all();
        $reviews = planning_com_reviews::all();
        $teammorale = planning_com_tems::all();
        $risk = planning_risk::all();
        $costcontract = planning_procurement_contracts::all();
        $bebanbahan = planning_procurement_bebanBahan::all();
        $bebansubkon = planning_procurement_bebanSubkon::all();
        $termpayment = planning_procurement_termplans::all();
        $guarantee = planning_procurement_guarantee::all();
        $stakeholder = planning_stakeholder::all();

        return view('planning.final.edit', compact(
            'planningFinal',
            'projectDefinition',
            'scope',
            'schedule',
            'planFinal',
            'projectincome',
            'caseflow',
            'listasumsition',
            'quality',
            'resource',
            'report',
            'presentations',
            'projectannouncement',
            'reviews',
            'teammorale',
            'risk',
            'costcontract',
            'bebanbahan',
            'bebansubkon',
            'termpayment',
            'guarantee',
            'stakeholder',
        ));
    }

    public function update(Request $request, $id)
    {

        $scope = planning_project_definitions::find($id);
        $scope->update([
            'project_definition_id' => $request->name_project,
            'status' => $request->status,
            $request->except(['_token']),
        ]);

        executing_project_definitions::create([
            'project_definition_id' => $scope->project_definition_id,
            'scope_id' => $scope->scope_id,
            'schedule_id' => $scope->schedule_id,
            'cost_projectincome_id' => $scope->cost_projectincome_id,
            'cost_caseflow_id' => $scope->cost_caseflow_id,
            'cost_listasumsition_id' => $scope->cost_listasumsition_id,
            'quality_id' => $scope->quality_id,
            'resource_id' => $scope->resource_id,
            'reports_id' => $scope->reports_id,
            'presentation_id' => $scope->presentation_id,
            'projectanouncement_id' => $scope->projectanouncement_id,
            'reviewmeeting_id' => $scope->reviewmeeting_id,
            'teammorale_id' => $scope->teammorale_id,
            'risk_id' => $scope->risk_id,
            'costcontract_id' => $scope->costcontract_id,
            'bebanbahan_id' => $scope->bebanbahan_id,
            'bebansubkon_id' => $scope->bebansubkon_id,
            'termpayment_id' => $scope->termpayment_id,
            'guarantee_id' => $scope->guarantee_id,
            'stakeholder_id' => $scope->stakeholder_id,
            'status' => 'open',
        ]);

        $scopeExecuting = planning_scope::where('project_definition_id', $request->name_project)->get();

        foreach ($scopeExecuting as $scope) {
            executing_scope::create([
                'technical_requirements' => $scope->technical_requirements,
                'perfomance_requirements' => $scope->perfomance_requirements, // Specify a default value
                'bussines_requirements' => $scope->bussines_requirements,
                'regulatory_requirements' => $scope->regulatory_requirements,
                'user_requirements' => $scope->user_requirements,
                'system_requirements' => $scope->system_requirements,
                'project_definition_id' => $scope->project_definition_id,
            ]);
        }


        return redirect('/planning');
    }
}
