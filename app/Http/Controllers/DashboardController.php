<?php

namespace App\Http\Controllers;

use App\Events\NewNotification;
use Carbon\Carbon;
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

                // get tanggal dari table database
                $hariFromData = $tanggalData->day;

                // get tanggal sekarang
                $dateNow = Carbon::now();
                $nowDay = $dateNow->day;

                // Inisialisasi data notifikasi
                $dataSend = [
                    'task' => $value->task,
                    'start_date' => $value->start_date,
                    'finish_date' => $value->finish_date,
                    'description_task' => $value->description_task,
                    'assign_to' => $value->assign_to,
                    'status_task' => $value->status_task,
                    'project_definition_id' => $value->project_definition_id,
                    'message' => '',
                ];

                if ($hariFromData == $nowDay) {
                    $dataSend['message'] = 'CEPAT SELESAIKAN, HARI INI TERAKHIR!';
                } else if ($hariFromData - $nowDay == 1) {
                    $dataSend['message'] = 'WAKTU TERSISA 1 HARI';
                }

                // Mengirim notifikasi berdasarkan data yang telah disiapkan
                event(new NewNotification($dataSend));
            }

            $projectDefinition = Initiating_ProjectDefinition::all();

            return view('home.dashboard', compact('projectDefinition', 'schedule'));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }
}
