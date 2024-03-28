<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planning_cost_projectIncomeStatement extends Model
{
    protected $fillable = [
        'name_project',
        'cost_category',
        'description',
        'total',
    ];
}