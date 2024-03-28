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
}
