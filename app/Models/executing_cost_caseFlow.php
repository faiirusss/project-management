<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class executing_cost_caseFlow extends Model
{
    protected $fillable = [
        'name_project',
        'waktu',
        'nilai_rupiah',
    ];

    public function projectDefinition()
    {
        return $this->belongsTo(Initiating_ProjectDefinition::class);
    }

    public function executingFinal()
    {
        return $this->hasOne(Executing_ProjectDefinition::class);
    }
}
