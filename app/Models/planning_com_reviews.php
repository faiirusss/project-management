<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planning_com_reviews extends Model
{
    protected $fillable = [
        'deliverable',
        'description',
        'delivery_method',
        'frequency',
        'owner',
        'audience',
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
