<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personalinfo extends Model
{
    use HasFactory;
    protected $fillable = [
        // Personal Information
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'sex',
        'date_of_birth',
        'age',
        'civil_status',
        'contact_number',
        'address',
        'barangay',
        'type_of_disability',
        'cause_of_disability',

        // Guardian Information
        'g_first_name',
        'g_middle_name',
        'g_last_name',
        'g_suffix',
        'g_sex',
        'g_date_of_birth',
        'g_age',
        'g_civil_status',
        'g_contact_number',
        'g_address',
        'relationship_with_pwd',
        'status',
        'benefit_id',
    ];
}
