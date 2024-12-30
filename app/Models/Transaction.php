<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return Carbon::parse($date)->locale('id')->isoFormat('D MMMM Y H:mm:ss');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction_detail(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
