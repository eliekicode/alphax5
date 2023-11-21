<?php

namespace App\Filament\Widgets;

use App\Enums\Trade\TradeType;
use App\Enums\Transaction\TransactionStatus;
use App\Enums\Transaction\TransactionType;
use App\Models\Trade;
use App\Models\Transaction;
use Filament\Facades\Filament;
use Filament\Resources\Components\Tab;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

class LatestTransactions extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                $this->getTableQuery()
            )
            ->columns([
                TextColumn::make('amount'),
                TextColumn::make('currency.symbol'),
                TextColumn::make('type')
                    ->badge(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('By type')
                    ->options(TransactionType::class),
                Tables\Filters\SelectFilter::make('status')
                    ->label('By status')
                    ->options(TransactionStatus::class),
            ])
            ->striped();
    }

    protected function getTableQuery(): Builder|Relation|null
    {
        return Transaction::query()
            ->latest()
            ->whereBelongsTo(Filament::getTenant());
    }
}
