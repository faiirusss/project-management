<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planning_cost_incomes extends Model
{
    protected $fillable = [
        'name_project',
        'cost_category',
        'description',
        'total',
    ];

    public function projectDefinition()
    {
        return $this->belongsTo(Initiating_ProjectDefinition::class);
    }

    public function planningFinal()
    {
        return $this->hasOne(planning_project_definitions::class);
    }
}
