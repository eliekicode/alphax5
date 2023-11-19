<?php

namespace App\Filament\Pages;

use App\Filament\Resources\TradeResource\Widgets\TradingHistoryWidget;
use App\Filament\Resources\TradeResource\Widgets\TradingNewsWidget;
use App\Filament\Resources\TradeResource\Widgets\TradingViewWidget;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;

class Trade extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.trade';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function getHeader(): ?View
    {
        return null;
    }

    protected function getHeaderWidgets(): array
    {
        return [
//            TradingNewsWidget::class,
//            TradingViewWidget::class,
//            TradingHistoryWidget::class
        ];
    }

    public function getHeading(): string|Htmlable
    {
        return "Trading AI";
    }

    public function getHeaderWidgetsColumns(): int | array
    {
        return 12;
    }
}
