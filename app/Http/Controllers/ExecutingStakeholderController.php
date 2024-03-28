<?php

namespace App\Http\Controllers;

use App\Models\executing_stakeholder;
use App\Models\Initiating_ProjectDefinition;
use Illuminate\Http\Request;

class ExecutingStakeholderController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            $executingStakeholder = executing_stakeholder::all();
            $projectDefinition = Initiating_ProjectDefinition::all();

            return view('executing.stakeholder.index', compact('executingStakeholder', 'projectDefinition'));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.stakeholder.create', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        executing_stakeholder::create([
            'stakeholder' => $request->stakeholder,
            'role' => $request->role,
            'power' => $request->power,
            'interest' => $request->interest,
            'initiation' => $request->initiation,
            'planning' => $request->planning,
            'executing' => $request->executing,
            'control' => $request->control,
            'close' => $request->close,
            'engagement_level' => $request->engagement_level,
            $request->except(['_token']),
        ]);
        return redirect('/stakeholderExecuting');
    }


    public function destroy($id)
    {
        $executingStakeholder = executing_stakeholder::find($id);
        $executingStakeholder->delete();
        return redirect('/stakeholderExecuting');
    }

    public function show($id)
    {
        $executingStakeholder = executing_stakeholder::find($id);
        return view('executing.stakeholder.edit', compact(('executingStakeholder')));
    }

    public function update(Request $request, $id)
    {
        $stakeholder = executing_stakeholder::find($id);
        $stakeholder->update([
            'stakeholder' => $request->stakeholder,
            'role' => $request->role,
            'power' => $request->power,
            'interest' => $request->interest,
            'initiation' => $request->initiation,
            'planning' => $request->planning,
            'executing' => $request->executing,
            'control' => $request->control,
            'close' => $request->close,
            'engagement_level' => $request->engagement_level,
            $request->except(['_token']),
        ]);
        return redirect('/stakeholderExecuting');
    }
}
