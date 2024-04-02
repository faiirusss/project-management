<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\Planning_ProjectDefinition;
use App\Models\planning_schedule;
use App\Models\schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            $schedule = planning_schedule::all();
            return view('planning.schedule.schedule', ['schedule' => $schedule]);
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.schedule.add', ['projectDefinition' => $projectDefinition]);
    }

    public function store(Request $request)
    {
        planning_schedule::create([
            'task' => $request->task,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'description_task' => $request->description_task,
            'assign_to' => $request->assign_to,
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);



        return redirect('/schedule')->with('success', 'Risk has been added successfully.');
    }


    public function destroy($id)
    {
        $schedule = planning_schedule::find($id);
        $schedule->delete();
        return redirect('/schedule');
    }

    public function show($id)
    {
        $schedule = planning_schedule::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.schedule.edit', compact('schedule', 'projectDefinition'));
    }

    public function update(Request $request, $id)
    {
        $schedule = planning_schedule::find($id);
        $schedule->update([
            'name_project' => $request->name_project,
            'task' => $request->task,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'description_task' => $request->description_task,
            'assign_to' => $request->assign_to,
            $request->except(['_token']),
        ]);
        return redirect('/schedule');
    }
}
