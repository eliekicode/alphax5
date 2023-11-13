<?php

namespace App\ValueObjects;

use App\Models\Currency;

readonly class Money
{
    public int $cent;

    public ?Currency $currency;
    public float $concrete;

    public string $formatted;

    public function __construct(int $cent, ?Currency $currency = null)
    {
        $this->cent = $cent;

        $this->currency = $currency;

        $this->concrete = $this->cent / 100;

        $this->formatted = $this->currency?->symbol . number_format($this->concrete, 2);
    }

    public static function from(int $cent, ?Currency $currency = null): Money
    {
        return new self(
            cent: $cent,
            currency: $currency
        );
    }
}
