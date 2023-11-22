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

class LatestTrades extends BaseWidget
{
    protected int | string | array $columnSpan = 1;
    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                Tables\Columns\TextColumn::make('symbol')
                    ->searchable(),
                Tables\Columns\TextColumn::make('open_price')
                    ->sortable(),
                Tables\Columns\TextColumn::make('close_price')
                    ->sortable(),
                Tables\Columns\TextColumn::make('profit')
                    ->formatStateUsing(fn(?Trade $record) => Money::from($record->profit * 100, $record->account->currency)->formatted)
                    ->label('Profit/Loss'),
                Tables\Columns\TextColumn::make('type')
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->actions([
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('By type')
                    ->options(TradeType::class),
//                Tables\Filters\Filter::make('is_profit')
//                    ->modifyQueryUsing(fn() => $this->getTableQuery()->whereNull('loss')),
//                Tables\Filters\Filter::make('is_loss')
//                    ->modifyQueryUsing(fn() => $this->getTableQuery()->whereNull('profit')),
            ]);
    }

    protected function getTableQuery(): Builder|Relation|null
    {
        return Trade::query()
            ->latest()
            ->whereBelongsTo(Filament::getTenant());
    }

}
