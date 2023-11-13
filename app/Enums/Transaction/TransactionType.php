<?php

namespace App\Enums\Transaction;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum TransactionType: string implements HasColor, HasLabel
{
    case DEPOSIT = 'deposit';
    case WITHDRAW = 'withdraw';

    public function getColor(): string|array|null
    {
        return match ($this->value) {
            self::DEPOSIT->value => 'success',
            self::WITHDRAW->value => 'danger'
        };
    }

    public function getLabel(): ?string
    {
        return ucfirst($this->value);
    }
}
