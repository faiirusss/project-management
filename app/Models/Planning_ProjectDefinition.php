<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning_ProjectDefinition extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_definition_id',
        'scope_id',
        'schedule_id',
        'status',
    ];

    public function projectDefinition()
    {
        return $this->belongsTo(Initiating_ProjectDefinition::class);
    }

    public function planningScope()
    {
        return $this->belongsTo(planning_scope::class, 'scope_id', 'id');
    }

    public function planningSchedule()
    {
        return $this->belongsTo(planning_schedule::class, 'schedule_id', 'id');
    }
}
