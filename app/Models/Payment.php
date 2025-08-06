<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    protected $fillable = [
        'payment_amount',
        'payment_date',
        'status_id',
        'method_id',
    ];
    public function invoice(): HasOne {
        return $this->hasOne(Invoice::class,'id_invoice');
    }
}
