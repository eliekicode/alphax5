<?php

namespace App\Enums\Trade;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use function Laravel\Prompts\select;

enum TradeType: string implements HasLabel, HasColor
{

    case BUY = 'buy';
    case SELL = 'sell';

    public function getColor(): string|array|null
    {
        return match ($this->value) {
            self::BUY->value => 'success',
            self::SELL->value => 'danger'
        };
    }

    public function getLabel(): ?string
    {
        return ucfirst($this->value);
    }
}
