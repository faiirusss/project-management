<?php

namespace App\Http\Controllers;

use App\Models\executing_scope;
use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_project_definitions;
use App\Models\Planning_ProjectDefinition;
use Illuminate\Http\Request;

class ExecutingScopeController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            $executingScope = executing_scope::all();
            $projectDefinition = Initiating_ProjectDefinition::all();
            return view('executing.scope.index', compact(['executingScope']));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        $finalPlanning = planning_project_definitions::all();
        return view('executing.scope.create', compact('projectDefinition', 'finalPlanning'));
    }

    public function store(Request $request)
    {
        executing_scope::create([
            'name_project' => $request->name_project,
            'technical_requirements' => $request->technical_requirements,
            'perfomance_requirements' => $request->perfomance_requirements,
            'bussines_requirements' => $request->bussines_requirements,
            'regulatory_requirements' => $request->regulatory_requirements,
            'user_requirements' => $request->user_requirements,
            'system_requirements' => $request->system_requirements,
            $request->except(['_token']),
        ]);
        return redirect('/scopeExecuting')->with('success', 'Scope data has been added successfully.');
    }


    public function destroy($id)
    {
        $scope = executing_scope::find($id);
        $scope->delete();
        return redirect('/scopeExecuting');
    }

    public function show($id)
    {
        $scope = executing_scope::find($id);
        return view('executing.scope.edit', compact('scope'));
    }

    public function update(Request $request, $id)
    {
        $scope = executing_scope::find($id);
        $scope->update([
            'name_project' => $request->name_project,
            'technical_requirements' => $request->technical_requirements,
            'perfomance_requirements' => $request->perfomance_requirements,
            'bussines_requirements' => $request->bussines_requirements,
            'regulatory_requirements' => $request->regulatory_requirements,
            'user_requirements' => $request->user_requirements,
            'system_requirements' => $request->system_requirements,
            $request->except(['_token']),

            
        ]);
        return redirect('/scopeExecuting');
    }
}
