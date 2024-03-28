<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class executing_communication_team_morales extends Model
{
    protected $fillable = [
        'deliverable',
        'description',
        'delivery_method',
        'frequency',
        'owner',
        'audience',
        'date_realitation',
    ];
}
