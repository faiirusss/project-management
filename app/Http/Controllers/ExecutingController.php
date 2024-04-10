<?php

namespace App\Http\Controllers;

use App\Models\executing_quality;
use App\Models\executing_schedule;
use App\Models\executing_scope;
use App\Models\executing_stakeholder;
use App\Models\Initiating_ProjectDefinition;
use Illuminate\Http\Request;

class ExecutingController extends Controller
{
    public function index()
    {
        if (Auth()->User()->roles == 'superadmin') {
            $executingScope = executing_scope::all();
            $executingSchedule = executing_schedule::all();
            $executingQuality = executing_quality::all();
            $executingStakeholder = executing_stakeholder::all();
            $projectDefinition = Initiating_ProjectDefinition::all()->sortDesc();
            return view('executing.index', compact('executingScope', 'executingSchedule', 'executingQuality', 'projectDefinition', 'executingStakeholder'));
        } elseif (Auth()->User()->roles == 'adminExecuting') {
            return view('executing.index');
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function filterExecuting(Request $request)
    {
        $executingScope = executing_scope::latest()->filter($request->all())->get();
        $executingSchedule = executing_schedule::latest()->filter($request->all())->get();
        $executingQuality = executing_quality::latest()->filter($request->all())->get();
        $executingStakeholder = executing_stakeholder::latest()->filter($request->all())->get();
        $projectDefinition = Initiating_ProjectDefinition::latest()->filter($request->all())->get();

        return view('executing.index')->with([
            'projectDefinition' => $projectDefinition,
            'executingScope' => $executingScope,
            'executingSchedule' => $executingSchedule,
            'executingQuality' => $executingQuality,
            'executingStakeholder' => $executingStakeholder,
        ]);
    }
}
