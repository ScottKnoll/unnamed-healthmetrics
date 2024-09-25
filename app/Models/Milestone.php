<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = [
        'goal_id',
        'title',
        'description',
        'target_date',
        'is_completed',
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
