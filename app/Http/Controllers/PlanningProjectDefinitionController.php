<?php

namespace App\Http\Controllers;

use App\Models\executing_com_announcements;
use App\Models\executing_com_presentations;
use App\Models\executing_com_reports;
use App\Models\executing_com_reviews;
use App\Models\executing_com_tems;
use App\Models\executing_cost_caseFlow;
use App\Models\executing_cost_incomes;
use App\Models\executing_cost_listAssumsition;
use App\Models\executing_procurement_bahan;
use App\Models\executing_procurement_contracts;
use App\Models\executing_procurement_guarantee;
use App\Models\executing_procurement_subkon;
use App\Models\executing_procurement_termplans;
use App\Models\executing_project_definitions;
use App\Models\Executing_ProjectDefinition;
use App\Models\executing_quality;
use App\Models\executing_resources;
use App\Models\executing_risk;
use App\Models\executing_schedule;
use App\Models\executing_scope;
use App\Models\executing_stakeholder;
use App\Models\Initiating_ProjectDefinition;
use App\Models\planning_com_announcements;
use App\Models\planning_com_presentations;
use App\Models\planning_com_reports;
use App\Models\planning_com_reviews;
use App\Models\planning_com_tems;
use App\Models\planning_cost_caseFlow;
use App\Models\planning_cost_incomes;
use App\Models\planning_cost_listAssumsition;
use App\Models\planning_procurement_bebanBahan;
use App\Models\planning_procurement_bebanSubkon;
use App\Models\planning_procurement_contracts;
use App\Models\planning_procurement_guarantee;
use App\Models\planning_procurement_termplans;
use App\Models\planning_project_definitions;
use App\Models\planning_quality;
use App\Models\planning_resources;
use App\Models\planning_risk;
use App\Models\planning_schedule;
use App\Models\planning_scope;
use App\Models\planning_stakeholder;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PlanningProjectDefinitionController extends Controller
{
    public function index()
    {
        if (Auth()->user()->roles == 'superadmin' || Auth()->user()->roles == 'adminPlanning') {
            // $projectDefinition = Planning_ProjectDefinition::all();
            $planningFinal = planning_project_definitions::all();
            return view('planning.final.index', ['planningFinal' => $planningFinal]);
        } else {
            return redirect('/login')->with('error', 'Username dan Password yang Anda Masukan salah');
        }
    }

    public function create()
    {
        $projectDefinition = Initiating_ProjectDefinition::all();
        $planningFinal = planning_project_definitions::all();
        $scope = planning_scope::all();
        $schedule = planning_schedule::all();
        $projectincome = planning_cost_incomes::all();
        $caseflow = planning_cost_caseFlow::all();
        $listasumsition = planning_cost_listAssumsition::all();
        $quality = planning_quality::all();
        $resource = planning_resources::all();
        $report = planning_com_reports::all();
        $presentations = planning_com_presentations::all();
        $projectannouncement = planning_com_announcements::all();
        $reviews = planning_com_reviews::all();
        $teammorale = planning_com_tems::all();
        $risk = planning_risk::all();
        $costcontract = planning_procurement_contracts::all();
        $bebanbahan = planning_procurement_bebanBahan::all();
        $bebansubkon = planning_procurement_bebanSubkon::all();
        $termpayment = planning_procurement_termplans::all();
        $guarantee = planning_procurement_guarantee::all();
        $stakeholder = planning_stakeholder::all();


        return view('planning.final.create', compact(
            'planningFinal',
            'projectDefinition',
            'scope',
            'schedule',
            'projectincome',
            'caseflow',
            'listasumsition',
            'quality',
            'resource',
            'report',
            'presentations',
            'projectannouncement',
            'reviews',
            'teammorale',
            'risk',
            'costcontract',
            'bebanbahan',
            'bebansubkon',
            'termpayment',
            'guarantee',
            'stakeholder',
        ));
    }

    public function store(Request $request)
    {
        planning_project_definitions::create([
            'project_definition_id' => $request->name_project,
            'status' => 'Open'
        ]);

        // Lakukan query untuk mendapatkan scope berdasarkan project_definition_id
        // $schedule_id = planning_schedule::where('project_definition_id', $request->name_project)->first();
        // $risk_id = planning_risk::where('project_definition_id', $request->name_project)->first();
        // $name_project = Initiating_ProjectDefinition::where('id', $request->name_project)->first();

        // if ($schedule_id == null && $risk_id == null) {
        //     return redirect('/finalPlanning/add')->with("error", "Data $name_project->name_project is empty!");
        // } else {

        // if (planning_project_definitions::where('project_definition_id', $request->name_project)->exists()) {
        //     return redirect('/finalPlanning/add')->with("error", "$name_project->name_project already exists!");
        // } else {
        // $planningProjectDefinition = planning_project_definitions::where('project_definition_id', $request->name_project)->first();
        // $planningProjectDefinition->update([
        //     'project_definition_id' => $planningProjectDefinition->project_definition_id,
        //     'schedule_id' => $schedule_id->id,
        //     'risk_id' => $risk_id->id,
        //     'status' => $planningProjectDefinition->status,
        // ]);
        return redirect('/planning')->with('success', 'Data has been added!');
        // }
    }

    // $planningProject = new planning_project_definitions();
    // $planningProject->project_definition_id = $request->name_project;
    // $planningProject->schedule_id = $schedule_id->id;
    // $planningProject->risk_id = $risk_id->id;

    // // Atur atribut status
    // $planningProject->status = 'Open';

    // // Atur atribut lainnya menggunakan data dari request
    // $planningProject->fill($request->except(['_token']));

    // // Simpan instance yang baru dibuat ke dalam database
    // $planningProject->save();


    // $scope = planning_scope::where('project_definition_id', $request->name_project)->first();
    // $cost_projectincome_id = planning_cost_incomes::where('project_definition_id', $request->name_project)->first();
    // $cost_caseflow_id = planning_cost_caseFlow::where('project_definition_id', $request->name_project)->first();
    // $cost_listasumsition_id = planning_cost_listAssumsition::where('project_definition_id', $request->name_project)->first();
    // $quality_id = planning_quality::where('project_definition_id', $request->name_project)->first();
    // $resource_id = planning_resources::where('project_definition_id', $request->name_project)->first();
    // $reports_id = planning_com_reports::where('project_definition_id', $request->name_project)->first();
    // $presentation_id = planning_com_presentations::where('project_definition_id', $request->name_project)->first();
    // $projectanouncement_id = planning_com_announcements::where('project_definition_id', $request->name_project)->first();
    // $reviewmeeting_id = planning_com_reviews::where('project_definition_id', $request->name_project)->first();
    // $teammorale_id = planning_com_tems::where('project_definition_id', $request->name_project)->first();
    // $costcontract_id = planning_procurement_contracts::where('project_definition_id', $request->name_project)->first();
    // $bebanbahan_id = planning_procurement_bebanBahan::where('project_definition_id', $request->name_project)->first();
    // $bebansubkon_id = planning_procurement_bebanSubkon::where('project_definition_id', $request->name_project)->first();
    // $termpayment_id = planning_procurement_termplans::where('project_definition_id', $request->name_project)->first();
    // $guarantee_id = planning_procurement_guarantee::where('project_definition_id', $request->name_project)->first();
    // $stakeholder_id = planning_stakeholder::where('project_definition_id', $request->name_project)->first();

    // Buat instance baru dari model dan atur nilai attribut        

    // $planningProject->scope_id = $scope->id;
    // $planningProject->cost_projectincome_id = $cost_projectincome_id->id;
    // $planningProject->cost_caseflow_id = $cost_caseflow_id->id;
    // $planningProject->cost_listasumsition_id = $cost_listasumsition_id->id;
    // $planningProject->quality_id = $quality_id->id;
    // $planningProject->resource_id = $resource_id->id;
    // $planningProject->reports_id = $reports_id->id;
    // $planningProject->presentation_id = $presentation_id->id;
    // $planningProject->projectanouncement_id = $projectanouncement_id->id;
    // $planningProject->reviewmeeting_id = $reviewmeeting_id->id;
    // $planningProject->teammorale_id = $teammorale_id->id;
    // $planningProject->costcontract_id = $costcontract_id->id;
    // $planningProject->bebanbahan_id = $bebanbahan_id->id;
    // $planningProject->bebansubkon_id = $bebansubkon_id->id;
    // $planningProject->termpayment_id = $termpayment_id->id;
    // $planningProject->guarantee_id = $guarantee_id->id;
    // $planningProject->stakeholder_id = $stakeholder_id->id;        



    public function destroy($id)
    {
        $scope = planning_project_definitions::find($id);
        $scope->delete();
        return redirect('/planning');
    }

    public function show($id)
    {
        $planningFinal = planning_project_definitions::find($id);
        $planFinal = planning_project_definitions::all();
        $projectDefinition = Initiating_ProjectDefinition::all();
        $scope = planning_scope::all();
        $schedule = planning_schedule::all();
        $projectincome = planning_cost_incomes::all();
        $caseflow = planning_cost_caseFlow::all();
        $listasumsition = planning_cost_listAssumsition::all();
        $quality = planning_quality::all();
        $resource = planning_resources::all();
        $report = planning_com_reports::all();
        $presentations = planning_com_presentations::all();
        $projectannouncement = planning_com_announcements::all();
        $reviews = planning_com_reviews::all();
        $teammorale = planning_com_tems::all();
        $risk = planning_risk::all();
        $costcontract = planning_procurement_contracts::all();
        $bebanbahan = planning_procurement_bebanBahan::all();
        $bebansubkon = planning_procurement_bebanSubkon::all();
        $termpayment = planning_procurement_termplans::all();
        $guarantee = planning_procurement_guarantee::all();
        $stakeholder = planning_stakeholder::all();

        return view('planning.final.edit', compact(
            'planningFinal',
            'projectDefinition',
            'scope',
            'schedule',
            'planFinal',
            'projectincome',
            'caseflow',
            'listasumsition',
            'quality',
            'resource',
            'report',
            'presentations',
            'projectannouncement',
            'reviews',
            'teammorale',
            'risk',
            'costcontract',
            'bebanbahan',
            'bebansubkon',
            'termpayment',
            'guarantee',
            'stakeholder',
        ));
    }

    public function update(Request $request, $id)
    {
        if ($request->status == 'close' || $request->status == 'Close') {

            $scope = planning_project_definitions::find($id);
            // update status pada final planning project definition
            $scope->update([
                'project_definition_id' => $request->name_project,
                'status' => $request->status,
                $request->except(['_token']),
            ]);

            // input data kedalam table executing project definition
            executing_project_definitions::create([
                'project_definition_id' => $scope->project_definition_id,
                'scope_id' => $scope->scope_id,
                'schedule_id' => $scope->schedule_id,
                'cost_projectincome_id' => $scope->cost_projectincome_id,
                'cost_caseflow_id' => $scope->cost_caseflow_id,
                'cost_listasumsition_id' => $scope->cost_listasumsition_id,
                'quality_id' => $scope->quality_id,
                'resource_id' => $scope->resource_id,
                'reports_id' => $scope->reports_id,
                'presentation_id' => $scope->presentation_id,
                'projectanouncement_id' => $scope->projectanouncement_id,
                'reviewmeeting_id' => $scope->reviewmeeting_id,
                'teammorale_id' => $scope->teammorale_id,
                'risk_id' => $scope->risk_id,
                'costcontract_id' => $scope->costcontract_id,
                'bebanbahan_id' => $scope->bebanbahan_id,
                'bebansubkon_id' => $scope->bebansubkon_id,
                'termpayment_id' => $scope->termpayment_id,
                'guarantee_id' => $scope->guarantee_id,
                'stakeholder_id' => $scope->stakeholder_id,
                'status' => 'Open',
            ]);

            // input data kedalam table executing 
            $scopeExecuting = planning_scope::where('project_definition_id', $request->name_project)->get();
            $scheduleExecuting = planning_schedule::where('project_definition_id', $request->name_project)->get();
            $qualityExecuting = planning_quality::where('project_definition_id', $request->name_project)->get();
            $projectIncomeExecuting = planning_cost_incomes::where('project_definition_id', $request->name_project)->get();
            $caseFlowExecuting = planning_cost_caseFlow::where('project_definition_id', $request->name_project)->get();
            $listAsumsitionExecuting = planning_cost_listAssumsition::where('project_definition_id', $request->name_project)->get();
            $resourceExecuting = planning_resources::where('project_definition_id', $request->name_project)->get();
            $reportsExecuting = planning_com_reports::where('project_definition_id', $request->name_project)->get();
            $presentationsExecuting = planning_com_presentations::where('project_definition_id', $request->name_project)->get();
            $announcementsExecuting = planning_com_announcements::where('project_definition_id', $request->name_project)->get();
            $reviewsExecuting = planning_com_reviews::where('project_definition_id', $request->name_project)->get();
            $teamMoraleExecuting = planning_com_tems::where('project_definition_id', $request->name_project)->get();
            $riskExecuting = planning_risk::where('project_definition_id', $request->name_project)->get();
            $costContractExecuting = planning_procurement_contracts::where('project_definition_id', $request->name_project)->get();
            $bebanBahanExecuting = planning_procurement_bebanBahan::where('project_definition_id', $request->name_project)->get();
            $bebanSubkonExecuting = planning_procurement_bebanSubkon::where('project_definition_id', $request->name_project)->get();
            $termPlanExecuting = planning_procurement_termplans::where('project_definition_id', $request->name_project)->get();
            $guaranteExecuting = planning_procurement_guarantee::where('project_definition_id', $request->name_project)->get();
            $stakeholderExecuting = planning_stakeholder::where('project_definition_id', $request->name_project)->get();

            // foreach ($scopeExecuting as $scope) {
            //     executing_scope::create([
            //         'technical_requirements' => $scope->technical_requirements,
            //         'perfomance_requirements' => $scope->perfomance_requirements, // Specify a default value
            //         'bussines_requirements' => $scope->bussines_requirements,
            //         'regulatory_requirements' => $scope->regulatory_requirements,
            //         'user_requirements' => $scope->user_requirements,
            //         'system_requirements' => $scope->system_requirements,
            //         'project_definition_id' => $scope->project_definition_id,
            //     ]);
            // }
            foreach ($scheduleExecuting as $schedule) {
                executing_schedule::create([
                    'task' => $schedule->task,
                    'start_date' => $schedule->start_date,
                    'finish_date' => $schedule->finish_date,
                    'description_task' => $schedule->description_task,
                    'assign_to' => $schedule->assign_to,
                    'project_definition_id' => $schedule->project_definition_id,
                ]);
            }
            // foreach ($qualityExecuting as $quality) {
            //     executing_quality::create([
            //         'requirements' => $quality->requirements,
            //         'category' => $quality->category,
            //         'project_definition_id' => $schedule->project_definition_id,
            //     ]);
            // }
            // foreach ($caseFlowExecuting as $caseFlow) {
            //     executing_cost_caseFlow::create([
            //         'nilai_rupiah' => $caseFlow->nilai_rupiah,
            //         'waktu' => $caseFlow->waktu,
            //         'project_definition_id' => $caseFlow->project_definition_id,
            //     ]);
            // }
            // foreach ($projectIncomeExecuting as $income) {
            //     executing_cost_incomes::create([
            //         'cost_category' => $income->cost_category,
            //         'description' => $income->description,
            //         'total' => $income->total,
            //         'project_definition_id' => $income->project_definition_id,
            //     ]);
            // }
            // foreach ($listAsumsitionExecuting as $asumsition) {
            //     executing_cost_listAssumsition::create([
            //         'deskripsi' => $asumsition->deskripsi,
            //         'project_definition_id' => $asumsition->project_definition_id,
            //     ]);
            // }
            // foreach ($resourceExecuting as $resource) {
            //     executing_resources::create([
            //         'name' => $resource->name,
            //         'position' => $resource->position,
            //         'duration' => $resource->duration,
            //         'status' => $resource->status,
            //         'project_definition_id' => $resource->project_definition_id,
            //     ]);
            // }
            // foreach ($reportsExecuting as $report) {
            //     executing_com_reports::create([
            //         'deliverable' => $report->deliverable,
            //         'description' => $report->description,
            //         'delivery_method' => $report->delivery_method,
            //         'frequency' => $report->frequency,
            //         'owner' => $report->owner,
            //         'audience' => $report->audience,
            //         'project_definition_id' => $report->project_definition_id,
            //     ]);
            // }
            // foreach ($teamMoraleExecuting as $morale) {
            //     executing_com_tems::create([
            //         'deliverable' => $morale->deliverable,
            //         'description' => $morale->description,
            //         'delivery_method' => $morale->delivery_method,
            //         'frequency' => $morale->frequency,
            //         'owner' => $morale->owner,
            //         'audience' => $morale->audience,
            //         'project_definition_id' => $morale->project_definition_id,
            //     ]);
            // }
            // foreach ($presentationsExecuting as $presentation) {
            //     executing_com_presentations::create([
            //         'deliverable' => $presentation->deliverable,
            //         'description' => $presentation->description,
            //         'delivery_method' => $presentation->delivery_method,
            //         'frequency' => $presentation->frequency,
            //         'owner' => $presentation->owner,
            //         'audience' => $presentation->audience,
            //         'project_definition_id' => $presentation->project_definition_id,
            //     ]);
            // }
            // foreach ($reviewsExecuting as $morale) {
            //     executing_com_reviews::create([
            //         'deliverable' => $presentation->deliverable,
            //         'description' => $presentation->description,
            //         'delivery_method' => $presentation->delivery_method,
            //         'frequency' => $presentation->frequency,
            //         'owner' => $presentation->owner,
            //         'audience' => $presentation->audience,
            //         'project_definition_id' => $presentation->project_definition_id,
            //     ]);
            // }
            // foreach ($announcementsExecuting as $annoouncement) {
            //     executing_com_announcements::create([
            //         'deliverable' => $annoouncement->deliverable,
            //         'description' => $annoouncement->description,
            //         'delivery_method' => $annoouncement->delivery_method,
            //         'frequency' => $annoouncement->frequency,
            //         'owner' => $annoouncement->owner,
            //         'audience' => $annoouncement->audience,
            //         'project_definition_id' => $annoouncement->project_definition_id,
            //     ]);
            // }
            foreach ($riskExecuting as $risk) {
                executing_risk::create([
                    'start_date' => $risk->start_date,
                    'description_ofrisk' => $risk->description_ofrisk,
                    'submitter' => $risk->submitter,
                    'probability_factor' => $risk->probability_factor,
                    'impact_factor' => $risk->impact_factor,
                    'exposure' => $risk->exposure,
                    'Risk_reponse_type' => $risk->Risk_reponse_type,
                    'Risk_reponse_plan' => $risk->Risk_reponse_plan,
                    'assigned_to' => $risk->assigned_to,
                    'status' => $risk->status,
                    'due_date' => $risk->due_date,
                    'project_definition_id' => $risk->project_definition_id,
                ]);
            }
            // foreach ($costContractExecuting as $contract) {
            //     executing_procurement_contracts::create([
            //         'value' => $contract->value,
            //         'contract_value' => $contract->contract_value,
            //         'project_definition_id' => $contract->project_definition_id,
            //     ]);
            // }
            // foreach ($bebanBahanExecuting as $bahan) {
            //     executing_procurement_bahan::create([
            //         'procurement' => $bahan->procurement,
            //         'vendor' => $bahan->vendor,
            //         'description_service' => $bahan->description_service,
            //         'volume' => $bahan->volume,
            //         'units' => $bahan->units,
            //         'total' => $bahan->total,
            //         'start_toOrder' => $bahan->start_toOrder,
            //         'finish_toOrder' => $bahan->finish_toOrder,
            //         'project_definition_id' => $bahan->project_definition_id,
            //     ]);
            // }
            // foreach ($bebanSubkonExecuting as $subkon) {
            //     executing_procurement_subkon::create([
            //         'procurement_subkon' => $subkon->procurement_subkon,
            //         'vendor_subkon' => $subkon->vendor_subkon,
            //         'description_service_subkon' => $subkon->description_service_subkon,
            //         'volume_subkon' => $subkon->volume_subkon,
            //         'units_subkon' => $subkon->units_subkon,
            //         'total_subkon' => $subkon->total_subkon,
            //         'start_toOrder_subkon' => $subkon->start_toOrder_subkon,
            //         'finisih_toOrder_subkon' => $subkon->finisih_toOrder_subkon,
            //         'project_definition_id' => $subkon->project_definition_id,
            //     ]);
            // }
            // foreach ($termPlanExecuting as $termPlan) {
            //     executing_procurement_termplans::create([
            //         'term_type' => $termPlan->term_type,
            //         'value_term' => $termPlan->value_term,
            //         'value_rp_term' => $termPlan->value_rp_term,
            //         'month_plan' => $termPlan->month_plan,
            //         'project_definition_id' => $termPlan->project_definition_id,
            //     ]);
            // }
            // foreach ($guaranteExecuting as $guarantee) {
            //     executing_procurement_guarantee::create([
            //         'deskripsi' => $guarantee->deskripsi,
            //         'persen' => $guarantee->persen,
            //         'radio' => $guarantee->radio,
            //         'project_definition_id' => $guarantee->project_definition_id,
            //     ]);
            // }
            // foreach ($stakeholderExecuting as $stakeholder) {
            //     executing_stakeholder::create([
            //         'stakeholder' => $stakeholder->stakeholder,
            //         'role' => $stakeholder->role,
            //         'power' => $stakeholder->power,
            //         'interest' => $stakeholder->interest,
            //         'initiation' => $stakeholder->initiation,
            //         'planning' => $stakeholder->planning,
            //         'executing' => $stakeholder->executing,
            //         'control' => $stakeholder->control,
            //         'close' => $stakeholder->close,
            //         'engagement_level' => $stakeholder->engagement_level,
            //         'project_definition_id' => $stakeholder->project_definition_id,
            //     ]);
            // }
            return redirect('/planning');
        } else {
            // kondisi jika status yang dipilih ada selain on progress
            $scope = planning_project_definitions::find($id);
            $scope->update([
                'project_definition_id' => $request->name_project,
                'status' => $request->status,
                $request->except(['_token']),
            ]);
            return redirect('/planning');
        }
    }
}
