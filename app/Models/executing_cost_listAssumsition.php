<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class executing_cost_listAssumsition extends Model
{
    protected $fillable = [
        'name_project',
        'deskripsi',
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
