<?php

namespace App\Http\Controllers;

use App\Models\executing_project_definitions;
use App\Models\executing_risk;
use App\Models\executing_schedule;
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
            $executingFinal = executing_project_definitions::all();
            return view('executing.final.index', ['executingFinal' => $executingFinal]);
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }


    public function destroy($id)
    {
        $executing = executing_project_definitions::find($id);
        $executing->delete();
        return redirect('/executing')->with('success', 'Data has been deleted!');
    }

    public function show($id)
    {
        $executingFinal = executing_project_definitions::find($id);
        $scheduleExecuting = executing_schedule::all();
        $riskExecuting = executing_risk::all();
        return view('executing.final.edit', compact('executingFinal', 'scheduleExecuting', 'riskExecuting'));
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
