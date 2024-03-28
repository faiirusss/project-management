<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\executing_risk;
use Illuminate\Http\Request;

class RiskExecutingController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            $risksExecuting = executing_risk::all();
            $projectDefinition = Initiating_ProjectDefinition::all();
            return view('executing.riskExecuting.risk', compact('projectDefinition'));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.riskExecuting.risk', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        executing_risk::create([
            'start_date' => $request->start_date,
            'description_ofrisk' => $request->description_ofrisk,
            'submitter' => $request->submitter,
            'name_project' => $request->name_project,
            'probability_factor' => $request->probability_factor,
            'impact_factor' => $request->impact_factor,
            'exposure' => $request->exposure,
            'Risk_reponse_type' => $request->Risk_reponse_type,
            'Risk_reponse_plan' => $request->Risk_reponse_plan,
            'impact_description' => $request->impact_description,
            'assigned_to' => $request->assigned_to,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'date_realitation' => $request->date_realitation,
            $request->except(['_token']),
        ]);
        return redirect('/executing')->with('success', 'Risk has been added successfully.');
    }


    public function destroy($id)
    {
        $risksExecuting = executing_risk::find($id);
        $risksExecuting->delete();
        return redirect('/executing');
    }

    public function show($id)
    {
        $risksExecuting = executing_risk::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.riskExecuting.edit', compact('risksExecuting', 'projectDefinition'));
    }

    public function update(Request $request, $id)
    {
        $risksExecuting = executing_risk::find($id);
        $risksExecuting->update([
            'start_date' => $request->start_date,
            'description_ofrisk' => $request->description_ofrisk,
            'submitter' => $request->submitter,
            'name_project' => $request->name_project,
            'probability_factor' => $request->probability_factor,
            'impact_factor' => $request->impact_factor,
            'exposure' => $request->exposure,
            'Risk_reponse_type' => $request->Risk_reponse_type,
            'Risk_reponse_plan' => $request->Risk_reponse_plan,
            'impact_description' => $request->impact_description,
            'assigned_to' => $request->assigned_to,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'date_realitation' => $request->date_realitation,
            $request->except(['_token']),
        ]);
        return redirect('/executing');
    }
}
