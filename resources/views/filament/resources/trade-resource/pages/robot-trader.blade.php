<x-filament-panels::page>

    <div class="grid grid-cols-3">
        <div class="tradingview-widget-container col-span-2">
            <div id="chart"></div>
            <div class="tradingview-widget-copyright">
                <a
                    href="https://www.tradingview.com/"
                    rel="noopener nofollow"
                    target="_blank"
                >
                    <span class="blue-text"> Track all markets on Tradingview </span>
                </a>
            </div>
        </div>
        <div class="sidebar">
            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid blanditiis cumque, cupiditate
                deleniti dignissimos ea hic illo inventore laudantium magnam molestiae nesciunt officia officiis
                possimus quis reprehenderit similique vitae.
            </div>
            <div>Adipisci incidunt nihil numquam obcaecati officia praesentium quae tenetur! Autem debitis dolore hic
                incidunt ipsam libero magnam minima nihil nostrum, odit porro, praesentium quod quos saepe sint sunt
                totam ullam!
            </div>
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
        #chart{
            width: 100%;
            height: 100vh;
        }
    </style>

</x-filament-panels::page>
