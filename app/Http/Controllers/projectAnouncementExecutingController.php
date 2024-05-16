<?php

namespace App\Http\Controllers;

use App\Models\executing_com_announcements;
use Illuminate\Http\Request;

class projectAnouncementExecutingController extends Controller
{
    public function index()
    {
        $projectAnouncementExecuting = executing_com_announcements::all();
        return view('executing.communicationExecuting.index', compact('projectAnouncementExecuting'));
    }

    public function create()
    {
        return view('executing.communicationExecuting.projectAnouncement');
    }

    public function store(Request $request)
    {
        executing_com_announcements::create([
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
        $projectAnouncementExecuting = executing_com_announcements::find($id);
        $projectAnouncementExecuting->delete();
        return redirect('/communicationExecuting');
    }
    public function show($id)
    {
        $projectAnouncementExecuting = executing_com_announcements::find($id);

        return view('executing.communicationExecuting.editProjectAnouncement', compact('projectAnouncementExecuting'));
    }

    public function update(Request $request, $id)
    {

        $projectAnouncementExecuting = executing_com_announcements::find($id);
        $projectAnouncementExecuting->update([
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
