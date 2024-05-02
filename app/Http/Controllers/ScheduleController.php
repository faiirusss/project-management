<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_project_definitions;
use App\Models\planning_schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {


            $schedule = new planning_schedule;
            
            if ($request->get('search')) {
                $schedule = $schedule->where('project_definition_id', 'LIKE', '%' . $request->get('search') . '%');
            }
            
            $schedule = $schedule->get();

            $ajax = response()->json($schedule);

            $projectDefinition = Initiating_ProjectDefinition::all();
            return view('planning.schedule.schedule', compact('projectDefinition', 'schedule', 'request', 'ajax'));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $finalPlanning = planning_project_definitions::all();
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.schedule.add', ['projectDefinition' => $projectDefinition], ['finalPlanning' => $finalPlanning]);
    }

    public function store(Request $request)
    {
        planning_schedule::create([
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
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'description_task' => $request->description_task,
            'assign_to' => $request->assign_to,
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);
        return redirect('/schedule');
    }
}
