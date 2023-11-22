<x-filament-panels::page>

    <div class="page__container">
        <div id="chart" class="chart__widget" wire:ignore>

        </div>
    </div>

    <script src="https://s3.tradingview.com/tv.js"></script>
    <script>
        new TradingView.widget({
            autosize: true,
            symbol: "BINANCE:BTCUSDT",
            interval: "240",
            timezone: "Etc/Utc",
            theme: "light",
            style: "1",
            locale: "en",
            toolbar_bg: "#f1f3f6",
            enable_publishing: false,
            withdateranges: true,
            hide_side_toolbar: false,
            allow_symbol_change: true,
            watchlist: ["BINANCE:BTCUSDT", "BINANCE:ETHUSDT"],
            details: true,
            hotlist: true,
            calendar: true,
            studies: ["STD;SMA"],
            container_id: "chart",
            show_popup_button: true,
            popup_width: "1000",
            popup_height: "650",
        });
    </script>

    <style>
        /*.page__container {*/
        /*    height: 100%;*/
        /*    display: grid;*/
        /*    grid-template-columns: repeat(12, 1fr);*/
        /*    column-gap: 60px;*/
        /*}*/

        .chart__widget {
            grid-column-start: span 10;
            height: 700px;
        }

        /*#chart{*/
        /*    background-color: orangered;*/
        /*}*/

        /*.top__stories,*/
        /*.history {*/
        /*    grid-column-start: span 1;*/
        /*}*/

        /*.top__stories{*/
        /*    max-height: 100%;*/
        /*}*/

        /*.sidebar{*/
        /*    !*position: fixed;*!*/
        /*    background-color: rgba(0,0,0,0.2);*/
        /*    max-height: 100vh;*/
        /*}*/

    </style>
</x-filament-panels::page>

