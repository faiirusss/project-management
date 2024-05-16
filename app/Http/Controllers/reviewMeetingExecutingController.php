<?php

namespace App\Http\Controllers;

use App\Models\executing_com_reviews;
use Illuminate\Http\Request;

class reviewMeetingExecutingController extends Controller
{
    public function index()
    {
        $reviewMeetingExecuting = executing_com_reviews::all();
        return view('executing.communicationExecuting.index', compact('reviewMeetingExecuting'));
    }

    public function create()
    {
        return view('executing.communicationExecuting.reviewMeeting');
    }

    public function store(Request $request)
    {
        executing_com_reviews::create([
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
        $reviewMeetingExecuting = executing_com_reviews::find($id);
        $reviewMeetingExecuting->delete();
        return redirect('/communicationExecuting');
    }
    public function show($id)
    {
        $reviewMeetingExecuting = executing_com_reviews::find($id);

        return view('executing.communicationExecuting.editReviewMeeting', compact('reviewMeetingExecuting'));
    }

    public function update(Request $request, $id)
    {

        $reviewMeetingExecuting = executing_com_reviews::find($id);
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
