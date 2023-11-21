<?php

namespace App\Filament\Pages;

use App\Actions\Transaction\CreateTransaction;
use App\Enums\Transaction\TransactionType;
use App\Filament\Resources\TradeResource\Widgets\TradingHistoryWidget;
use App\Filament\Resources\TradeResource\Widgets\TradingNewsWidget;
use App\Filament\Resources\TradeResource\Widgets\TradingViewWidget;
use App\Models\Currency;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Support\Enums\ActionSize;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;

class Trade extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.trade';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
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

    public function getHeader(): ?View
    {
        return null;
    }

    protected function getHeaderWidgets(): array
    {
        return [
//            TradingNewsWidget::class,
//            TradingViewWidget::class,
//            TradingHistoryWidget::class
        ];
    }

    public function getHeading(): string|Htmlable
    {
        return "Trading AI";
    }

    public function getHeaderWidgetsColumns(): int | array
    {
        return 12;
    }
}
