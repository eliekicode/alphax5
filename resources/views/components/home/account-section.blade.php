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
                    <h3 class="robot-card__heading">Robot investing</h3>
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