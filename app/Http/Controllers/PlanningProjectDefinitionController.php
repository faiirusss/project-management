<?php

namespace App\Http\Controllers;

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
        planning_project_definitions::create([
            'project_definition_id' => $request->name_project,
            'scope_id' => $request->scope,
            'schedule_id' => $request->schedule,
            'cost_projectincome_id' => $request->projectincome,
            'cost_caseflow_id' => $request->caseflow,
            'cost_listasumsition_id' => $request->listassumsition,
            'quality_id' => $request->quality,
            'resource_id' => $request->resource,
            'reports_id' => $request->report,
            'presentation_id' => $request->presentation,
            'projectanouncement_id' => $request->announcement,
            'reviewmeeting_id' => $request->reviewmeeting,
            'teammorale_id' => $request->teammorale,
            'risk_id' => $request->risk,
            'costcontract_id' => $request->costcontract,
            'bebanbahan_id' => $request->bebanbahan,
            'bebansubkon_id' => $request->bebansubkon,
            'termpayment_id' => $request->termpayment,
            'guarantee_id' => $request->guarantee,
            'stakeholder_id' => $request->stakeholder,
            'status' => 'open',

            $request->except(['_token']),
        ]);

        return redirect('/finalPlanning')->with('success', 'Risk has been added successfully.');
    }


    public function destroy($id)
    {
        $scope = planning_project_definitions::find($id);
        $scope->delete();
        return redirect('/finalPlanning');
    }

    public function show($id)
    {
        $planningFinal = planning_project_definitions::find($id);
        $planFinal = planning_project_definitions::all();
        $projectDefinition = Initiating_ProjectDefinition::all();
        $scope = planning_scope::all();
        $schedule = planning_schedule::all();
        return view('planning.final.edit', compact('planningFinal', 'projectDefinition', 'scope', 'schedule', 'planFinal'));
    }

    public function update(Request $request, $id)
    {
        $scope = planning_project_definitions::find($id);
        $scope->update([
            'project_definition_id' => $request->name_project,
            'scope_id' => $request->planning_scope_id,
            'schedule_id' => $request->planning_schedule_id,
            'status' => $request->status,
            $request->except(['_token']),
        ]);
        
        return redirect('/finalPlanning');
    }
}
