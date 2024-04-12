<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_stakeholder;
use App\Models\Stakeholder;
use Illuminate\Http\Request;

class StakeholderController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            $stakeholder = planning_stakeholder::all()->sortBy('project_definition_id');
            return view('planning.stakeholder.stakeholder', compact('stakeholder'));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.stakeholder.add', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        planning_stakeholder::create([
            'stakeholder' => $request->stakeholder,
            'role' => $request->role,
            'power' => $request->power,
            'interest' => $request->interest,
            'initiation' => $request->initiation,
            'planning' => $request->planning,
            'executing' => $request->executing,
            'control' => $request->control,
            'close' => $request->close,
            'engagement_level' => $request->engagement_level,
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);
        return redirect('/stakeholder');
    }


    public function destroy($id)
    {
        $stakeholder = planning_stakeholder::find($id);
        $stakeholder->delete();
        return redirect('/stakeholder');
    }

    public function show($id)
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        $stakeholder = planning_stakeholder::find($id);
        return view('planning.stakeholder.edit', compact(('stakeholder'), ('projectDefinition')));
    }

    public function update(Request $request, $id)
    {
        $stakeholder = planning_stakeholder::find($id);
        $stakeholder->update([
            'stakeholder' => $request->stakeholder,
            'role' => $request->role,
            'power' => $request->power,
            'interest' => $request->interest,
            'initiation' => $request->initiation,
            'planning' => $request->planning,
            'executing' => $request->executing,
            'control' => $request->control,
            'close' => $request->close,
            'engagement_level' => $request->engagement_level,
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);
        return redirect('/stakeholder');
    }
}
