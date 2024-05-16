<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\executing_procurement_termOfPaymentPlan;
use App\Models\executing_procurement_termplans;
use App\Models\TermPlan;
use App\Models\ProjectDefinition;
use Illuminate\Http\Request;

class ExecutingTermplanController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminexecuting') {
            return view('executing.procurementExecuting.procurement');
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.procurementExecuting.addTermPlan', compact(['projectDefinition']));
    }

    public function store(Request $request)
    {
        executing_procurement_termplans::create([
            'term_type' => $request->term_type,
            'name_project' => $request->name_project,
            'value_term' => $request->value_term,
            'value_rp_term' => $request->value_rp_term,
            'month_plan' => $request->month_plan,
            $request->except(['_token']),
        ]);
        return redirect('/procurementExecuting')->with('success', 'Risk has been added successfully.');
    }


    public function destroy($id)
    {
        $termplan = executing_procurement_termplans::find($id);
        $termplan->delete();
        return redirect('/procurementExecuting');
    }

    public function show($id)
    {
        $termplan = executing_procurement_termplans::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.procurementExecuting.editTermPlan', compact('termplan', 'projectDefinition'));
    }

    public function update(Request $request, $id)
    {
        $termplan = executing_procurement_termplans::find($id);
        $termplan->update([
            'term_type' => $request->term_type,
            'name_project' => $request->name_project,
            'value_term' => $request->value_term,
            'value_rp_term' => $request->value_rp_term,
            'month_plan' => $request->month_plan,
            $request->except(['_token']),
        ]);
        return redirect('/procurementExecuting');
    }
}
