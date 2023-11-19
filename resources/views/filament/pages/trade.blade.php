<x-filament-panels::page>

    <div class="page__container">

        <div class="top__stories" x-data="{open:false}" x-bind:class="">
            <nav class="">
                <ul>
                    <li>
                        <button x-on:click="alert('Open : '+ open)">News</button>
                    </li>
                </ul>
            </nav>
            <div class="">

            </div>
        </div>

        <div id="chart" class="chart__widget" wire:ignore>
            <h1>Chart</h1>

            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, blanditiis corporis debitis
            dignissimos, distinctio et illum ipsam laboriosam magnam neque nisi nulla porro quod reprehenderit tempore
            vel voluptas voluptate voluptatibus.
        </div>

        <div class="history">

        </div>
    </div>

    {{--    <!-- TradingView Widget BEGIN -->--}}
    {{--    <div class="tradingview-widget-container">--}}
    {{--        <div class="tradingview-widget-container__widget"></div>--}}
    {{--        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>--}}

    {{--    </div>--}}
    {{--    <!-- TradingView Widget END -->--}}

    {{--    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>--}}
    {{--        {--}}
    {{--            "feedMode": "all_symbols",--}}
    {{--            "colorTheme": "light",--}}
    {{--            "isTransparent": false,--}}
    {{--            "displayMode": "regular",--}}
    {{--            "width": 480,--}}
    {{--            "height": 830,--}}
    {{--            "locale": "en"--}}
    {{--        }--}}
    {{--    </script>--}}

    <script src="https://s3.tradingview.com/tv.js"></script>
{{--    <script src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js"></script>--}}
    <script>
        new TradingView.widget({
            autosize: true,
            symbol: "BINANCE:BTCUSDT",
            interval: "240",
            timezone: "Etc/Utc",
            theme: "dark",
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

    <script src="https://s3.tradingview.com/tv.js"></script>

    {{--    <style>--}}
    {{--        #chart{--}}
    {{--            width: 100%;--}}
    {{--            height: 800px;--}}
    {{--        }--}}
    {{--    </style>--}}

    <style>
        .page__container {
            height: 100vh;
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            column-gap: 60px;
        }

        .chart__widget {
            grid-column-start: span 10;
            height:650px;
            background-color: red;
        }

        #chart{
            background-color: orangered;
        }

        .top__stories,
        .history {
            grid-column-start: span 1;
        }

    </style>
</x-filament-panels::page>

