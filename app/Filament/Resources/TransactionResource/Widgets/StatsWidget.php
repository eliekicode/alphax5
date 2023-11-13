<?php

namespace App\Filament\Resources\TransactionResource\Widgets;

use App\Filament\Resources\TransactionResource\Pages\ListTransactions;
use App\Models\Account;
use App\ValueObjects\Money;
use Filament\Facades\Filament;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Model;

class StatsWidget extends BaseWidget
{
    use InteractsWithPageTable;

    protected function getTablePage(): string
    {
        return ListTransactions::class;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Deposit', $this->getDepositsTotalAmount())
                ->icon('heroicon-o-arrow-trending-up'),
            Stat::make('Withdraw', $this->getWithdrawsTotalAmount())
                ->icon('heroicon-o-arrow-trending-down'),
        ];
    }

    private function getDepositsTotalAmount(): string
    {
        return Money::from(
            $this->getPageTableQuery()
                ->deposit()
                ->approved()
                ->sum('amount'),
            $this->getAccount()->currency
        )->formatted;
    }

    private function getWithdrawsTotalAmount(): string
    {
        return Money::from(
            $this->getPageTableQuery()
                ->withdraw()
                ->approved()
                ->sum('amount'),
            $this->getAccount()->currency
        )->formatted;
    }

    private function getAccount(): Account|Model|null
    {
        return Filament::getTenant()->load('currency');
    }
}
