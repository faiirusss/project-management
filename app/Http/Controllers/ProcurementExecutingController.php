<?php

namespace App\Http\Controllers;

use App\Models\executing_procurement_bahan;
use App\Models\Initiating_ProjectDefinition;
use App\Models\executing_procurement_bebanBahan;
use App\Models\executing_procurement_bebanSubkon;
use App\Models\executing_procurement_contracts;
use App\Models\executing_procurement_costContractToValue;
use App\Models\executing_procurement_guarantee;
use App\Models\executing_procurement_subkon;
use App\Models\executing_procurement_termOfPaymentPlan;
use App\Models\executing_procurement_termplans;
use App\Models\executing_quality;
use App\Models\Procurement;
use Illuminate\Http\Request;
use App\Models\ProjectDefinition;

class ProcurementExecutingController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminExecuting') {
            $bebanbarang = executing_procurement_bahan::all();
            $bebansubkon = executing_procurement_subkon::all();
            $termPlan = executing_procurement_termplans::all();
            $quality = executing_quality::all();
            $guarantee = executing_procurement_guarantee::all();
            $projectDefinition = Initiating_ProjectDefinition::all();
            $costContractValue = executing_procurement_contracts::all();
            return view('executing.procurementExecuting.procurement', compact(['projectDefinition', 'costContractValue', 'bebanbarang', 'bebansubkon', 'termPlan', 'quality', 'guarantee']));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }
}
