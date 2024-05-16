<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_com_announcements;
use App\Models\planning_com_presentations;
use App\Models\planning_com_reports;
use App\Models\planning_communication_presentation;
use App\Models\planning_communication_projectAnnouncement;
use App\Models\planning_communication_report;
use App\Models\Presentation;
use App\Models\projectAnouncement;
use App\Models\Reports;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $reports = planning_com_reports::all();
        return view('planning.communication.index', compact('reports'));
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.communication.reports', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        planning_com_reports::create([
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
        $reports = planning_com_reports::find($id);
        $reports->delete();
        return redirect('/communication');
    }
    public function show($id)
    {
        $reports = planning_com_reports::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.communication.editReport', compact('reports', 'projectDefinition'));
    }

    public function update(Request $request, $id)
    {

        $report = planning_com_reports::find($id);
        $report->update([
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
