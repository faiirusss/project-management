<?php

namespace App\Http\Controllers;

use App\Models\executing_com_tems;
use Illuminate\Http\Request;

class teamMoraleExecutingController extends Controller
{
    public function index()
    {
        $teamMoraleExecuting = executing_com_tems::all();
        return view('executing.communicationExecuting.index', compact('teamMoraleExecuting'));
    }

    public function create()
    {
        return view('executing.communicationExecuting.teamMorale');
    }

    public function store(Request $request)
    {
        executing_com_tems::create([
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
        $teamMoraleExecuting = executing_com_tems::find($id);
        $teamMoraleExecuting->delete();
        return redirect('/communicationExecuting');
    }
    public function show($id)
    {
        $teamMoraleExecuting = executing_com_tems::find($id);

        return view('executing.communicationExecuting.editTeamMorale', compact('teamMoraleExecuting'));
    }

    public function update(Request $request, $id)
    {

        $teamMoraleExecuting = executing_com_tems::find($id);
        $teamMoraleExecuting->update([
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
