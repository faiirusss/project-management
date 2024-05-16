<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanExecuting extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor',
        'deskripsi',
        'curr',
        'nilai_tagihan',
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
