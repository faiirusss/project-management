<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\planning_schedule;
use App\Models\Initiating_ProjectDefinition;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->roles == 'superadmin' || Auth::user()->roles == 'adminPlanning') {
            $notifications = [];
            $schedules = planning_schedule::get();

            foreach ($schedules as $schedule) {
                $finishDate = Carbon::createFromFormat('Y-m-d', $schedule->finish_date);
                $daysLeft = $finishDate->diffInDays(Carbon::now());

                $notificationMessage = '';

                if ($daysLeft == 0) {
                    $notificationMessage = 'CEPAT SELESAIKAN, HARI INI TERAKHIR!';
                } else if ($daysLeft == 1) {
                    $notificationMessage = 'WAKTU TERSISA 1 HARI';
                }

                $dataSend = [
                    'task' => $schedule->task,
                    'start_date' => $schedule->start_date,
                    'finish_date' => $schedule->finish_date,
                    'description_task' => $schedule->description_task,
                    'assign_to' => $schedule->assign_to,
                    'status_task' => $schedule->status_task,
                    'project_definition_id' => $schedule->project_definition_id,
                    'message' => $notificationMessage,
                ];
                $notifications[] = $dataSend;
            }

            return view('home.dashboard', compact('notifications'));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }
}
