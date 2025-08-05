<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable = [
        'quantity',
        'line_total',
        'invoice_id',
        'product_id',
    ];
}
