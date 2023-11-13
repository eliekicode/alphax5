<?php

namespace App\Enums\Transaction;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum TransactionStatus: string implements HasLabel, HasColor
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case SUCCEED = 'succeed';
    case REJECTED = 'rejected';

    public function getColor(): string|array|null
    {
        return match ($this->value) {
            self::PENDING->value => 'warning',
            self::APPROVED->value => 'primary',
            self::SUCCEED->value => 'success',
            self::REJECTED->value => 'danger',
        };
    }

    public function getLabel(): ?string
    {
        return ucfirst($this->value);
    }
}
