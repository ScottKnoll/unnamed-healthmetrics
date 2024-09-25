<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'milestone_id',
        'title',
        'description',
        'target_date',
        'is_completed',
    ];

    public function milestone()
    {
        return $this->belongsTo(Milestone::class);
    }
}
