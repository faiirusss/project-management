<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class executing_risk extends Model
{
    protected $fillable = [
        'start_date',
        'description_ofrisk',
        'submitter',
        'probability_factor',
        'impact_factor',
        'exposure',
        'Risk_reponse_type',
        'Risk_reponse_plan',
        'assigned_to',
        'status',
        'due_date',
        'project_definition_id',
    ];

    public function projectDefinition()
    {
        return $this->belongsTo(Initiating_ProjectDefinition::class);
    }

    public function executingFinal()
    {
        return $this->hasMany(executing_project_definitions::class, 'risk_id', 'id');
    }
}
