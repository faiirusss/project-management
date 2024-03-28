<?php

namespace App\Http\Controllers;

use App\Models\executing_resources;
use Illuminate\Http\Request;

class ResourcesExecutingController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            return view('executing.resourcesExecuting.resources');
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        return view('executing.resourcesExecuting.resources');
    }

    public function store(Request $request)
    {
        executing_resources::create([
            'name' => $request->name,
            'duration' => $request->duration,
            'position' => $request->position,
            'status' => $request->status,
            'date_realitation' => $request->date_realitation,
            $request->except(['_token']),
        ]);
        return redirect('/executing');
    }

    public function destroy($id)
    {
        $resourcesExecuting = executing_resources::find($id);
        $resourcesExecuting->delete();
        return redirect('/executing');
    }
    public function show($id)
    {
        $resourcesExecuting = executing_resources::find($id);
        return view('executing.resourcesExecuting.edit');
    }

    public function update(Request $request, $id)
    {
        $resourcesExecuting = executing_resources::find($id);
        $resourcesExecuting->update([
            'name' => $request->name,
            'duration' => $request->duration,
            'position' => $request->position,
            'status' => $request->status,
            'date_realitation' => $request->date_realitation,
            $request->except(['_token']),
        ]);
        return redirect('/executing');
    }
}
