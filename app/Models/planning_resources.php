<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planning_resources extends Model
{
    protected $fillable = [
        'name',
        'name_project',
        'position',
        'duration',
        'status',
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
