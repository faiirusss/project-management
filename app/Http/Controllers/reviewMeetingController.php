<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_com_reviews;
use Illuminate\Http\Request;

class reviewMeetingController extends Controller
{
    public function index()
    {
        $reviewMeeting = planning_com_reviews::all();
        return view('planning.communication.index', compact('reviewMeeting'));
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.communication.reviewMeeting', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        planning_com_reviews::create([
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
        $reviewMeeting = planning_com_reviews::find($id);
        $reviewMeeting->delete();
        return redirect('/communication');
    }
    public function show($id)
    {
        $reviewMeeting = planning_com_reviews::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.communication.editReviewMeeting', compact('reviewMeeting', 'projectDefinition'));
    }

    public function update(Request $request, $id)
    {

        $reviewMeeting = planning_com_reviews::find($id);
        $reviewMeeting->update([
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
