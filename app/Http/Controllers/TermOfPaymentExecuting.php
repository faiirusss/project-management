<?php

namespace App\Http\Controllers;

use App\Models\executing_cost_termOfPaymentPlan;
use Illuminate\Http\Request;
use App\Models\TermOfPaymentPlanExecuting;

class TermOfPaymentExecuting extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            return view('planning.procurement.procurement');
        } else {
            return redirect('/costExecuting')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        return view('executing.TermOfPaymentExecuting.addTerm');
    }

    public function store(Request $request)
    {
        executing_cost_termOfPaymentPlan::create([
            'term_type' => $request->term_type,
            'value_term' => $request->value_term,
            'value_rp_term' => $request->value_rp_term,
            'month_plan' => $request->month_plan,
            'guarantee' => $request->guarantee,
            $request->except(['_token']),
        ]);
        return redirect('/costExecuting')->with('success', 'Risk has been added successfully.');
    }


    public function destroy($id)
    {
        $TermOfPayment = executing_cost_termOfPaymentPlan::find($id);
        $TermOfPayment->delete();
        return redirect('/costExecuting');
    }

    public function show($id)
    {
        $TermOfPayment = executing_cost_termOfPaymentPlan::find($id);
        return view('executing.TermOfPaymentExecuting.editTerm', compact('TermOfPayment'));
    }

    public function update(Request $request, $id)
    {
        $TermOfPayment = executing_cost_termOfPaymentPlan::find($id);
        $TermOfPayment->update([
            'term_type' => $request->term_type,
            'value_term' => $request->value_term,
            'value_rp_term' => $request->value_rp_term,
            'month_plan' => $request->month_plan,
            'guarantee' => $request->guarantee,
            $request->except(['_token']),
        ]);
        return redirect('/costExecuting');
    }
}
