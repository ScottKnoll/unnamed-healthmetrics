<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function targetParameters()
    {
        return $this->hasMany(TargetParameter::class);
    }
}
