<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class executing_stakeholder extends Model
{
    use HasFactory;

    protected $fillable = [
        'stakeholder',
        'role',
        'power',
        'interest',
        'initiation',
        'planning',
        'executing',
        'control',
        'close',
        'engagement_level',
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
