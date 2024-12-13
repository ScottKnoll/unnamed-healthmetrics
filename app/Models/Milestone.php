<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = [
        'goal_id',
        'title',
        'notes',
        'target_date',
        'is_completed',
    ];

    protected $casts = [
        'target_date' => 'datetime',
        'is_completed' => 'boolean',
    ];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
