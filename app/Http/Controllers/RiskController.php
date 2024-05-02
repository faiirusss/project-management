<?php

namespace App\Http\Controllers;


use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_project_definitions;
use App\Models\planning_risk;
use Illuminate\Http\Request;

class RiskController extends Controller
{
    public function index(Request $request)
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {

            $risks = new planning_risk();

            if ($request->search) {
                $risks = $risks->where('project_definition_id', 'LIKE', '%' . $request->search . '%');
            }

            $risks = $risks->get();

            $projectDefinition = Initiating_ProjectDefinition::all();

            return view('planning.risk.risk', compact('risks', 'projectDefinition', 'request'));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $finalPlanning = planning_project_definitions::all();
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.risk.add', compact('projectDefinition', 'finalPlanning'));
    }

    public function store(Request $request)
    {
        planning_risk::create([
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
            'due_date' => $request->due_date,
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);
        return redirect('/risk')->with('success', 'Risk has been added successfully.');
    }


    public function destroy($id)
    {
        $risks = planning_risk::find($id);
        $risks->delete();
        return redirect('/risk');
    }

    public function show($id)
    {
        $risks = planning_risk::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.risk.edit', compact('risks', 'projectDefinition'));
    }

    public function update(Request $request, $id)
    {
        $risks = planning_risk::find($id);
        $risks->update([
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
            'due_date' => $request->due_date,
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);
        return redirect('/risk');
    }
}
