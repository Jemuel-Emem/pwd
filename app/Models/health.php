<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class health extends Model
{
    use HasFactory;

    protected $fillable = [
        'blood_pressure',
        'blood_type',
        'weight',
        'height',
        'respiratory_rate',
        'pulse_rate',
        'o2_stat',
        'temperature',
        'other_conditions',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
