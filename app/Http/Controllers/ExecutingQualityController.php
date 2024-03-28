<?php

namespace App\Http\Controllers;

use App\Models\executing_quality;
use App\Models\Initiating_ProjectDefinition;
use Illuminate\Http\Request;

class ExecutingQualityController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            $executingQuality = executing_quality::all();
            $projectDefinition = Initiating_ProjectDefinition::all();

            return view('executing.quality.index', compact('executingQuality', 'projectDefinition'));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.quality.create', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        executing_quality::create([
            'name_project' => $request->name_project,
            'requirements' => $request->requirements,
            'category' => $request->category,
            $request->except(['_token']),
        ]);
        return redirect('/qualityExecuting')->with('success', 'Risk has been added successfully.');
    }


    public function destroy($id)
    {
        $executingQuality = executing_quality::find($id);
        $executingQuality->delete();
        return redirect('/qualityExecuting');
    }

    public function show($id)
    {
        $executingQuality = executing_quality::find($id);
        return view('executing.quality.edit', compact('executingQuality'));
    }

    public function update(Request $request, $id)
    {
        $executingQuality = executing_quality::find($id);
        $executingQuality->update([
            'name_project' => $request->name_project,
            'requirements' => $request->requirements,
            'category' => $request->category,
            $request->except(['_token']),
        ]);
        return redirect('/qualityExecuting');
    }
}
