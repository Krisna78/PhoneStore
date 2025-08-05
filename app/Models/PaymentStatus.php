<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    protected $fillable = [
        'status_name',
        'description'
    ];
}
