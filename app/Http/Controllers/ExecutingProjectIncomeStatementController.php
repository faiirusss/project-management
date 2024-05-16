<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\executing_cost_incomes;
use Illuminate\Http\Request;

class ExecutingProjectIncomeStatementController extends Controller
{
    public function index()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        $projectIncomeStatement = executing_cost_incomes::all();
        return view('executing.costExecuting.indexCost', compact('projectIncomeStatement', 'projectDefinition'));
    }


    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.costExecuting.projectIncomeStatement', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        executing_cost_incomes::create([
            'name_project' => $request->name_project,
            'cost_category' => $request->cost_category,
            'description' => $request->description,
            'total' => $request->total,
            $request->except(['_token']),
        ]);
        return redirect('/costExecuting');
    }

    public function destroy($id)
    {
        $projectIncomeStatement = executing_cost_incomes::find($id);
        $projectIncomeStatement->delete();
        return redirect('/costExecuting');
    }
    public function show($id)
    {
        $projectIncomeStatement = executing_cost_incomes::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.costExecuting.editProjectIncomeStatement', compact('projectIncomeStatement', 'projectDefinition'));
    }


    public function update(Request $request, $id)
    {

        $projectIncomeStatements = executing_cost_incomes::find($id);
        $projectIncomeStatements->update([
            'name_project' => $request->name_project,
            'cost_category' => $request->cost_category,
            'description' => $request->description,
            'total' => $request->total,
        ]);
        return redirect('/costExecuting');
    }
}
