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

class ExecutingProjectDefinitionController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminexecuting') {
            // $projectDefinition = executing_ProjectDefinition::all();
            $executingFinal = Executing_ProjectDefinition::all();
            return view('executing.final.index', ['executingFinal' => $executingFinal]);
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        $scope = planning_scope::all();
        $schedule = planning_schedule::all();
        $bahan = planning_cost_bebanBahan::all();
        $subkon = planning_cost_bebanSubkon::all();
        $termofpay = planning_cost_termOfPaymentPlan::all();
        $quality = planning_quality::all();
        $resource = planning_resources::all();
        $report = planning_communication_reports::all();
        $presentations = planning_communication_presentations::all();
        $projectannouncement = planning_communication_project_announcements::all();
        $reviewmeeting = planning_communication_review_and_meetings::all();
        $teammorale = planning_communication_team_morales::all();
        $risk = planning_risk::all();
        $bebanbahan = planning_procurement_bebanBahan::all();
        $bebansubkon = planning_procurement_bebanSubkon::all();
        $tagihan = TagihanExecuting::all();
        $stakeholder = planning_stakeholder::all();


        return view('executing.final.create', compact(
            'projectDefinition',
            'scope',
            'schedule',
            'bahan',
            'subkon',
            'termofpay',
            'quality',
            'resource',
            'report',
            'presentations',
            'projectannouncement',
            'reviewmeeting',
            'teammorale',
            'risk',
            'bebanbahan',
            'bebansubkon',
            'tagihan',
            'stakeholder',
        ));
    }

    public function store(Request $request)
    {
        executing_project_definitions::create([
            'project_definition_id' => $request->name_project,
            'scope_id' => $request->scope,
            'schedule_id' => $request->schedule,
            'cost_bahan_id' => $request->bahan,
            'cost_subkon_id' => $request->subkon,
            'cost_termofpay_id' => $request->termofpay,
            'quality_id' => $request->quality,
            'resource_id' => $request->resource,
            'reports_id' => $request->report,
            'presentation_id' => $request->presentation,
            'projectanouncement_id' => $request->announcement,
            'reviewmeeting_id' => $request->reviewmeeting,
            'teammorale_id' => $request->teammorale,
            'risk_id' => $request->risk,
            'bebanbahan_id' => $request->bebanbahan,
            'bebansubkon_id' => $request->bebansubkon,
            'tagihan_id' => $request->tagihan,
            'stakeholder_id' => $request->stakeholder,
            'status' => 'open',

            $request->except(['_token']),
        ]);

        return redirect('/finalexecuting')->with('success', 'Risk has been added successfully.');
    }


    public function destroy($id)
    {
        $scope = executing_project_definitions::find($id);
        $scope->delete();
        return redirect('/finalexecuting');
    }

    public function show($id)
    {
        $executingFinal = executing_project_definitions::find($id);
        $planFinal = executing_project_definitions::all();
        $projectDefinition = Initiating_ProjectDefinition::all();
        $scope = executing_scope::all();
        $schedule = executing_schedule::all();
        return view('executing.final.edit', compact('executingFinal', 'projectDefinition', 'scope', 'schedule', 'planFinal'));
    }

    public function update(Request $request, $id)
    {
        $scope = executing_project_definitions::find($id);
        $scope->update([
            'project_definition_id' => $request->name_project,
            'scope_id' => $request->executing_scope_id,
            'schedule_id' => $request->executing_schedule_id,
            'status' => $request->status,
            $request->except(['_token']),
        ]);
        
        return redirect('/finalexecuting');
    }
}
