<?php

namespace App\Http\Controllers;

use App\Models\executing_com_presentations;
use Illuminate\Http\Request;

class PresentationExecutingController extends Controller
{
    public function index()
    {
        $presentationExecuting = executing_com_presentations::all();
        return view('executing.communicationExecuting.index', compact('presentationExecuting'));
    }


    public function create()
    {
        return view('executing.communicationExecuting.presentation');
    }

    public function store(Request $request)
    {
        executing_com_presentations::create([
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
        $presentationsExecuting = executing_com_presentations::find($id);
        $presentationsExecuting->delete();
        return redirect('/communicationExecuting');
    }
    public function show($id)
    {
        $presentationExecuting = executing_com_presentations::find($id);

        return view('executing.communicationExecuting.editPresentation', compact('presentationExecuting'));
    }


    public function update(Request $request, $id)
    {

        $presentationsExecuting = executing_com_presentations::find($id);
        $presentationsExecuting->update([
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
