<x-filament-widgets::widget>
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <div class="tradingview-widget-copyright">
            <a
                href="https://www.tradingview.com/"
                rel="noopener nofollow"
                target="_blank"
            ><span class="blue-text">Track all markets on TradingView</span></a
            >
        </div>
        <script
            type="text/javascript"
            src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js"
            async
        >
            {
                "feedMode": "all_symbols",
                "colorTheme": "light",
                "isTransparent": true,
                "displayMode": "regular",
                "width": "480",
                "height": "450",
                "locale": "en"
            }
        </script>
    </div>
    <!-- TradingView Widget END -->
</x-filament-widgets::widget>
