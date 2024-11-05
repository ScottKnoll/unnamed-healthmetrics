<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = [
        'user_id',
        'category',
        'title',
        'smart_goals',
        'goal_start',
        'goal_end',
    ];

    protected $casts = [
        'smart_goals' => 'array',
    ];

    public function habits()
    {
        return $this->belongsToMany(Habit::class)->withTimestamps();
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
