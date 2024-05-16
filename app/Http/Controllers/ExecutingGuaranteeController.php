<?php

namespace App\Http\Controllers;

use App\Models\Initiating_ProjectDefinition;
use App\Models\executing_procurement_guarantee;
use Illuminate\Http\Request;

class ExecutingGuaranteeController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminexecuting') {
            $projectDefinition = Initiating_ProjectDefinition::all();
            return view('executing.procurementExecuting.procurement', compact('projectDefinition'));
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.procurementExecuting.addGuarantee', compact(['projectDefinition']));
    }

    public function store(Request $request)
    {
        executing_procurement_guarantee::create([
            'name_project' => $request->name_project,
            'deskripsi' => $request->deskripsi,
            'persen' => $request->persen,
            'radio' => $request->radio,

            $request->except(['_token']),
        ]);
        return redirect('/procurementExecuting')->with('success', 'Risk has been added successfully.');
    }


    public function destroy($id)
    {
        $guarantee = executing_procurement_guarantee::find($id);
        $guarantee->delete();
        return redirect('/procurementExecuting');
    }

    public function show($id)
    {
        $guarantee = executing_procurement_guarantee::find($id);
        $projectDefinition = Initiating_ProjectDefinition::all();
        return view('executing.procurementExecuting.editGuarantee', compact('guarantee', 'projectDefinition'));
    }

    public function update(Request $request, $id)
    {
        $guarantee = executing_procurement_guarantee::find($id);
        $guarantee->update([
            'name_project' => $request->name_project,
            'deskripsi' => $request->deskripsi,
            'persen' => $request->persen,
            'radio' => $request->radio,

            $request->except(['_token']),
        ]);
        return redirect('/procurementExecuting');
    }
}
