<x-layouts.app>
    <div class="app__layout">
        <header class="app__topbar">
            <div class="app__topbar-wrapper">
                <div class="app__topbar-logo">
                    Alphax5
                </div>
                <nav class="app__topbar-nav navbar">
                    <ul class="navbar__menu">
                        <li class="navbar__menu-item"><a href="/user/login">Login</a></li>
                        <li class="navbar__menu-item">
                            <a href="/user/register">Open an account</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <section class="app__hero">
            <div class="app__hero-wrapper">
                <div class="app__hero-left">
                    <h1 class="app__hero-heading">Trade Your Crypto on <strong>{{ config('app.name') }}</strong> with
                        Confidence</h1>
                    {{--                    <h1>Your new financial picture starts here</h1>--}}

                    <p class="app__hero-text">
                        Get financially prepared for whatever life throws your way with help from
                        <strong>{{ config('app.name') }}</strong>.
                    </p>

                    <div class="app__hero-action">
                        <a href="/user/register">Get started</a>
                    </div>

                </div>
                <div class="app__hero-right">
                    <img class="app__hero-image"
                         src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?q=80&w=3570&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                         alt="">
                </div>
            </div>
        </section>
        <section class="why_us section primary">
            <div class="section__wrapper">
                <header class="section__header">
                    <h1 class="section__heading text-center">Why choose <strong>{{ config('app.name') }}</strong>?</h1>
                </header>
                <div class="section__grid cols-3">
                    <article class="card white centered">
                        <span class="card__icon">
                            <img src="{{ asset('images/icons/no-money (1).png') }}" alt="">
                        </span>
                        <h3 class="card__heading">Affordable accounts</h3>
                        <p class="card__text">We put you first by charging no fees or minimums to open a retail
                            brokerage account3 to help you spend and save smarter.</p>
                    </article>
                    <article class="card white centered">
                        <span class="card__icon">
                            <img src="{{ asset('images/icons/trading_app-1.png') }}" alt="">
                        </span>
                        <h3 class="card__heading">Well made Trading Platforms</h3>
                        <p class="card__text">
                            Our customizable trading platforms let you manage your account and trade from your desktop,
                            iPad or mobile phone.
                        </p>
                    </article>
                    <article class="card white centered">
                        <span class="card__icon">
                            <img src="{{ asset('images/icons/customer-service.png') }}" alt="">
                        </span>
                        <h3 class="card__heading">We are here to help.</h3>
                        <p class="card__text">
                            Our customer support representatives are ready to assist you via phone and email.
                        </p>
                    </article>
                </div>
            </div>
        </section>
        <section class="solutions section gray">
            <div class="section__wrapper">
                <header class="section__header">
                    <h1 class="section__heading text-center">You have goals. We have solutions.</h1>
                </header>
                <div class="section__grid gap-y-8">
                    <article class="card card-cols-2">
                        <div class="card__image">
                            <img
                                src="https://images.unsplash.com/photo-1569025743873-ea3a9ade89f9?q=80&w=3570&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="">
                        </div>
                        <div class="card__body">
                            <header class="card__header">
                                <span class="card__subheading">Trading & investing</span>
                                <h3 class="card__heading">Invest the way you want to</h3>
                            </header>
                            <p class="card__text">Whether you are an active trader or investing in the future, we can
                                help you reach your goals.</p>
                            <div class="card__action">
                                <a href="/user/register">
                                    Get started
                                </a>
                            </div>
                        </div>
                    </article>
                    <article class="card card-cols-2">

                        <div class="card__body">
                            <header class="card__header">
                                <span class="card__subheading">Wealth Management</span>
                                <h3 class="card__heading">Work with a dedicated advisor</h3>
                            </header>
                            <p class="card__text">
                                We'll partner with you on a customized plan designed to help grow and protect your
                                wealth.
                            </p>
                            <div class="card__action">
                                <a href="/user/register">
                                    Get started
                                </a>
                            </div>
                        </div>
                        <div class="card__image">
                            <img
                                src="https://images.unsplash.com/photo-1423666523292-b458da343f6a?q=80&w=3574&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="">
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <section class="accounts__section section">
            <div class="section__wrapper">

                <header class="section__header">
                    <h1 class="section__heading">Get started with some of our most popular accounts</h1>
                    <p class="section__text">Whether you want to invest on your own, or have us do the work, we have account choices for you.
                        And <br>we’ve got tools and resources to help along the way.</p>
                </header>

                <div class="section__grid cols-3">
                    <article class="account__card card">
                        <header class="card__header">
                            <span class="card__icon">
                                <img src="{{ asset('images/icons/data-analysis.png') }}" alt="">
                            </span>
                            <h3 class="card__heading">Robo investing</h3>
                        </header>
                        <p class="card__text">
                            Our robot advisor will handle your investments, so you don’t have to. Automated investing
                            with no account minimums.
                        </p>
                        <div class="card__action">
                            <a href="/user/register">
                                Get started
                            </a>
                        </div>
                    </article>
                    <article class="account__timeline-container">
{{--                        <h3>How it works</h3>--}}
                        <ul class="account__timeline">
                            <li class="account__timeline-item">
                                <span class="account__timeline-step">1</span>
                                <div class="account__timeline-body">
                                    <h3 class="account__timeline-heading">Get started on
                                        <strong>{{ config('app.name') }}</strong></h3>
                                    <p class="account__timeline-text">
                                        Complete the form on the registration page with your basic information.
                                    </p>
                                </div>
                            </li>
                            <li class="account__timeline-item">
                                <span class="account__timeline-step">2</span>
                                <div class="account__timeline-body">
                                    <h3 class="account__timeline-heading">Receiving a call from
                                        <strong>{{ config('app.name') }}'s</strong> services</h3>
                                    <p class="account__timeline-text">
                                        A few minutes or hours after completing the registration form, you will receive a call from the {{ config('app.name') }}'s services, in order to be able to give you a little more information about our platform.
                                    </p>
                                </div>
                            </li>
                            <li class="account__timeline-item">
                                <span class="account__timeline-step">3</span>
                                <div class="account__timeline-body">
                                    <h3 class="account__timeline-heading">Activate your account</h3>
                                    <p class="account__timeline-text">
                                        With the help of {{ config('app.name') }} services, activate your account.
                                    </p>
                                </div>
                            </li>
                            <li class="account__timeline-item">
                                <span class="account__timeline-step">4</span>
                                <div class="account__timeline-body">
                                    <h3 class="account__timeline-heading">Trade</h3>
                                    <p class="account__timeline-text">
                                        Start buying and selling cryptocurrencies, and explore even more {{ config('app.name') }}
                                        services!

                                    </p>
                                </div>

                            </li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>
