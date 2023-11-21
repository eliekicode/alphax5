<?php

namespace App\Filament\Pages;

use App\Actions\Transaction\CreateTransaction;
use App\Enums\Transaction\TransactionType;
use App\Filament\Resources\TradeResource;
use App\Filament\Widgets\BalanceWidget;
use App\Filament\Widgets\LatestBonuses;
use App\Filament\Widgets\LatestTrades;
use App\Filament\Widgets\LatestTransactions;
use App\Models\Currency;
use App\Models\Series;
use App\Models\Transaction;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Facades\Filament;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Support\Enums\ActionSize;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $title = 'Home';

    public function getSubheading(): ?string
    {
        return "Welcome " . auth()->user()->name;
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('deposit')
                ->outlined()
                ->icon('fas-plus')
                ->size(ActionSize::ExtraLarge)
                ->color('success')
                ->form([
                    TextInput::make('amount')
                        ->suffixIcon('fas-euro-sign')
                        ->required()
                        ->numeric(),
                ])
                ->action(function (array $data, CreateTransaction $createTransaction) {
                    $createTransaction->execute($data, Filament::getTenant(), TransactionType::DEPOSIT);
                })
                ->modalHeading("Request to make a deposit"),
            Action::make('withdraw')
                ->icon('fas-minus')
                ->size(ActionSize::ExtraLarge)
                ->color('danger')
                ->form($this->getCreateTransactionFormFields())
                ->action(function (array $data, CreateTransaction $createTransaction) {
                    $createTransaction->execute($data, Filament::getTenant(), TransactionType::WITHDRAW);
                }),
            Action::make('trade')
                ->outlined()
                ->icon('fas-robot')
                ->color('primary')
                ->size(ActionSize::ExtraLarge)
                ->url(Filament::getUrl(Filament::getTenant()) . '/trade')
        ];
    }

    private function getCreateTransactionFormFields(): array
    {
        return [
            Group::make()
                ->columns(2)
                ->schema([
                    TextInput::make('amount')
                        ->suffixIcon('fas-euro-sign')
                        ->required()
                        ->numeric(),

                    Select::make('crypto_id')
                        ->suffixIcon('fas-coins')
                        ->label('Crypto')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options(Currency::query()->pluck('code', 'id')),
                ]),

            TextInput::make('wallet_id')
                ->suffixIcon('fas-wallet')
                ->required(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
//            BalanceWidget::class,
        ];
    }

    public function getWidgets(): array
    {
        return [
            BalanceWidget::class,
            LatestTransactions::class,
            LatestTrades::class,
        ];
    }

    public function getColumns(): int|string|array
    {
        return [
            'xl' => 2
        ];
    }

    public function getHeaderWidgetsColumns(): int|string|array
    {
        return [
            'xl' => 4
        ];
    }
}
