<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_date',
        'status',
        'total_amount',
        'user_id',
        'payment_id',
    ];
    public function user(): BelongsTo {
        return $this->belongsTo(User::class,'id_user');
    }
    public function payment(): BelongsTo {
        return $this->belongsTo(Payment::class,'id_payment');
    }
    public function invoiceDetail(): HasMany {
        return $this->hasMany(InvoiceDetail::class,'id_detail_invoice');
    }
}
