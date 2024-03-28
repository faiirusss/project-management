<?php

namespace App\Http\Controllers;

use App\Models\executing_schedule;
use App\Models\Initiating_ProjectDefinition;
use Illuminate\Http\Request;

class ExecutingScheduleController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            $executingSchedule = executing_schedule::all();
            $projectDefinition = Initiating_ProjectDefinition::all();

            return view('executing.schedule.index', compact(['executingSchedule', 'projectDefinition']));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();

        return view('executing.schedule.create', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        executing_schedule::create([
            'name_project' => $request->name_project,
            'task' => $request->task,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'description_task' => $request->description_task,
            'assign_to' => $request->assign_to,
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
        return view('executing.schedule.edit', compact('executingSchedule'));
    }

    public function update(Request $request, $id)
    {
        $executingSchedule = executing_schedule::find($id);
        $executingSchedule->update([
            'name_project' => $request->name_project,
            'task' => $request->task,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'description_task' => $request->description_task,
            'assign_to' => $request->assign_to,
            $request->except(['_token']),
        ]);
        return redirect('/scheduleExecuting');
    }
}
