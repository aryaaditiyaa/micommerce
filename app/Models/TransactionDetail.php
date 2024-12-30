<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'product_id',
        'qty',
        'total_price',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
