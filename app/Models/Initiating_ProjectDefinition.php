<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Initiating_ProjectDefinition extends Model
{
    protected $fillable = [
        'name_project',
        'code_project',
        'contract_value',
        'bussines_line',
        'date',
        'status',
        'source_ofFunds',
        'schema_bussines',
        'contract_duration',
        'warranty_period',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_project'
            ]
        ];
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('name_project', 'like', '%' . $search . '%');
            });
        });
    }


    // model relationship

    // planning -> scope relasi ke model scope planning dengan relasi one to many
    public function planningScope()
    {
        return $this->hasMany(planning_scope::class, 'project_definition_id', 'id');
    }
    public function executingScope()
    {
        return $this->hasMany(executing_scope::class, 'project_definition_id', 'id');
    }

    // planning -> schedule relasi ke model schedule planning dengan relasi one to many
    public function planningSchedule()
    {
        return $this->hasMany(planning_schedule::class, 'project_definition_id', 'id');
    }

    // planning -> cost -> income statement
    public function planningIncomeStatement()
    {
        return $this->hasOne(planning_cost_incomes::class);
    }

    // planning -> cost -> case flow
    public function planningCaseFlow()
    {
        return $this->hasOne(planning_cost_caseFlow::class);
    }

    // planning -> cost -> list asumsition
    public function planningListAsumsition()
    {
        return $this->hasOne(planning_cost_listAssumsition::class);
    }

    // planning -> quality
    public function planningQuality()
    {
        return $this->hasOne(planning_quality::class);
    }

    // planning -> resource
    public function planningResource()
    {
        return $this->hasOne(planning_resources::class);
    }

    // planning -> communication -> reports
    public function planningReports()
    {
        return $this->hasOne(planning_com_reports::class);
    }

    // planning -> communication -> presentations
    public function planningPresentations()
    {
        return $this->hasOne(planning_com_presentations::class);
    }

    // planning -> communication -> project announcement
    public function projectAnouncement()
    {
        return $this->hasOne(planning_com_announcements::class);
    }

    // planning -> communication -> team morale
    public function teamMorale()
    {
        return $this->hasOne(planning_com_tems::class);
    }

    // planning -> risk
    public function risk()
    {
        return $this->hasOne(planning_risk::class);
    }

    // planning -> procurement -> cost contract
    public function costContract()
    {
        return $this->hasOne(planning_procurement_contracts::class);
    }

    // planning -> procurement -> beban bahan
    public function bebanBahan()
    {
        return $this->hasOne(planning_procurement_bebanBahan::class);
    }

    // planning -> procurement -> beban subokn
    public function bebanSubkon()
    {
        return $this->hasOne(planning_procurement_bebanSubkon::class);
    }

    // planning -> procurement -> term of payment
    public function termPayement()
    {
        return $this->hasOne(planning_procurement_termplans::class);
    }

    // planning -> procurement -> gurantee
    public function gurantee()
    {
        return $this->hasOne(planning_procurement_guarantee::class);
    }

    // planning -> stakeholder
    public function stakeholder()
    {
        return $this->hasOne(planning_stakeholder::class);
    }

    // planning -> final planning many to one
    public function planningFinal()
    {
        return $this->hasMany(planning_project_definitions::class, 'project_definition_id', 'id');
    }
}
