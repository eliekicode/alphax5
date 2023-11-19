<?php

namespace App\Filament\Resources\TradeResource\Widgets;

use Filament\Widgets\Widget;

class TradingViewWidget extends Widget
{
    protected static string $view = 'filament.resources.trade-resource.widgets.trading-view-widget';

    protected int | string | array $columnSpan = 6;
}
