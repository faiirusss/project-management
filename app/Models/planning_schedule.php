<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planning_schedule extends Model
{
    protected $fillable = [
        'task',
        'start_date',
        'finish_date',
        'description_task',
        'assign_to',
        'project_definition_id'
    ];

    public function projectDefinition()
    {
        return $this->belongsTo(Initiating_ProjectDefinition::class);
    }

    public function planningFinal()
    {
        return $this->belongsTo(planning_project_definitions::class);
    }
}
