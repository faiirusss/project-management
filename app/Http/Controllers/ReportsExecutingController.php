<?php

namespace App\Http\Controllers;

use App\Models\executing_communication_presentations;
use App\Models\executing_communication_project_announcements;
use App\Models\executing_communication_reports;
use Illuminate\Http\Request;

class ReportsExecutingController extends Controller
{
    public function index()
    {
        $reportsExecuting = executing_communication_reports::all();
        return view('executing.communicationExecuting.index', compact('reportsExecuting'));
    }

    public function create()
    {
        $reportsExecuting = executing_communication_reports::all();
        $presentationExecuting = executing_communication_presentations::all();
        $projectAnouncementExecuting = executing_communication_project_announcements::all();
        return view('executing.communicationExecuting.reports', compact('reportsExecuting', 'presentationExecuting', 'projectAnouncementExecuting'));
    }

    public function store(Request $request)
    {
        executing_communication_reports::create([
            'deliverable' => $request->deliverable,
            'description' => $request->description,
            'delivery_method' => $request->delivery_method,
            'frequency' => $request->frequency,
            'owner' => $request->owner,
            'audience' => $request->audience,
            'date_realitation' => $request->date_realitation,
            $request->except(['_token']),
        ]);
        return redirect('/communicationExecuting');
    }

    public function destroy($id)
    {
        $reportsExecuting = executing_communication_reports::find($id);
        $reportsExecuting->delete();
        return redirect('/communicationExecuting');
    }
    public function show($id)
    {
        $reportsExecuting = executing_communication_reports::find($id);

        return view('executing.communicationExecuting.editReport', compact('reportsExecuting'));
    }

    public function update(Request $request, $id)
    {

        $reportExecuting = executing_communication_reports::find($id);
        $reportExecuting->update([
            'deliverable' => $request->deliverable,
            'description' => $request->description,
            'delivery_method' => $request->delivery_method,
            'frequency' => $request->frequency,
            'owner' => $request->owner,
            'audience' => $request->audience,
            'date_realitation' => $request->date_realitation,
        ]);
        return redirect('/communicationExecuting');
    }
}
