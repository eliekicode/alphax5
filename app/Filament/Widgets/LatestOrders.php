<?php

namespace App\Filament\Widgets;

use App\Enums\Trade\TradeType;
use App\Models\Trade;
use App\ValueObjects\Money;
use Filament\Facades\Filament;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

class LatestOrders extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->heading("")
            ->query($this->getTableQuery())
            ->columns([
                Tables\Columns\TextColumn::make('symbol'),
                Tables\Columns\TextColumn::make('open_price'),
                Tables\Columns\TextColumn::make('close_price'),
                Tables\Columns\TextColumn::make('profit')
                    ->formatStateUsing(fn(?Trade $record) => Money::from($record->profit * 100, $record->account->currency)->formatted)
                    ->label('Profit/Loss'),
                Tables\Columns\TextColumn::make('type')
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Closed at')
                    ->dateTime(),
            ])
            ->actions([

            ])
            ->filters([
            ]);
    }

    protected function getTableQuery(): Builder|Relation|null
    {
        return Trade::query()
            ->latest()
            ->whereBelongsTo(Filament::getTenant());
    }

}
