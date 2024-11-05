<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Habit extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'notes',
        'frequency',
        'difficulty',
        'current_streak',
        'max_streak',
        'target_count',
    ];

    public function completions()
    {
        return $this->hasMany(HabitCompletion::class);
    }

    public function goals()
    {
        return $this->belongsToMany(Goal::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPointsAttribute()
    {
        return match ($this->difficulty) {
            'trivial' => 1,
            'easy' => 2,
            'medium' => 3,
            'hard' => 4,
            default => 1,
        };
    }

    public function updateStreak()
    {
        //
    }
}
