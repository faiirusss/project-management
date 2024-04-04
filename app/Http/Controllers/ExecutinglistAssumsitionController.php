<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\executing_cost_listAssumsition;
use Illuminate\Http\Request;

class ExecutinglistAssumsitionController extends Controller
{
    public function index()
    {
        $listAssumsition = executing_cost_listAssumsition::all();
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.costExecuting.listAssumsition', compact('listAssumsition','projectDefinition'));
    }


    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.costExecuting.listAssumsition', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        executing_cost_listAssumsition::create([
            'name_project' => $request->name_project,
            'deskripsi' => $request->deskripsi,
            $request->except(['_token']),
        ]);
        return redirect('/costExecuting');
    }

    public function destroy($id)
    {
        $listAssumsition = executing_cost_listAssumsition::find($id);
        $listAssumsition->delete();
        return redirect('/costExecuting');
    }
    public function show($id)
    {
        $listAssumsition = executing_cost_listAssumsition::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.costExecuting.listAssumsition', compact('listAssumsition','projectDefinition'));
    }


    public function update(Request $request, $id)
    {

        $listAssumsition = executing_cost_listAssumsition::find($id);
        $listAssumsition->update([
            'name_project' => $request->name_project,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('/costExecuting');
    }
}
