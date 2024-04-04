<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\executing_procurement_contracts;
use App\Models\executing_procurement_costContractToValue;
use Illuminate\Http\Request;

class ExecutingContractController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminExecuting') {
            $costContractValue = executing_procurement_contracts::all();
            $projectDefinition = Initiating_ProjectDefinition::all();
            return view('executing.procurementExecuting.procurement', compact(['projectDefinition', 'costContractValue']));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        $costContractValue = executing_procurement_contracts::all();
        return view('executing.procurementExecuting.addCostContract', compact(['projectDefinition', 'costContractValue']));
    }

    public function store(Request $request)
    {
        executing_procurement_contracts::create([
            'name_project' => $request->name_project,
            'value' => $request->value,
            'contract_value' => $request->contract_value,
            $request->except(['_token']),
        ]);
        return redirect('/procurementExecuting')->with('success', 'Risk has been added successfully.');
    }


    public function destroy($id)
    {
        $procurement = executing_procurement_contracts::find($id);
        $procurement->delete();
        return redirect('/procurementExecuting');
    }

    public function show($id)
    {
        $costContractValue = executing_procurement_contracts::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.procurementExecuting.editCostContract', compact('costContractValue', 'projectDefinition'));
    }

    public function update(Request $request, $id)
    {
        $procurement = executing_procurement_contracts::find($id);
        $procurement->update([
            'name_project' => $request->name_project,
            'value' => $request->value,
            'contract_value' => $request->contract_value,
            $request->except(['_token']),
        ]);
        return redirect('/procurementExecuting');
    }
}
