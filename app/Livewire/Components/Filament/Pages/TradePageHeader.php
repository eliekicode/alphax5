<?php

namespace App\Livewire\Components\Filament\Pages;

use App\Actions\Transaction\CreateTransaction;
use App\Enums\Transaction\TransactionType;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Support\Enums\ActionSize;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TradePageHeader extends Component
{
    public function getDepositAction()
    {
        return Action::make('deposit')
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
            ->modalHeading("Request to make a deposit");
    }

    public function render(): View
    {
        return view('livewire.components.filament.pages.trade-page-header');
    }
}
