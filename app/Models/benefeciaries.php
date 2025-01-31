<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class benefeciaries extends Model
{
    use HasFactory;

    protected $fillable = [
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
        'applicantstatus',
    ];
    protected $table = 'benefeciaries';


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function benefit()
{
    return $this->belongsTo(\App\Models\benefits::class, 'benefit_id');
}

}
