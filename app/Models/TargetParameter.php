<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetParameter extends Model
{
    use HasFactory;

    protected $fillable = [
        'goal_id',
        'target_type_id',
        'name',
        'target_value',
        'frequency',
    ];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    public function targetLogs()
    {
        return $this->hasMany(TargetLog::class);
    }

    public function targetType()
    {
        return $this->belongsTo(TargetType::class);
    }
}
