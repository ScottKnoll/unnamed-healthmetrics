<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'goal_id',
        'milestone_id',
        'name',
        'notes',
        'current_count',
        'target_count',
        'is_completed',
    ];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    public function milestone()
    {
        return $this->belongsTo(Milestone::class);
    }
}
