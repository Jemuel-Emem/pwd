<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class benefits extends Model
{
    use HasFactory;
    protected $fillable = [
        'particular',
        'quantity',

    ];

    protected $table = 'benefits';

    public function beneficiaries()
    {
        return $this->belongsToMany(benefeciaries::class, 'beneficiary_benefit', 'benefit_id', 'beneficiary_id')
                    ->withTimestamps();
    }

    public function personalInfos()
{
    return $this->hasMany(\App\Models\Personalinfo::class, 'benefit_id');
}

}
