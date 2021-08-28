<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'qty',
        'total_price',
    ];

    protected $appends = [
        'items_count'
    ];

    public function getItemsCountAttribute()
    {
        return Cart::where('user_id', auth()->id)->count();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
