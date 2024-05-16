<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_procurement_bebanBahan;
use App\Models\planning_procurement_bebanSubkon;
use App\Models\planning_procurement_contracts;
use App\Models\planning_procurement_costContractToValue;
use App\Models\planning_procurement_guarantee;
use App\Models\planning_procurement_termOfPaymentPlan;
use App\Models\planning_procurement_termplans;
use App\Models\planning_quality;
use App\Models\Procurement;
use Illuminate\Http\Request;
use App\Models\ProjectDefinition;

class ProcurementController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            $bebanbarang = planning_procurement_bebanBahan::all();
            $bebansubkon = planning_procurement_bebanSubkon::all();
            $termPlan = planning_procurement_termplans::all();
            $quality = planning_quality::all();
            $guarantee = planning_procurement_guarantee::all();
            $projectDefinition = Initiating_ProjectDefinition::all();
            $costContractValue = planning_procurement_contracts::all();
            return view('planning.procurement.procurement', compact(['projectDefinition', 'costContractValue', 'bebanbarang', 'bebansubkon', 'termPlan', 'quality', 'guarantee']));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }
}
