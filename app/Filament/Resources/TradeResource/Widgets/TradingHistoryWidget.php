<?php

namespace App\Filament\Resources\TradeResource\Widgets;

use Filament\Widgets\Widget;

class TradingHistoryWidget extends Widget
{
    protected static string $view = 'filament.resources.trade-resource.widgets.trading-history-widget';

    protected int | string | array $columnSpan = 3;
}
