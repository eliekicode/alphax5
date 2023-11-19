<?php

namespace App\Models;

use App\Casts\MoneyCast;
use App\Enums\Account\AccountStatus;
use App\Enums\Transaction\TransactionStatus;
use App\Enums\Transaction\TransactionType;
use Filament\Models\Contracts\HasCurrentTenantLabel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Account extends Model implements HasCurrentTenantLabel
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => AccountStatus::class,
        'balance' => MoneyCast::class,
        'depositsTotalAmount' => MoneyCast::class,
        'withdrawsTotalAmount' => MoneyCast::class,
    ];

    public function bonusesTotalAmount(): Attribute
    {
        return Attribute::make(
            get: fn(): int => $this->bonuses()->depositsTotalAmount()->sum('amount')
        );
    }

    public function depositsTotalAmount(): Attribute
    {
        return Attribute::make(
            get: fn(): int => $this->transactions()->depositsTotalAmount()->sum('amount')
        );
    }

    public function withdrawsTotalAmount(): Attribute
    {
        return Attribute::make(
            get: fn(): int => $this->transactions()->withdrawsTotalAmount()->sum('amount')
        );
    }

    public function profitsTotalAmount(): Attribute
    {
        return Attribute::make(
            get: fn(): int => $this->profitTrades()->sum('profit')
        );
    }

    public function lossesTotalAmount(): Attribute
    {
        return Attribute::make(
            get: fn(): int => $this->lossTrades()->sum('loss')
        );
    }


    public function balance(): Attribute
    {
        return Attribute::make(
            set: fn($value) => $value * 100
        );
    }

    public function accountUser(): HasOne
    {
        return $this->hasOne(AccountUser::class)->latestOfMany();
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function name(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->serial
        );
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function trades(): HasMany
    {
        return $this->hasMany(Trade::class);
    }

    public function bonuses(): HasMany
    {
        return $this->hasMany(Bonus::class);
    }

    public function pendingTransactions(): HasMany
    {
        return $this->transactions()->where('status', TransactionStatus::PENDING->value);
    }

    public function approvedTransaction(): HasMany
    {
        return $this->transactions()->where('status', TransactionStatus::APPROVED->value);
    }

    public function succeedTransaction(): HasMany
    {
        return $this->transactions()->where('status', TransactionStatus::SUCCEED->value);
    }

    public function canceledTransaction(): HasMany
    {
        return $this->transactions()->where('status', TransactionStatus::REJECTED->value);
    }

    public function profitTrades(): HasMany
    {
        return $this->trades()->whereNull('loss');
    }

    public function lossTrades(): HasMany
    {
        return $this->trades()->whereNull('profit');
    }

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function getCurrentTenantLabel(): string
    {
        return 'Active account';
    }
}
