<?php

namespace App\Filament\Widgets;

use App\Enums\Trade\TradeType;
use App\Models\Trade;
use Filament\Facades\Filament;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

class LatestTrades extends BaseWidget
{
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
                    ->label('Profit/Loss')
                    ->sortable(),
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
