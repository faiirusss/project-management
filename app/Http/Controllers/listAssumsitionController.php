<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_cost_listAssumsition;
use Illuminate\Http\Request;

class listAssumsitionController extends Controller
{
    public function index()
    {
        $listAssumsition = planning_cost_listAssumsition::all();
        return view('planning.cost.listAssumsition', compact('listAssumsition'));
    }


    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.cost.listAssumsition', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        planning_cost_listAssumsition::create([
            'deskripsi' => $request->deskripsi,
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);
        return redirect('/cost');
    }

    public function destroy($id)
    {
        $listAssumsition = planning_cost_listAssumsition::find($id);
        $listAssumsition->delete();
        return redirect('/cost');
    }
    public function show($id)
    {
        $listAssumsition = planning_cost_listAssumsition::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.cost.editListAssumsition', compact('listAssumsition', 'projectDefinition'));
    }


    public function update(Request $request, $id)
    {

        $listAssumsition = planning_cost_listAssumsition::find($id);
        $listAssumsition->update([
            'deskripsi' => $request->deskripsi,
            'project_definition_id' => $request->name_project,
        ]);
        return redirect('/cost ');
    }
}
