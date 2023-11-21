<?php

namespace App\Filament\Widgets;

use App\Models\Bonus;
use Filament\Facades\Filament;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

class LatestBonuses extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                $this->getTableQuery()
            )
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Awarded at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('currency.code')
                    ->formatStateUsing(fn($state) => strtoupper($state)),
            ]);
    }

    public function getTableQuery(): Relation|Builder|null
    {
        return Bonus::query()
            ->whereBelongsTo(Filament::getTenant());
    }
}
