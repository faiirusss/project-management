<?php

namespace App\Http\Controllers;

use App\Models\executing_com_announcements;
use App\Models\executing_com_presentations;
use App\Models\executing_com_reports;
use App\Models\executing_com_reviews;
use App\Models\executing_com_tems;
use Illuminate\Http\Request;

class CommunicationExecutingController extends Controller
{
    public function index()
    {
        $reportsExecuting = executing_com_reports::all();
        $presentationExecuting = executing_com_presentations::all();
        $projectAnouncementExecuting = executing_com_announcements::all();
        $reviewMeetingExecuting = executing_com_reviews::all();
        $teamMoraleExecuting = executing_com_tems::all();
        return view('executing.communicationExecuting.index', compact('reportsExecuting', 'presentationExecuting', 'projectAnouncementExecuting', 'reviewMeetingExecuting', 'teamMoraleExecuting'));
    }
}
