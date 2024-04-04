<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Executing_ProjectDefinition extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_definition_id',
        'scope_id',
        'schedule_id',
        'cost_bahan_id',
        'cost_subkon_id',
        'cost_termofpay_id',
        'quality_id',
        'resource_id',
        'reports_id',
        'presentation_id',
        'projectanouncement_id',
        'reviewmeeting_id',
        'teammorale_id',
        'risk_id',
        'bebanbahan_id',
        'bebansubkon_id',
        'tagihan_id',
        'stakeholder_id',
        'status',
    ];

    public function projectDefinition()
    {
        return $this->belongsTo(Initiating_ProjectDefinition::class);
    }

    // executing -> scope
    public function executingScope()
    {
        return $this->belongsTo(executing_scope::class, 'scope_id', 'id');
    }

    // executing -> schedule
    public function executingSchedule()
    {
        return $this->belongsTo(executing_schedule::class, 'schedule_id', 'id');
    }

    // executing -> cost -> income statement
    public function executingBahan()
    {
        return $this->belongsTo(executing_cost_bebanBahans::class, 'cost_bahan_id', 'id');
    }

    // executing -> cost -> case flow
    public function executingSubkon()
    {
        return $this->belongsTo(executing_cost_bebanSubkons::class, 'cost_subkon_id', 'id');
    }

    // executing -> cost -> list asumsition
    public function executingTermOfPay()
    {
        return $this->belongsTo(executing_cost_termOfPaymentPlan::class, 'cost_termofpay_id', 'id');
    }

    // executing -> quality
    public function executingQuality()
    {
        return $this->belongsTo(executing_quality::class, 'quality_id', 'id');
    }

    // executing -> resource
    public function executingResource()
    {
        return $this->belongsTo(executing_resources::class, 'resource_id', 'id');
    }

    // executing -> communication -> reports
    public function executingReports()
    {
        return $this->belongsTo(executing_communication_reports::class, 'reports_id', 'id');
    }

    // executing -> communication -> presentations
    public function executingPresentations()
    {
        return $this->belongsTo(executing_communication_presentations::class, 'presentation_id', 'id');
    }

    // executing -> communication -> project announcement
    public function projectAnouncement()
    {
        return $this->belongsTo(executing_communication_project_announcements::class, 'projectanouncement_id', 'id');
    }

    public function reviewMeeting()
    {
        return $this->belongsTo(executing_communication_review_and_meetings::class, 'reviewmeeting_id', 'id');
    }

    // executing -> communication -> team morale
    public function teamMorale()
    {
        return $this->belongsTo(executing_communication_team_morales::class, 'teammorale_id', 'id');
    }

    // executing -> risk
    public function risk()
    {
        return $this->belongsTo(executing_risk::class, 'risk_id', 'id');
    }

    // executing -> procurement -> beban bahan
    public function bebanBahan()
    {
        return $this->belongsTo(executing_procurement_bebanBahan::class, 'bebanbahan_id', 'id');
    }

    // executing -> procurement -> beban subokn
    public function bebanSubkon()
    {
        return $this->belongsTo(executing_procurement_bebanSubkon::class, 'bebansubkon_id', 'id');
    }

    // executing -> procurement -> gurantee
    public function tagihan()
    {
        return $this->belongsTo(TagihanExecuting::class, 'tagihan_id', 'id');
    }

    // executing -> stakeholder
    public function stakeholder()
    {
        return $this->belongsTo(executing_stakeholder::class, '	stakeholder_id ', 'id');
    }
}
