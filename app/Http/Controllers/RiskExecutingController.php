<?php

namespace App\Http\Controllers;

use App\Models\executing_project_definitions;
use App\Models\Initiating_ProjectDefinition;
use App\Models\executing_risk;
use Illuminate\Http\Request;

class RiskExecutingController extends Controller
{
    public function index(Request $request)
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            $risksExecuting = new executing_risk();

            if($request->get('search')) {
                $risksExecuting = $risksExecuting->where('project_definition_id', 'LIKE', '%' . $request->search . '%');
            }

            $risksExecuting = $risksExecuting->get();
            $ajax = response()->json($risksExecuting);

            $projectDefinition = Initiating_ProjectDefinition::all();
            return view('executing.riskExecuting.index', compact('projectDefinition', 'risksExecuting', 'request', 'ajax'));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        $finalExecuting = executing_project_definitions::all();

        return view('executing.riskExecuting.risk', compact('projectDefinition', 'finalExecuting'));
    }

    public function store(Request $request)
    {
        executing_risk::create([
            'start_date' => $request->start_date,
            'description_ofrisk' => $request->description_ofrisk,
            'submitter' => $request->submitter,
            'probability_factor' => $request->probability_factor,
            'impact_factor' => $request->impact_factor,
            'exposure' => $request->exposure,
            'Risk_reponse_type' => $request->Risk_reponse_type,
            'Risk_reponse_plan' => $request->Risk_reponse_plan,
            'impact_description' => $request->impact_description,
            'assigned_to' => $request->assigned_to,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);
        return redirect('/riskExecuting')->with('success', 'Data has been added!.');
    }


    public function destroy($id)
    {
        $risksExecuting = executing_risk::find($id);
        $risksExecuting->delete();
        return redirect('/riskExecuting')->with('Delete', 'Data has been deleted!.');
    }

    public function show($id)
    {
        $risksExecuting = executing_risk::find($id);
        $find = $risksExecuting->project_definition_id;
        $finalExecuting = executing_project_definitions::find($find);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.riskExecuting.edit', compact('risksExecuting', 'projectDefinition', 'finalExecuting'));
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
        return redirect('/riskExecuting')->with('success', 'Data has been updated.');
    }
}
