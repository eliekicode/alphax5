<?php

namespace App\Enums\Account;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum AccountStatus: string implements HasLabel, HasColor
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case BLOCKED = 'blocked';

    public function getColor(): string|array|null
    {
        return match ($this->value) {
            self::ACTIVE->value => 'success',
            self::INACTIVE->value => 'warning',
            self::BLOCKED->value => 'danger'
        };
    }

    public function getLabel(): ?string
    {
        return ucfirst($this->value);
    }
}
