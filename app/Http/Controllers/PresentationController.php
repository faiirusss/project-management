<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_com_presentations;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    public function index()
    {
        $presentation = planning_com_presentations::all();
        return view('planning.communication.index', compact('presentation'));
    }


    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.communication.presentation', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        planning_com_presentations::create([
            'deliverable' => $request->deliverable,
            'description' => $request->description,
            'delivery_method' => $request->delivery_method,
            'frequency' => $request->frequency,
            'owner' => $request->owner,
            'audience' => $request->audience,
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);
        return redirect('/communication');
    }

    public function destroy($id)
    {
        $presentations = planning_com_presentations::find($id);
        $presentations->delete();
        return redirect('/communication');
    }
    public function show($id)
    {
        $presentation = planning_com_presentations::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.communication.editPresentation', compact('presentation', 'projectDefinition'));
    }


    public function update(Request $request, $id)
    {

        $presentations = planning_com_presentations::find($id);
        $presentations->update([
            'deliverable' => $request->deliverable,
            'description' => $request->description,
            'delivery_method' => $request->delivery_method,
            'frequency' => $request->frequency,
            'owner' => $request->owner,
            'audience' => $request->audience,
            'project_definition_id' => $request->name_project,
        ]);
        return redirect('/communication');
    }
}
