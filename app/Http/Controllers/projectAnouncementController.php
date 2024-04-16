<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_com_announcements;
use Illuminate\Http\Request;

class projectAnouncementController extends Controller
{
    public function index()
    {
        $projectAnouncement = planning_com_announcements::all();
        return view('planning.communication.index', compact('projectAnouncement'));
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.communication.projectAnouncement', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        planning_com_announcements::create([
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
        $projectAnouncement = planning_com_announcements::find($id);
        $projectAnouncement->delete();
        return redirect('/communication');
    }
    public function show($id)
    {
        $projectAnouncement = planning_com_announcements::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.communication.editProjectAnouncement', compact('projectAnouncement', 'projectDefinition'));
    }

    public function update(Request $request, $id)
    {

        $projectAnouncement = planning_com_announcements::find($id);
        $projectAnouncement->update([
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
