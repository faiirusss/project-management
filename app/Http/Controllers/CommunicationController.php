<?php

namespace App\Http\Controllers;

use App\Models\planning_com_announcements;
use App\Models\planning_com_presentations;
use App\Models\planning_com_reports;
use App\Models\planning_com_reviews;
use App\Models\planning_com_tems;
use App\Models\planning_communication_presentation;
use App\Models\planning_communication_projectAnnouncement;
use App\Models\planning_communication_report;
use App\Models\planning_communication_reviewAndMeeting;
use App\Models\planning_communication_teamMorale;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    public function index()
    {
        $reports = planning_com_reports::all();
        $presentation = planning_com_presentations::all();
        $projectAnouncement = planning_com_announcements::all();
        $reviewMeeting = planning_com_reviews::all();
        $teamMorale = planning_com_tems::all();
        return view('planning.communication.index', compact('reports', 'presentation', 'projectAnouncement', 'reviewMeeting', 'teamMorale'));
    }
}
