<?php

namespace App\Models;

use App\Enums\Trade\TradeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trade extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => TradeType::class
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
