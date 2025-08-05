<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_date',
        'status',
        'total_amount',
        'user_id',
        'payment_id',
    ];
}
