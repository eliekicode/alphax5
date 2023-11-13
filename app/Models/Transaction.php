<?php

namespace App\Models;

use App\Casts\MoneyCast;
use App\Enums\Transaction\TransactionStatus;
use App\Enums\Transaction\TransactionType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'type' => TransactionType::class,
        'status' => TransactionStatus::class,
    ];

    public function amount(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value / 100,
            set: fn($value) => $value * 100
        );
    }

    public function noFormattedAmount(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->attributes['amount']
        );
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if ($model->series) {
                $model->serial_number = Transaction::where('series_id', $model->series_id)->max('serial_number') + 1;
                $model->serial = $model->series->prefix . '-' . str_pad($model->serial_number, 5, '0', STR_PAD_LEFT);
            }
        });
    }


    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function scopeSucceed(Builder $query): void
    {
        $query->where('status', TransactionStatus::SUCCEED->value);
    }

    public function scopeApproved(Builder $query): void
    {
        $query->where('status', TransactionStatus::APPROVED->value);
    }

    public function scopeCanceled(Builder $query): void
    {
        $query->where('status', TransactionStatus::REJECTED->value);
    }

    public function scopePending(Builder $query): void
    {
        $query->where('status', TransactionStatus::PENDING->value);
    }

    public function scopeDeposit(Builder $query): void
    {
        $query->where('type', TransactionType::DEPOSIT->value);
    }

    public function scopeWithdraw(Builder $query): void
    {
        $query->where('type', TransactionType::WITHDRAW->value);
    }

    public function scopeDepositsTotalAmount(Builder $query): Builder
    {
        return $query->where('type', TransactionType::DEPOSIT->value)
            ->where('status', TransactionStatus::APPROVED->value);
    }

    public function scopeWithdrawsTotalAmount(Builder $query): Builder
    {
        return $query->where('type', TransactionType::WITHDRAW->value)
            ->where('status', TransactionStatus::APPROVED->value);
    }
}
