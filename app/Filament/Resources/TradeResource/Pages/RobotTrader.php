<?php

namespace App\Filament\Resources\TradeResource\Pages;

use App\Filament\Resources\TradeResource;
use App\Filament\Widgets\BalanceWidget;
use App\Filament\Widgets\LatestTrades;
use App\Filament\Widgets\LatestTransactions;
use Filament\Resources\Pages\Page;

class RobotTrader extends Page
{
    protected static string $resource = TradeResource::class;

    protected static string $view = 'filament.resources.trade-resource.pages.robot-trader';

    public function getHeaderWidgets(): array
    {
        return [
//            TradeResource\Widgets\TradingNewsWidget::class,
//            TradeResource\Widgets\TradingViewWidget::class,
//            TradeResource\Widgets\TradingHistoryWidget::class
        ];
    }
}
