<?php

namespace App\Filament\Widgets;

use App\Models\Account;
use App\ValueObjects\Money;
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Model;

class BalanceWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Balance', $this->getBalance())
                ->icon('heroicon-o-banknotes'),
            Stat::make('Deposit', $this->getDepositsTotal()
            )
                ->icon('heroicon-o-arrow-trending-up'),
            Stat::make('Withdraw', $this->getWithdrawsTotal())
                ->icon('heroicon-o-arrow-trending-down'),
        ];
    }

    private function getBalance(): string
    {

        $account = $this->getAccount();

        return $account->balance->formatted;
    }

    private function getDepositsTotal(): string
    {
        return Money::from(cent: $this->getAccount()->deposits_total_amount, currency: $this->getAccount()->currency)->formatted;
    }

    private function getWithdrawsTotal(): string
    {
        return Money::from(cent: $this->getAccount()->withdraws_total_amount, currency: $this->getAccount()->currency)->formatted;
    }

    private function getAccount(): Account|Model|null
    {
        return Filament::getTenant()->load('currency');
    }
}
