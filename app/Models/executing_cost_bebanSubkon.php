<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class executing_cost_bebanSubkon extends Model
{
    protected $fillable = [
        'procurement_subkon',
        'name_project',
        'vendor_subkon',
        'description_service_subkon',
        'volume_subkon',
        'units_subkon',
        'total_subkon',
        'start_toOrder_subkon',
        'finish_toOrder_subkon',
    ];

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

    public function executingFinal()
    {
        return $this->hasOne(Executing_ProjectDefinition::class);
    }
}
