<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function habits()
    {
        return $this->belongsToMany(Habit::class, 'habit_user')->withTimestamps();
    }

    public function metrics()
    {
        return $this->hasMany(Metric::class);
    }

    public function streaks()
    {
        return $this->hasMany(Streak::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function getCategories()
    {
        return [
            'social',
            'career',
            'physical',
            'family',
            'leisure',
            'personality',
            'other',
        ];
    }
}
