<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class executing_schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_project',
        'task',
        'start_date',
        'finish_date',
        'description_task',
        'assign_to',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_project'
            ]
        ];
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('name_project', 'like', '%' . $search . '%');
            });
        });
    }
}