<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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
        return $this->hasMany(Habit::class);
    }

    public function getCategories()
    {
        return [
            'social',
            'career_finance',
            'health_fitness',
            'family',
            'hobbies',
            'personal_development',
            'other',
        ];
    }
}
