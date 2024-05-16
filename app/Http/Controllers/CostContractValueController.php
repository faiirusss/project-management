<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_procurement_contracts;
use App\Models\planning_procurement_costContractToValue;
use Illuminate\Http\Request;

class CostContractValueController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {

            $costContractValue = planning_procurement_contracts::all();
            return view('planning.procurement.procurement', compact(['costContractValue']));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        $costContractValue = planning_procurement_contracts::all();
        return view('planning.procurement.addCostContract', compact(['projectDefinition', 'costContractValue']));
    }

    public function store(Request $request)
    {
        planning_procurement_contracts::create([
            'value' => $request->value,
            'contract_value' => $request->contract_value,
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);
        return redirect('/procurement')->with('success', 'Risk has been added successfully.');
    }


    public function destroy($id)
    {
        $procurement = planning_procurement_contracts::find($id);
        $procurement->delete();
        return redirect('/procurement');
    }

    public function show($id)
    {
        $costContractValue = planning_procurement_contracts::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.procurement.editCostContract', compact('costContractValue', 'projectDefinition'));
    }

    public function update(Request $request, $id)
    {
        $procurement = planning_procurement_contracts::find($id);
        $procurement->update([
            'value' => $request->value,
            'contract_value' => $request->contract_value,
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);
        return redirect('/procurement');
    }
}
