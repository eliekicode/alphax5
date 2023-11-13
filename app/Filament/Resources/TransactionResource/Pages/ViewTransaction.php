<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use App\ValueObjects\Money;
use Filament\Actions;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewTransaction extends ViewRecord
{
    protected static string $resource = TransactionResource::class;

    /**
     * @return string|Htmlable
     */
    public function getHeading(): string|Htmlable
    {
        return $this->record->serial;
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Group::make()
                ->schema([
                    Section::make('Transaction detail')
                        ->columns()
                        ->schema([
                            TextEntry::make('serial')
                                ->label('ID'),
                            TextEntry::make('amount')
                            ->money(),
                            TextEntry::make('account.serial')
                                ->label('Account'),
                        ])
                ])->columnSpan(2),
            Group::make()
                ->schema([
                    Section::make('Status')
                        ->schema([
                            TextEntry::make('status')
                                ->badge(),
                            TextEntry::make('created_at')
                                ->badge(),
                        ])
                ])
        ])->columns(3);
    }
}
