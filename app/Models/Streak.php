<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Streak extends Model
{
    protected $fillable = ['user_id', 'habit_id', 'goal_id', 'length'];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
