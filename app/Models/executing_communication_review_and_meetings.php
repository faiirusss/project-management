<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class executing_communication_review_and_meetings extends Model
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
