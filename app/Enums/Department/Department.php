<?php

namespace App\Enums\Department;

use Filament\Support\Contracts\HasLabel;

enum Department: string implements HasLabel
{
    case RETENTION = 'retention';
    case SALE = 'sale';
    case RECOVERY = 'recovery';

    public function getLabel(): ?string
    {
        return ucfirst($this->value);
    }
}
