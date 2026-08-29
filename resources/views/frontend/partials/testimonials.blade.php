@php
    // Shared client-testimonials block. Used by the home page and the about
    // page so the reviews only ever live in one file.
    //   $tTitle      raw HTML for the section heading
    //   $tIntro      optional lead paragraph (pass null / '' to hide)
    //   $tTitleClass animation class used for headings on the host page
    $tTitle      = $tTitle      ?? 'What Our <span class="text-primary">Partners Say</span> About Us!';
    $tIntro      = $tIntro      ?? "Real feedback from the teams we've partnered with — on the results, the process, and what it's like to work with us.";
    $tTitleClass = $tTitleClass ?? 'split-title';
@endphp

<section class="section section-devider">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="heading-section home-testimonials-header mb-5 pb-2 text-center">
                    <span class="heading-subtitle rounded-pill border px-3 py-2 d-inline-flex justify-content-center mx-auto wow fadeInUp" data-wow-delay=".1s">
                        <i class="ri-double-quotes-l"></i>
                        Testimonials
                    </span>
                    <h2 class="heading-title mt-4 {{ $tTitleClass }}">{!! $tTitle !!}</h2>
                    @if(!empty($tIntro))
                    <p class="mt-4 mb-0">{{ $tIntro }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="swiper freelancer-testimonials-slider">
          <div class="swiper-wrapper">

            <!-- Collections by Finley Jade -->
            <div class="swiper-slide">
              <article class="tcard">
                <div class="tcard__top">
                  <ul class="tcard__stars">
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                  </ul>
                  <a class="tcard__source" href="https://ca.trustpilot.com/users/69aeff0bc9f1769c6cd03123" target="_blank" rel="noopener nofollow">
                    Trustpilot <i class="ri-external-link-line"></i>
                  </a>
                </div>
                <h3 class="tcard__headline">&ldquo;Professional, responsive, creative&rdquo;</h3>
                <p class="tcard__text">
                  Deveon did an amazing job building my website from start to finish. He was professional,
                  responsive, creative, and incredibly easy to work with throughout the entire process.
                  I&rsquo;m extremely happy with the final product and would highly recommend him to anyone
                  looking for a talented and reliable website developer.
                </p>
                <footer class="tcard__foot">
                  <div class="tcard__logo">
                    <img src="{{ asset('FrontendAssets/images/clients/finley-jade.png') }}" alt="Collections by Finley Jade" loading="lazy">
                  </div>
                  <div class="tcard__who">
                    <h4 class="tcard__name">Nicholas Assad</h4>
                    <span class="tcard__role">CEO &middot; Collections by Finley Jade</span>
                  </div>
                </footer>
              </article>
            </div>

            <!-- Weborka Inc -->
            <div class="swiper-slide">
              <article class="tcard">
                <div class="tcard__top">
                  <ul class="tcard__stars">
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                  </ul>
                </div>
                <h3 class="tcard__headline">&ldquo;A smooth and reliable solution&rdquo;</h3>
                <p class="tcard__text">
                  We worked with Deveon Inc on our web applications and custom software for our embroidery
                  and caps business. They understood our requirements well and delivered a smooth and reliable
                  solution. Communication was good throughout and we are happy with the overall work.
                </p>
                <footer class="tcard__foot">
                  <div class="tcard__logo">
                    <img src="{{ asset('FrontendAssets/images/clients/weborka.png') }}" alt="Weborka Inc" loading="lazy">
                  </div>
                  <div class="tcard__who">
                    <h4 class="tcard__name">Bruno Torres</h4>
                    <span class="tcard__role">CEO &middot; Weborka Inc</span>
                  </div>
                </footer>
              </article>
            </div>

            <!-- Metro Cotton Mill -->
            <div class="swiper-slide">
              <article class="tcard">
                <div class="tcard__top">
                  <ul class="tcard__stars">
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                  </ul>
                </div>
                <h3 class="tcard__headline">&ldquo;Daily operations much easier to manage&rdquo;</h3>
                <p class="tcard__text">
                  Deveon Inc developed a custom ERP and CRM system for Metro Cotton Mill Pvt Ltd based on our
                  textile business workflow. They understood our requirements well and built a system that has
                  made our daily operations much easier to manage. We are happy with the overall work and support.
                </p>
                <footer class="tcard__foot">
                  <div class="tcard__logo">
                    <img src="{{ asset('FrontendAssets/images/clients/metro-cotton-mill.png') }}" alt="Metro Cotton Mill (Pvt) Ltd." loading="lazy">
                  </div>
                  <div class="tcard__who">
                    <h4 class="tcard__name">Zubair Maya</h4>
                    <span class="tcard__role">CEO &middot; Metro Cotton Mill (Pvt) Ltd.</span>
                  </div>
                </footer>
              </article>
            </div>

            <!-- RideBridge -->
            <div class="swiper-slide">
              <article class="tcard">
                <div class="tcard__top">
                  <ul class="tcard__stars">
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                  </ul>
                </div>
                <h3 class="tcard__headline">&ldquo;Definitely money well spent&rdquo;</h3>
                <p class="tcard__text">
                  Really happy with how RideBridge turned out. Deveon Inc understood the concept of our ride
                  booking app and built it into something practical and easy to use for both riders and drivers.
                  The quality matched what we paid for and overall it was definitely money well spent.
                </p>
                <footer class="tcard__foot">
                  <div class="tcard__logo">
                    <img src="{{ asset('FrontendAssets/images/clients/ridebridge.png') }}" alt="RideBridge" loading="lazy">
                  </div>
                  <div class="tcard__who">
                    <h4 class="tcard__name">Diego Montes</h4>
                    <span class="tcard__role">Product Manager &middot; RideBridge</span>
                  </div>
                </footer>
              </article>
            </div>

            <!-- Horizon Canada Inc -->
            <div class="swiper-slide">
              <article class="tcard">
                <div class="tcard__top">
                  <ul class="tcard__stars">
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                  </ul>
                </div>
                <h3 class="tcard__headline">&ldquo;Clean, practical and easy to use&rdquo;</h3>
                <p class="tcard__text">
                  We needed a custom accounting and POS solution for Horizon Canada Inc and Deveon Inc handled
                  the project really well. POSEV turned out clean, practical and easy for our team to use in
                  daily work. The overall experience was smooth and we are happy with what they delivered.
                </p>
                <footer class="tcard__foot">
                  <div class="tcard__logo">
                    <img src="{{ asset('FrontendAssets/images/clients/horizon-canada.png') }}" alt="Horizon Canada Inc" loading="lazy">
                  </div>
                  <div class="tcard__who">
                    <h4 class="tcard__name">Syed Saboor</h4>
                    <span class="tcard__role">CEO &middot; Horizon Canada Inc</span>
                  </div>
                </footer>
              </article>
            </div>

          </div>
        </div>

    </div>
</section>

<style>
/* ---------- Testimonials section ----------
   Every card is the same height and its footer sits on the same baseline,
   regardless of how long the quote is. Three things make that work:
     1. .swiper-wrapper stretches its items and .swiper-slide has height:auto
     2. .tcard is a full-height flex column
     3. .tcard__foot uses margin-block-start:auto to pin to the bottom
   The pull-quote is clamped to two lines so every body copy starts on the
   same line as well.
*/
.home-testimonials-header .heading-subtitle i {
    font-size: 0.55rem;
    color: var(--primary-color);
}

[data-theme-mode="light"] .home-testimonials-header .heading-subtitle i {
    text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
}

.home-testimonials-header p {
    font-size: 1.02rem;
    opacity: 0.72;
}

/* --- equal-height slides --- */
.freelancer-testimonials-slider {
    padding-block-end: 8px;
}

.freelancer-testimonials-slider .swiper-wrapper {
    align-items: stretch;
}

.freelancer-testimonials-slider .swiper-slide {
    height: auto;
    display: flex;
}

/* --- card --- */
.tcard {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
    padding: 32px 30px 28px;
    border-radius: 20px;
    border: 1px solid var(--border);
    background: var(--custom-white);
    transition: transform 0.4s cubic-bezier(0.22, 1, 0.36, 1),
                box-shadow 0.4s ease, border-color 0.4s ease;
}

.tcard:hover {
    transform: translateY(-6px);
    border-color: color-mix(in srgb, var(--primary-color) 45%, var(--border));
    box-shadow: 0 30px 60px -34px rgba(var(--dark-rgb), 0.4);
}

.tcard__top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 16px;
    min-height: 22px;
}

.tcard__stars {
    display: flex;
    gap: 4px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.tcard__stars i {
    font-size: 0.9rem;
    color: var(--primary-color);
}

[data-theme-mode="light"] .tcard__stars i {
    text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
}

.tcard__source {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 0.72rem;
    font-weight: 600;
    letter-spacing: 0.02em;
    text-decoration: none;
    color: rgb(var(--dark-rgb));
    opacity: 0.5;
    transition: opacity 0.3s ease, color 0.3s ease;
    white-space: nowrap;
}

.tcard__source:hover {
    opacity: 1;
    color: var(--primary-color);
}

.tcard__source i {
    font-size: 0.85rem;
}

/* pull-quote: always two lines tall so bodies line up card to card */
.tcard__headline {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 2.6em;
    margin: 0 0 14px;
    font-size: 1.22rem;
    font-weight: 600;
    line-height: 1.3;
    letter-spacing: -0.01em;
    color: rgb(var(--dark-rgb));
}

.tcard__text {
    flex: 1 1 auto;
    margin: 0;
    font-size: 0.97rem;
    line-height: 1.75;
    color: rgb(var(--dark-rgb));
    opacity: 0.7;
}

/* --- footer: pinned to the bottom of every card --- */
.tcard__foot {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-block-start: 26px;
    padding-block-start: 22px;
    border-block-start: 1px solid var(--border);
}

.tcard__logo {
    flex: 0 0 auto;
    width: 54px;
    height: 54px;
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid var(--border);
    background: var(--gray-100);
}

.tcard__logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.tcard__who {
    min-width: 0;
}

.tcard__name {
    margin: 0 0 3px;
    font-size: 1.02rem;
    font-weight: 600;
    line-height: 1.25;
    color: rgb(var(--dark-rgb));
}

.tcard__role {
    display: block;
    font-size: 0.84rem;
    line-height: 1.4;
    color: rgb(var(--dark-rgb));
    opacity: 0.6;
}

@media (max-width: 991px) {
    .tcard {
        padding: 28px 24px 24px;
    }

    .tcard__headline {
        font-size: 1.12rem;
    }
}

@media (max-width: 575px) {
    .tcard__logo {
        width: 46px;
        height: 46px;
        border-radius: 12px;
    }
}
</style>
