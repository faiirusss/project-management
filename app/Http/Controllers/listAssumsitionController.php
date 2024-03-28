<?php

namespace App\Http\Controllers;

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
        return view('planning.cost.listAssumsition');
    }

    public function store(Request $request)
    {
        planning_cost_listAssumsition::create([
            'deskripsi' => $request->deskripsi,
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
        return view('planning.cost.listAssumsition', compact('listAssumsition'));
    }


    public function update(Request $request, $id)
    {

        $listAssumsition = planning_cost_listAssumsition::find($id);
        $listAssumsition->update([
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('/cost ');
    }
}
