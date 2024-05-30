<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['user_id', 'name', 'description', 'target_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
