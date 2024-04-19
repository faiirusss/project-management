<?php

namespace App\Http\Controllers;

use App\Events\NewNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\planning_schedule;
use App\Models\Initiating_ProjectDefinition;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {

            $schedule = planning_schedule::all();

            foreach ($schedule as $value) {

                $date = $value->finish_date;
                $tanggalData = Carbon::createFromFormat('Y-m-d', $date);
                $tanggalSekarang = getdate();
                dd($tanggalSekarang);


                $dataSend = [
                    'task' => $value->task,
                    'start_date' => $value->start_date,
                    'finish_date' => $value->finish_date,
                    'description_task' => $value->description_task,
                    'assign_to' => $value->assign_to,
                    'status_task' => $value->status_task,
                    'project_definition_id' => $value->project_definition_id,
                    'message' => 'New Schedule Added',
                ];
            }

            event(new NewNotification($dataSend));

            $projectDefinition = Initiating_ProjectDefinition::all();

            return view('home.dashboard', compact('projectDefinition', 'schedule'));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }
}
