<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\Planning_ProjectDefinition;
use App\Models\planning_schedule;
use App\Models\planning_scope;
use Illuminate\Http\Request;

class PlanningProjectDefinitionController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            // $projectDefinition = Planning_ProjectDefinition::all();
            $planningFinal = Planning_ProjectDefinition::all();
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
        return view('planning.final.create', compact('projectDefinition', 'scope', 'schedule'));
    }

    public function store(Request $request)
    {
        Planning_ProjectDefinition::create([
            'project_definition_id' => $request->name_project,
            'scope_id' => $request->planning_scope_id,
            'schedule_id' => $request->planning_schedule_id,
            'status' => 'open',

            $request->except(['_token']),
        ]);

        return redirect('/finalPlanning')->with('success', 'Risk has been added successfully.');
    }


    public function destroy($id)
    {
        $scope = Planning_ProjectDefinition::find($id);
        $scope->delete();
        return redirect('/finalPlanning');
    }

    public function show($id)
    {
        $planningFinal = Planning_ProjectDefinition::find($id);
        $planFinal = Planning_ProjectDefinition::all();
        $projectDefinition = Initiating_ProjectDefinition::all();
        $scope = planning_scope::all();
        $schedule = planning_schedule::all();
        return view('planning.final.edit', compact('planningFinal', 'projectDefinition', 'scope', 'schedule', 'planFinal'));
    }

    public function update(Request $request, $id)
    {
        $scope = Planning_ProjectDefinition::find($id);
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
