<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_quality;
use App\Models\planning_resources;
use App\Models\Resources;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            $resources = planning_resources::all()->sortBy('project_definition_id');
            return view('planning.resources.resources', compact('resources'));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.resources.add', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        planning_resources::create([
            'name' => $request->name,
            'duration' => $request->duration,
            'position' => $request->position,
            'status' => $request->status,
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);
        return redirect('/resources');
    }

    public function destroy($id)
    {
        $resources = planning_resources::find($id);
        $resources->delete();
        return redirect('/resources');
    }
    public function show($id)
    {
        $resource = planning_resources::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.resources.edit', compact('resource', 'projectDefinition'));
    }

    public function update(Request $request, $id)
    {

        $resources = planning_resources::find($id);
        $resources->update([
            'name' => $request->name,
            'duration' => $request->duration,
            'position' => $request->position,
            'status' => $request->status,
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);
        return redirect('/resources');
    }
}
