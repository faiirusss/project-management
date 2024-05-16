<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\executing_cost_caseFlow;
use Illuminate\Http\Request;

class ExecutingCaseFlowController extends Controller
{
    public function index()
    {
        $caseflow = executing_cost_caseFlow::all();
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.costExecuting.caseFlow', compact('caseFlow', 'projectDefinition'));
    }


    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.costExecuting.caseFlow', compact('projectDefinition'));
    }

    public function store(Request $request)
    {
        executing_cost_caseFlow::create([
            'name_project' => $request->name_project,
            'waktu' => $request->waktu,
            'nilai_rupiah' => $request->nilai_rupiah,
            $request->except(['_token']),
        ]);
        return redirect('/costExecuting');
    }

    public function destroy($id)
    {
        $caseflow = executing_cost_caseFlow::find($id);
        $caseflow->delete();
        return redirect('/costExecuting');
    }
    public function show($id)
    {
        $caseflow = executing_cost_caseFlow::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.costExecuting.editCaseFlow', compact('caseflow', 'projectDefinition'));
    }


    public function update(Request $request, $id)
    {

        $caseflow = executing_cost_caseFlow::find($id);
        $caseflow->update([
            'name_project' => $request->name_project,
            'waktu' => $request->waktu,
            'nilai_rupiah' => $request->nilai_rupiah,
            $request->except(['_token']),
        ]);
        return redirect('/costExecuting');
    }
}
