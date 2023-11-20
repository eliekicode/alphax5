<?php

namespace App\Actions\Transaction;

use App\Enums\Transaction\TransactionType;
use App\Models\Account;
use App\Models\Currency;
use App\Models\Series;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;

class CreateTransaction
{
    public function execute(array $data, ?Account $account, TransactionType $transactionType): void
    {
        dd($transactionType, $data['amount'], $account->balance);

        if ($account->transactions()->pending()->exists()) {

            Notification::make()
                ->danger()
                ->title("You have a pending transaction, so the operation can't go on.")
                ->send();

            return;

        } elseif ($transactionType === TransactionType::WITHDRAW && $data['amount'] >= $account->balance) {

            Notification::make()
                ->danger()
                ->title("You can't withdraw {$data['amount']} from {$account->balance}")
                ->send();

            return;
        }

        $account->transactions()->create([
            'series_id' => Series::select('id')
                ->where('prefix', config('transactionSettings.availableTransactionSeries'))
                ->first()
                ->id,
            'amount' => $data['amount'],
            'user_id' => auth()->id(),
            'type' => $transactionType->value,
            'currency_id' => Currency::select('id')->where('code', 'eur')->first()->id,
            'crypto_id' => $data['crypto_id'],
            'wallet_id' => $data['wallet_id'],
        ]);

        Notification::make()
            ->success()
            ->title("Transaction created successfully")
            ->send();

        $account->load(
            'accountUser.lead.owner',
            'accountUser.lead.team.user',
            'accountUser.lead.department.user',
        );

        $recipients = [
            $account->accountUser->lead?->owner,
            $account->accountUser->lead?->team?->user,
            $account->accountUser->lead?->department?->user,
        ];

        Notification::make()
            ->success()
            ->title("Request to make a deposit")
            ->body("{$account->accountUser->lead->name} would like to make a deposit of an amount of {$data['amount']}")
            ->sendToDatabase($recipients)
            ->broadcast($recipients);
    }
}
