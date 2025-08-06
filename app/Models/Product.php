<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'merk_id',
        'category_id',
    ];
    public function merk(): BelongsTo {
        return $this->belongsTo(Merk::class,'id_merk');
    }
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class,'id_category');
    }
    public function invoiceDetail(): HasOne {
        return $this->hasOne(InvoiceDetail::class,'id_detail_invoice');
    }
}
