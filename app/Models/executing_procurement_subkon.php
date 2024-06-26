<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class executing_procurement_subkon extends Model
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

    public function projectDefinition()
    {
        return $this->belongsTo(Initiating_ProjectDefinition::class);
    }

    public function executingFinal()
    {
        return $this->hasOne(executing_project_definitions::class);
    }
}
