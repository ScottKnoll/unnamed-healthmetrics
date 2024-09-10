<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = [
        'user_id',
        'category',
        'goal',
        'smart_goals',
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

    public function users()
    {
        return $this->belongsToMany(User::class, 'goal_user')->withTimestamps();
    }
}
