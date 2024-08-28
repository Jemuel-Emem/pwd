<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirements extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'medical_certification',
        'brgy_certification',
        'birth_certificate',
        'whole_body_picture',
        'id_picture'
    ];
}
