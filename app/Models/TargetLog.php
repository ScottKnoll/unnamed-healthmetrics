<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'target_parameter_id',
        'log_date',
        'completed_value',
    ];

    protected $casts = [
        'log_date' => 'date',
    ];

    public function targetParameter()
    {
        return $this->belongsTo(TargetParameter::class);
    }
}
