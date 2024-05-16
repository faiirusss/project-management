<?php

namespace App\Http\Controllers;

use App\Models\executing_cost_caseFlow;
use App\Models\executing_cost_incomes;
use App\Models\executing_cost_listAssumsition;
use App\Models\executing_procurement_bahan;
use App\Models\executing_procurement_bebanBahan;


class CostExecutingController extends Controller
{
    public function index()
    {
        $caseflow = executing_cost_caseFlow::all();
        $projectIncomeStatement = executing_cost_incomes::all();
        $listAssumsition = executing_cost_listAssumsition::all();
        return view('executing.costExecuting.index', compact('projectIncomeStatement', 'caseflow', 'listAssumsition'));
    }
}
