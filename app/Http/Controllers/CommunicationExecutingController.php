<?php

namespace App\Http\Controllers;

use App\Models\executing_communication_presentations;
use App\Models\executing_communication_project_announcements;
use App\Models\executing_communication_reports;
use App\Models\executing_communication_review_and_meetings;
use App\Models\executing_communication_team_morales;
use Illuminate\Http\Request;

class CommunicationExecutingController extends Controller
{
    public function index()
    {
        $reportsExecuting = executing_communication_reports::all();
        $presentationExecuting = executing_communication_presentations::all();
        $projectAnouncementExecuting = executing_communication_project_announcements::all();
        $reviewMeetingExecuting = executing_communication_review_and_meetings::all();
        $teamMoraleExecuting = executing_communication_team_morales::all();
        return view('executing.communicationExecuting.index', compact('reportsExecuting', 'presentationExecuting', 'projectAnouncementExecuting', 'reviewMeetingExecuting', 'teamMoraleExecuting'));
    }
}
