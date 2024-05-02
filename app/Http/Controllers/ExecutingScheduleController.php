<?php

namespace App\Http\Controllers;

use App\Models\executing_project_definitions;
use App\Models\executing_schedule;
use App\Models\Initiating_ProjectDefinition;
use Illuminate\Http\Request;

class ExecutingScheduleController extends Controller
{
    public function index(Request $request)
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            $executingSchedule = new executing_schedule();

            if($request->get('search'))
            {
                $executingSchedule = $executingSchedule->where('project_definition_id', 'LIKE', '%' . $request->get('search') . '%');
            }
            $executingSchedule = $executingSchedule->get();
            $ajax = response()->json($executingSchedule);

            $projectDefinition = Initiating_ProjectDefinition::all();

            return view('executing.schedule.index', compact(['executingSchedule', 'projectDefinition', 'request', 'ajax']));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        $finalExecuting = executing_project_definitions::all();

        return view('executing.schedule.create', compact('projectDefinition', 'finalExecuting'));
    }

    public function store(Request $request)
    {
        executing_schedule::create([
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'description_task' => $request->description_task,
            'assign_to' => $request->assign_to,
            'status_task' => 'Open',
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);
        return redirect('/scheduleExecuting')->with('success', 'Schedule data has been added successfully.');
    }


    public function destroy($id)
    {
        $executingSchedule = executing_schedule::find($id);
        $executingSchedule->delete();
        return redirect('/scheduleExecuting');
    }

    public function show($id)
    {
        $executingSchedule = executing_schedule::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.schedule.edit', compact('executingSchedule', 'projectDefinition'));
    }

    public function update(Request $request, $id)
    {
        $executingSchedule = executing_schedule::find($id);
        $executingSchedule->update([
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'description_task' => $request->description_task,
            'assign_to' => $request->assign_to,
            'project_definition_id' => $request->name_project,
            'status_task' => $request->status_task,
            $request->except(['_token']),
        ]);
        return redirect('/scheduleExecuting');
    }
}
