<?php

namespace App\Http\Controllers;

use App\Models\executing_communication_review_and_meetings;
use Illuminate\Http\Request;

class reviewMeetingExecutingController extends Controller
{
    public function index()
    {
        $reviewMeetingExecuting = executing_communication_review_and_meetings::all();
        return view('executing.communicationExecuting.index', compact('reviewMeetingExecuting'));
    }

    public function create()
    {
        return view('executing.communicationExecuting.reviewMeeting');
    }

    public function store(Request $request)
    {
        executing_communication_review_and_meetings::create([
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
        $reviewMeetingExecuting = executing_communication_review_and_meetings::find($id);
        $reviewMeetingExecuting->delete();
        return redirect('/communicationExecuting');
    }
    public function show($id)
    {
        $reviewMeetingExecuting = executing_communication_review_and_meetings::find($id);

        return view('executing.communicationExecuting.editReviewMeeting', compact('reviewMeetingExecuting'));
    }

    public function update(Request $request, $id)
    {

        $reviewMeetingExecuting = executing_communication_review_and_meetings::find($id);
        $reviewMeetingExecuting->update([
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
