<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\Planning_ProjectDefinition;
use App\Models\planning_scope;
use App\Models\scope;
use Illuminate\Http\Request;

class ScopeController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            // $projectDefinition = Initiating_ProjectDefinition::all();
            $scope = planning_scope::all();
            return view('planning.scope.scope', ['scope' => $scope]);
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.scope.add', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        planning_scope::create([
            'technical_requirements' => $request->technical_requirements,
            'perfomance_requirements' => $request->perfomance_requirements,
            'bussines_requirements' => $request->bussines_requirements,
            'regulatory_requirements' => $request->regulatory_requirements,
            'user_requirements' => $request->user_requirements,
            'system_requirements' => $request->system_requirements,
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);

        return redirect('/scope')->with('success', 'Risk has been added successfully.');
    }


    public function destroy($id)
    {
        $scope = planning_scope::find($id);
        $scope->delete();
        return redirect('/scope');
    }

    public function show($id)
    {
        $scope = planning_scope::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.scope.edit', compact('scope', 'projectDefinition'));
    }

    public function update(Request $request, $id)
    {
        $scope = planning_scope::find($id);
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
        return redirect('/scope');
    }
}
