<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = [
        'user_id',
        'category',
        'goal_title',
        'smart_goals',
        'goal_start',
        'goal_end',
    ];

    protected $casts = [
        'smart_goals' => 'array',
    ];

    public function metrics()
    {
        return $this->hasMany(Metric::class);
    }

    public function streaks()
    {
        return $this->hasMany(Streak::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
