<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class beneficiary_benefit extends Model
{
    //

    protected $table = 'beneficiary_benefit';

    protected $fillable = [
        'beneficiary_id',
        'benefit_id',
    ];

}
