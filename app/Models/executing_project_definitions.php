<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class executing_project_definitions extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_definition_id',
        'scope_id',
        'schedule_id',
        'cost_projectincome_id',
        'cost_caseflow_id',
        'cost_listasumsition_id',
        'quality_id',
        'resource_id',
        'reports_id',
        'presentation_id',
        'projectanouncement_id',
        'reviewmeeting_id',
        'teammorale_id',
        'risk_id',
        'costcontract_id',
        'bebanbahan_id',
        'bebansubkon_id',
        'termpayment_id',
        'guarantee_id',
        'stakeholder_id',
        'status',
    ];

    public function projectDefinition()
    {
        return $this->belongsTo(Initiating_ProjectDefinition::class, 'project_definition_id', 'id');
    }

    // planning -> scope
    public function planningScope()
    {
        return $this->belongsTo(planning_scope::class, 'scope_id', 'id');
    }

    // planning -> schedule
    public function planningSchedule()
    {
        return $this->belongsTo(planning_schedule::class, 'schedule_id', 'id');
    }

    // planning -> cost -> income statement
    public function planningIncomeStatement()
    {
        return $this->belongsTo(planning_cost_incomes::class, 'cost_projectincome_id', 'id');
    }

    // planning -> cost -> case flow
    public function planningCaseFlow()
    {
        return $this->belongsTo(planning_cost_caseFlow::class, 'cost_caseflow_id', 'id');
    }

    // planning -> cost -> list asumsition
    public function planningListAsumsition()
    {
        return $this->belongsTo(planning_cost_listAssumsition::class, 'cost_listasumsition_id', 'id');
    }

    // planning -> quality
    public function planningQuality()
    {
        return $this->belongsTo(planning_quality::class, 'quality_id', 'id');
    }

    // planning -> resource
    public function planningResource()
    {
        return $this->belongsTo(planning_resources::class, 'resource_id', 'id');
    }

    // planning -> communication -> reports
    public function planningReports()
    {
        return $this->belongsTo(planning_com_reports::class, 'reports_id', 'id');
    }

    // planning -> communication -> presentations
    public function planningPresentations()
    {
        return $this->belongsTo(planning_com_presentations::class, 'presentation_id', 'id');
    }

    // planning -> communication -> project announcement
    public function projectAnouncement()
    {
        return $this->belongsTo(planning_com_announcements::class, 'projectanouncement_id', 'id');
    }

    public function reviewMeeting()
    {
        return $this->belongsTo(planning_com_reviews::class, 'reviewmeeting_id', 'id');
    }

    // planning -> communication -> team morale
    public function teamMorale()
    {
        return $this->belongsTo(planning_com_tems::class, 'teammorale_id', 'id');
    }

    // planning -> risk
    public function risk()
    {
        return $this->belongsTo(planning_risk::class, 'risk_id', 'id');
    }

    // planning -> procurement -> cost contract
    public function costContract()
    {
        return $this->belongsTo(planning_procurement_contracts::class, 'costcontract_id', 'id');
    }

    // planning -> procurement -> beban bahan
    public function bebanBahan()
    {
        return $this->belongsTo(planning_procurement_bebanBahan::class, 'bebanbahan_id', 'id');
    }

    // planning -> procurement -> beban subokn
    public function bebanSubkon()
    {
        return $this->belongsTo(planning_procurement_bebanSubkon::class, 'bebansubkon_id', 'id');
    }

    // planning -> procurement -> term of payment
    public function termPayement()
    {
        return $this->belongsTo(planning_procurement_termplans::class, 'termpayment_id', 'id');
    }

    // planning -> procurement -> gurantee
    public function gurantee()
    {
        return $this->belongsTo(planning_procurement_guarantee::class, 'guarantee_id', 'id');
    }

    // planning -> stakeholder
    public function stakeholder()
    {
        return $this->belongsTo(planning_stakeholder::class, '	stakeholder_id ', 'id');
    }
}
