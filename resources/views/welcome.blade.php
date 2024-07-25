<x-layouts.app>
    <div class="hero">
        <div class="container">
            <div class="hero__wrapper">
                <div class="hero__left">
                    <header class="hero__header">
                        <h1 class="hero__heading">
                            Trade responsively, while learning and growing alongside us.
                        </h1>
                    </header>
                    <div class="hero__text">
                        <p>
                            More than just a platform, <strong>{{ config('app.name') }}</strong> is where professional
                            traders call home.
                            <br>
                            Our dedication to improving your trading experience is unwavering, regardless of your level
                            of experience.
                        </p>

                        <p>
                            You won't have to worry about managing your finances because our robot advisor will do it
                            for you.
                        </p>
                        <p>
                            Recognize the markets, <strong>trade with assurance</strong>.
                        </p>

                    </div>
                    <div class="hero__cta">
                        <a class="get-started-action lg" href="/user/register">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/>
                            </svg>

                            <span>Get started</span>
                        </a>
                    </div>
                </div>
                <div class="hero__right">
                    <x-trading-view-marker-widget/>
                </div>
            </div>
            <x-trading-view-tape-widget/>
        </div>
    </div>
    <x-home.why-us-section/>
    <x-home.goals-section/>
    <x-home.account-section/>

    <footer class="pt-7 bg-blue600/90 footer">
        <div class="container">
            <div class="footer__grid">
                <div class="footer__contact">
                    <h4 class="footer__title">{{ config('app.name') }}</h4>
                    <p class="footer__contact-email">
                        Contact: alphax5@gmail.com
                    </p>
                </div>
                <div class="footer__market">
                    <h4 class="footer__title">CFD Trading</h4>
                    <ul class="footer__market-list">
                        <li>Forex</li>
                        <li>Stocks</li>
                        <li>Indices</li>
                    </ul>
                </div>
            </div>
            <div class="footer__copyright">
                Copyright © 2018 - 2024 {{ config('app.name') }}, All rights reserved.
            </div>
        </div>
    </footer>

</x-layouts.app>
