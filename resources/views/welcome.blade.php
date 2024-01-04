<x-layouts.app>

    <section class="hero">
        <div class="container">
            <div class="hero__left">
                <header class="hero__header">
                    <h1 class="hero__heading">
                        Get financially prepared for whatever life throws your way with help from us.
                    </h1>
                </header>
                <p class="hero__text">
                    Your new financial picture starts here,
                    trade Your Crypto on <strong>{{ config('app.name') }}</strong> with
                    Confidence.
                </p>
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
                <div class="hero__image">
                    <img src="{{ asset('images/icons/Financial data-bro.svg') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="section bg-white goals__section">
        <div class="container">
            <h1 class="section__heading">
                You have goals. We have solutions.
            </h1>
            <div class="section__body">
                <div class="section__grid">
                    <article class="goal__card">
                        <div class="goal__card-image">
                            <img src="{{ asset('images/icons/Investment data-rafiki.svg') }}" alt="">
                        </div>
                        <div class="goal__card-body">
                            <header class="goal__card-header">
                                <h4 class="goal__card-subheading">Trading & investing</h4>
                                <h2 class="goal__card-heading">Invest the way you want to</h2>
                            </header>
                            <p class="goal__card-text">
                                Whether you are an active trader or investing in the future, we can help you reach your
                                goals.
                            </p>
                            <div class="goal__card-cta">
                                <a href="" class="get-started-action">
                                    Get started
                                </a>
                            </div>
                        </div>
                    </article>
                    <article class="goal__card">
                        <div class="goal__card-image">
                            <img src="{{ asset('images/icons/Strategic consulting-pana.svg') }}" alt="">
                        </div>
                        <div class="goal__card-body">
                            <header class="goal__card-header">
                                <h4 class="goal__card-subheading">Wealth Management</h4>
                                <h2 class="goal__card-heading">Work with a dedicated advisor</h2>
                            </header>
                            <p class="goal__card-text">
                                We'll partner with you on a customized plan designed to help grow and protect your
                                wealth.
                            </p>
                            <div class="goal__card-cta">
                                <a href="" class="get-started-action">
                                    Get started
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <section class="section wy_us__section">
        <div class="container">
            <header class="section__header">
                <h1 class="section__heading">
                    Wy choose us ?
                </h1>
            </header>
            <div class="section__body">
                <div class="section__grid">
                    <article class="wyUs__card">
                        <div class="wyUs__card-image">
                            <img src="{{ asset('images/icons/Tablet login-pana.svg') }}" alt="">
                        </div>
                        <h2 class="wyUs__card-heading">
                            Affordable accounts
                        </h2>
                        <p class="wyUs__card__text">
                            We put you first by charging no fees or minimums to open a retail brokerage account3 to help
                            you spend and save smarter.
                        </p>
                    </article>
                    <article class="wyUs__card">
                        <div class="wyUs__card-image">
                            <img src="{{ asset('images/icons/Crypto portfolio-bro.svg') }}" alt="">
                        </div>
                        <h2 class="wyUs__card-heading">
                            Well made Trading Platforms
                        </h2>
                        <p class="wyUs__card__text">
                            Our customizable trading platforms let you manage your account and trade from your desktop, iPad or mobile phone.
                        </p>
                    </article>
                    <article class="wyUs__card">
                        <div class="wyUs__card-image">
                            <img src="{{ asset('images/icons/Contact us-amico.svg') }}" alt="">
                        </div>
                        <h2 class="wyUs__card-heading">
                            We are here to help.
                        </h2>
                        <p class="wyUs__card__text">
                            Our customer support representatives are ready to assist you via phone and email
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <section class="account__section section">
        <div class="container">
            <header class="section__header">
                <h1 class="section__heading">Get started with some of our most popular accounts</h1>
                <p class="section__subheading">Whether you want to invest on your own, or have us do the work, we have
                    account choices for you.
                    And <br>we’ve got tools and resources to help along the way.</p>
            </header>
            <div class="section__body">
                <div class="section__grid">
                    <article class="robot-card">
                        <div class="robot-card__image">
                            <img src="{{ asset('images/icons/Data extraction-bro.svg') }}" alt="">
                        </div>
                        <h3 class="robot-card__heading">Robo investing</h3>
                        <p class="robot-card__text">
                            Our robot advisor will handle your investments, so you don’t have to. Automated
                            investing
                            with no account minimums.
                        </p>
                        <div class="robot-card__cta">
                            <a href="/user/register" class="get-started-action">Get started</a>
                        </div>
                    </article>
                    <article class="account__timeline-container">
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
                                        A few minutes or hours after completing the registration form, you will receive
                                        a call from the {{ config('app.name') }}'s services, in order to be able to give
                                        you a little more information about our platform.
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
                                        Start buying and selling cryptocurrencies, and explore even
                                        more {{ config('app.name') }}
                                        services!

                                    </p>
                                </div>

                            </li>
                        </ul>
                    </article>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
