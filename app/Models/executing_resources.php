<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class executing_resources extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'duration',
        'status',
        'date_realitation',
    ];
}
