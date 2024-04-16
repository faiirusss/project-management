<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_cost_incomes;
use App\Models\planning_cost_projectIncomeStatement;
use Illuminate\Http\Request;
use App\Models\ProjectIncomeStatement;

class ProjectIncomeStatementController extends Controller
{
    public function index()
    {
        $projectIncomeStatement = planning_cost_incomes::all()->sortBy('project_definition_id');
        return view('executing.costExecuting.indexCost', compact('projectIncomeStatement'));
    }


    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.cost.projectIncomeStatement', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        planning_cost_incomes::create([
            'cost_category' => $request->cost_category,
            'description' => $request->description,
            'total' => $request->total,
            'project_definition_id' => $request->name_project,
            $request->except(['_token']),
        ]);
        return redirect('/cost');
    }

    public function destroy($id)
    {
        $projectIncomeStatement = planning_cost_incomes::find($id);
        $projectIncomeStatement->delete();
        return redirect('/cost');
    }
    public function show($id)
    {
        $projectIncomeStatement = planning_cost_incomes::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('planning.cost.editProjectIncomeStatement', compact('projectIncomeStatement', 'projectDefinition'));
    }


    public function update(Request $request, $id)
    {

        $projectIncomeStatements = planning_cost_incomes::find($id);
        $projectIncomeStatements->update([
            'cost_category' => $request->cost_category,
            'description' => $request->description,
            'total' => $request->total,
            'project_definition_id' => $request->name_project,
        ]);
        return redirect('/cost');
    }
}
