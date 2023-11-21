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
    protected function getColumns(): int
    {
        return 4;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Balance', $this->getBalance())
                ->extraAttributes([
                    'class' => 'balance__widget'
                ])
                ->icon('heroicon-o-banknotes'),
            Stat::make('Deposit', $this->getDepositsTotal()
            )
                ->extraAttributes([
                    'class' => 'deposit__widget'
                ])
                ->icon('heroicon-o-arrow-trending-up'),
            Stat::make('Bonus', $this->getBonusesTotal())
                ->icon('heroicon-o-arrow-trending-down'),
            Stat::make('Withdraw', $this->getWithdrawsTotal())
                ->extraAttributes([
                    'class' => 'withdraw__widget'
                ])
                ->icon('heroicon-o-arrow-trending-down'),
            Stat::make('Profit/Loss', $this->getProfitsTotal())
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
        return "-" . Money::from(cent: $this->getAccount()->withdraws_total_amount, currency: $this->getAccount()->currency)->formatted;
    }


    private function getProfitsTotal(): string
    {
        return Money::from(cent: $this->getAccount()->trades()->sum('profit') * 100, currency: $this->getAccount()->currency)->formatted;
    }

    private function getBonusesTotal(): string
    {
//        bonusesTotalAmount
        return Money::from(cent: $this->getAccount()->bonuses_total_amount, currency: $this->getAccount()->currency)->formatted;
    }

    private function getAccount(): Account|Model|null
    {
        return Filament::getTenant()->load('currency');
    }
}
