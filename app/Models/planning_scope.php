<?php

namespace App\Models;

use App\Http\Controllers\ProjectCharterController;
use App\Http\Controllers\ProjectDefinitionController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planning_scope extends Model
{
    protected $fillable = [
        'technical_requirements',
        'perfomance_requirements',
        'bussines_requirements',
        'regulatory_requirements',
        'user_requirements',
        'system_requirements',
        'project_definition_id',
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

    public function projectDefinition()
    {
        return $this->belongsTo(Initiating_ProjectDefinition::class);
    }

    public function planningFinal()
    {
        return $this->hasOne(planning_project_definitions::class);
    }
}
