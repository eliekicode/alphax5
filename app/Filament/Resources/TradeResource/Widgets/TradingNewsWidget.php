<?php

namespace App\Filament\Resources\TradeResource\Widgets;

use Filament\Widgets\Widget;

class TradingNewsWidget extends Widget
{
    protected static string $view = 'filament.resources.trade-resource.widgets.trading-news-widget';

    protected int | string | array $columnSpan = 3;
}
