<?php

namespace App\Filament\Resources\TradeResource\Pages;

use App\Filament\Resources\TradeResource;
use Filament\Resources\Pages\Page;

class Trade extends Page
{
    protected static string $resource = TradeResource::class;

    protected static string $view = 'filament.resources.trade-resource.pages.trade';
}
