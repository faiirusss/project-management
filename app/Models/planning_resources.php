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
}
