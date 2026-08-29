@extends('layouts.frontend.master')
@section('meta_keywords', 'about Deveon Inc, Syed Sabeer Faisal, Deveon founder CEO, software development company Ottawa, software company Canada, IT company Karachi')
@section('meta_description', 'Meet Deveon Inc — a software company powering intelligent systems for clients in the USA, Canada, UK and Australia. Founded and led by CEO Syed Sabeer Faisal.')
@section('title', 'About Deveon Inc | Founded by Syed Sabeer Faisal')




@section('css')
<style>
    .founder-section .founder-photo-card {
        position: relative;
        max-width: 460px;
    }

    .founder-photo-frame {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid var(--border);
        box-shadow: 0 30px 60px -25px rgba(var(--dark-rgb), 0.25);
    }

    .founder-photo-frame img.founder-photo {
        width: 100%;
        aspect-ratio: 4/5;
        object-fit: cover;
        display: block;
    }

    .founder-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        min-width: 92px;
        padding: 14px 16px;
        border-radius: 16px;
        background: var(--custom-white);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.18);
    }

    .founder-badge__number-wrap {
        display: flex;
        align-items: baseline;
        gap: 2px;
        font-size: 1.9rem;
        font-weight: 700;
        line-height: 1;
        color: var(--primary-color);
    }

    .founder-badge__label {
        margin-top: 4px;
        font-size: 0.8rem;
        font-weight: 500;
        color: rgb(var(--dark-rgb));
        opacity: 0.7;
    }

    .founder-social {
        display: flex;
        gap: 12px;
        list-style: none;
        margin: 22px 0 0;
        padding: 0;
    }

    .founder-social a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 1px solid var(--border);
        color: rgb(var(--dark-rgb));
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .founder-social a:hover {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: #010103;
    }

    .founder-quote {
        position: relative;
        background: var(--gray-100);
        border-inline-start: 3px solid var(--primary-color);
        border-radius: 12px;
        padding: 22px 26px;
        margin-bottom: 22px;
    }

    .founder-quote p {
        margin: 0;
        font-size: 1.15rem;
        font-weight: 500;
        line-height: 1.6;
        color: rgb(var(--dark-rgb));
    }

    .founder-bio p {
        color: rgb(var(--dark-rgb));
    }

    .founder-stat {
        display: flex;
        align-items: center;
        gap: 14px;
        height: 100%;
        padding: 18px 20px;
        border-radius: 14px;
        border: 1px solid var(--border);
        background: var(--gray-100);
    }

    .founder-stat i {
        flex-shrink: 0;
        font-size: 1.6rem;
        color: var(--primary-color);
    }

    .founder-stat h3 {
        margin: 0;
        font-size: 1.3rem;
        font-weight: 700;
        color: rgb(var(--dark-rgb));
    }

    .founder-stat p {
        margin: 0;
        font-size: 0.85rem;
        opacity: 0.7;
    }

    .founder-signature {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-top: 28px;
        padding-top: 22px;
        border-top: 1px solid var(--border);
    }

    .founder-signature h4 {
        margin: 0 0 2px;
        font-weight: 700;
        color: rgb(var(--dark-rgb));
    }

    .founder-signature span {
        font-size: 0.9rem;
        opacity: 0.7;
    }

    @media (max-width: 575px) {
        .founder-badge {
            top: 14px;
            right: 14px;
            padding: 10px 14px;
        }

        .founder-badge__number-wrap {
            font-size: 1.4rem;
        }
    }

    /*
        --primary-color is a bright lime green that has very low contrast on
        white/light backgrounds (it only "pops" against dark ones). Rather than
        changing the color itself, give it a soft dark edge so it reads clearly
        on light backgrounds too, the way the dark backdrop does for it elsewhere.
    */
    [data-theme-mode="light"] .heading-title .text-primary,
    [data-theme-mode="light"] .founder-badge__number-wrap,
    [data-theme-mode="light"] .founder-stat i {
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
    }

    /* ---------- Services section ---------- */
    .services-header p {
        font-size: 1.02rem;
        line-height: 1.7;
        opacity: 0.72;
        margin-bottom: 22px;
    }

    .services-header .heading-subtitle {
        gap: 8px;
        font-size: 0.8rem;
        letter-spacing: 0.14em;
        background: var(--gray-100);
    }

    .services-header .heading-subtitle i {
        font-size: 0.55rem;
        color: var(--primary-color);
    }

    [data-theme-mode="light"] .services-header .heading-subtitle i {
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
    }

    .services-header .heading-title {
        letter-spacing: -0.015em;
    }

    .services-cta {
        display: inline-flex;
        align-items: center;
        gap: 16px;
        padding: 8px 8px 8px 28px;
        border-radius: 999px;
        background: rgb(var(--dark-rgb));
        color: var(--custom-white);
        font-weight: 700;
        font-size: 0.92rem;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        transition: gap 0.35s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.35s ease;
    }

    .services-cta:hover {
        gap: 22px;
        color: var(--custom-white);
        box-shadow: 0 20px 40px -18px rgba(var(--dark-rgb), 0.5);
    }

    .services-cta__icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: var(--primary-color);
        color: #111;
        font-size: 1.2rem;
        transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .services-cta:hover .services-cta__icon {
        transform: rotate(45deg);
    }

    @media (max-width: 575px) {
        .services-cta {
            padding: 7px 7px 7px 22px;
            font-size: 0.85rem;
        }

        .services-cta__icon {
            width: 40px;
            height: 40px;
            font-size: 1.05rem;
        }
    }

    .services-card {
        position: relative;
        height: 100%;
        padding: 40px 34px 32px;
        border-radius: 1.5rem;
        border: 1px solid var(--border);
        background: var(--gray-100);
        overflow: hidden;
        transition: transform 0.4s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.4s ease, border-color 0.4s ease;
    }

    .services-card::before {
        content: "";
        position: absolute;
        inset: 0;
        background: radial-gradient(140px 140px at 88% -8%, color-mix(in srgb, var(--accent) 24%, transparent), transparent 70%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }

    .services-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 34px 64px -32px rgba(var(--dark-rgb), 0.4);
        border-color: color-mix(in srgb, var(--accent) 55%, var(--border));
    }

    .services-card:hover::before {
        opacity: 1;
    }

    .services-card__index {
        position: absolute;
        top: 24px;
        right: 28px;
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        color: rgb(var(--dark-rgb));
        opacity: 0.28;
    }

    .services-card__icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        border-radius: 16px;
        margin-bottom: 24px;
        font-size: 1.6rem;
        background: color-mix(in srgb, var(--accent) 14%, transparent);
        color: var(--accent);
        transition: background 0.35s ease, color 0.35s ease, transform 0.35s ease;
    }

    .services-card:hover .services-card__icon {
        background: var(--accent);
        color: #fff;
        transform: scale(1.06) rotate(-3deg);
    }

    .services-card__title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 12px;
        color: rgb(var(--dark-rgb));
    }

    .services-card__desc {
        font-size: 0.94rem;
        line-height: 1.65;
        opacity: 0.7;
        margin-bottom: 24px;
        min-height: 4.8em;
    }

    .services-card__cta {
        display: flex;
        width: 100%;
        align-items: center;
        gap: 6px;
        font-size: 0.9rem;
        font-weight: 700;
        color: rgb(var(--dark-rgb));
        padding-top: 18px;
        border-top: 1px solid var(--border);
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.4);
        transition: color 0.3s ease, gap 0.3s ease, border-color 0.3s ease;
    }

    [data-theme-mode="dark"] .services-card__cta {
        text-shadow: none;
    }

    .services-card__cta i {
        color: var(--accent);
        transition: transform 0.3s ease;
    }

    .services-card:hover .services-card__cta {
        color: var(--accent);
        gap: 10px;
        border-color: color-mix(in srgb, var(--accent) 40%, var(--border));
    }

    .services-card:hover .services-card__cta i {
        transform: translate(2px, -2px);
    }
</style>
@endsection

@section('content')


<div class="section-spacer"></div> <!-- Hero -->
                        @include('frontend.partials.page-hero', [
                            'heroEyebrow' => 'Who We Are',
                            'heroTitle' => 'About <span>Us</span>',
                            'heroWatermarkIcon' => 'ri-team-line',
                            'heroCrumbCurrent' => 'about',
                        ])
                        <!-- /Hero -->
                        <div class="section aboutme-section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="chooseus-side-image-container"> <img src="{{ asset('FrontendAssets/images/shapes/45.png')}}" alt="" class="img-fluid" loading="lazy" decoding="async"> <a href="javascript:void(0);" class="choose-play-btn"><i class="ri-play-mini-fill"></i></a> </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="heading-section text-start"> <span class="heading-subtitle rounded-pill border px-3 py-2 d-inline-flex wow fadeInUp mt-4 mt-sm-0" data-wow-delay=".3s"> About Our Agency </span>
                                            <h2 class="heading-title mt-4 text-animated-slider custom-about-title"> Highly Tailored <span class="text-primary">IT Solutions</span> Design Management &Services </h2>
                                            <p> when an unknown printer took a galley of type and scrambled it to make a type specimen has survived not only five centuries, but also the leap into electronic areayt typesetting emaining essentially. </p>
                                        </div>
                                        <div class="profile-content gap-0">
                                            <div class="counter-box">
                                                <div class="profile-experince-number"> <span class="odometer metricCard__number mb-2" data-count="15"></span> <span class="suffix">+</span> </div>
                                                <p class="profile-experince-label">years of experience</p>
                                            </div>
                                            <div>
                                                <ul class="about-feature-list">
                                                    <li class="feature-list-item"> <span> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                                <path d="M19.9428 7.33556C20.2803 8.59518 19.0204 9.94926 18.8596 11.1655C18.6928 12.4268 19.54 14.0595 18.9147 15.1464C18.2894 16.2334 16.4484 16.3141 15.4396 17.0893C14.4672 17.8391 13.9233 19.6055 12.6643 19.9429C11.4054 20.2802 10.051 19.0196 8.83403 18.8591C7.57279 18.6923 5.94002 19.5394 4.85305 18.9141C3.76609 18.2888 3.68532 16.4479 2.91085 15.4389C2.16092 14.4667 0.394673 13.9234 0.0571579 12.6638C-0.28037 11.4042 0.980371 10.0505 1.14109 8.83424C1.30729 7.5732 0.460077 5.94048 1.08543 4.85354C1.71078 3.7666 3.55172 3.68584 4.56057 2.91073C5.53348 2.16065 6.0768 0.394446 7.33579 0.057115C8.59479 -0.280228 9.94981 0.980128 11.1661 1.14084C12.4274 1.30769 14.0601 0.4605 15.1471 1.08584C16.2341 1.71117 16.3148 3.55206 17.0899 4.56089C17.8364 5.53056 19.6046 6.07334 19.9428 7.33556Z" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" stroke="#111111" stroke-width="1.36364" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg> </span> <span class="feature-text"> Close Deals Faster With View </span> </li>
                                                    <li class="feature-list-item"> <span> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                                <path d="M19.9428 7.33556C20.2803 8.59518 19.0204 9.94926 18.8596 11.1655C18.6928 12.4268 19.54 14.0595 18.9147 15.1464C18.2894 16.2334 16.4484 16.3141 15.4396 17.0893C14.4672 17.8391 13.9233 19.6055 12.6643 19.9429C11.4054 20.2802 10.051 19.0196 8.83403 18.8591C7.57279 18.6923 5.94002 19.5394 4.85305 18.9141C3.76609 18.2888 3.68532 16.4479 2.91085 15.4389C2.16092 14.4667 0.394673 13.9234 0.0571579 12.6638C-0.28037 11.4042 0.980371 10.0505 1.14109 8.83424C1.30729 7.5732 0.460077 5.94048 1.08543 4.85354C1.71078 3.7666 3.55172 3.68584 4.56057 2.91073C5.53348 2.16065 6.0768 0.394446 7.33579 0.057115C8.59479 -0.280228 9.94981 0.980128 11.1661 1.14084C12.4274 1.30769 14.0601 0.4605 15.1471 1.08584C16.2341 1.71117 16.3148 3.55206 17.0899 4.56089C17.8364 5.53056 19.6046 6.07334 19.9428 7.33556Z" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" stroke="#111111" stroke-width="1.36364" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg> </span> <span class="feature-text"> Customizable Accounting </span> </li>
                                                    <li class="feature-list-item"> <span> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                                <path d="M19.9428 7.33556C20.2803 8.59518 19.0204 9.94926 18.8596 11.1655C18.6928 12.4268 19.54 14.0595 18.9147 15.1464C18.2894 16.2334 16.4484 16.3141 15.4396 17.0893C14.4672 17.8391 13.9233 19.6055 12.6643 19.9429C11.4054 20.2802 10.051 19.0196 8.83403 18.8591C7.57279 18.6923 5.94002 19.5394 4.85305 18.9141C3.76609 18.2888 3.68532 16.4479 2.91085 15.4389C2.16092 14.4667 0.394673 13.9234 0.0571579 12.6638C-0.28037 11.4042 0.980371 10.0505 1.14109 8.83424C1.30729 7.5732 0.460077 5.94048 1.08543 4.85354C1.71078 3.7666 3.55172 3.68584 4.56057 2.91073C5.53348 2.16065 6.0768 0.394446 7.33579 0.057115C8.59479 -0.280228 9.94981 0.980128 11.1661 1.14084C12.4274 1.30769 14.0601 0.4605 15.1471 1.08584C16.2341 1.71117 16.3148 3.55206 17.0899 4.56089C17.8364 5.53056 19.6046 6.07334 19.9428 7.33556Z" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" stroke="#111111" stroke-width="1.36364" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg> </span> <span class="feature-text"> No Training Or Maintenance </span> </li>
                                                    <li class="feature-list-item"> <span> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                                <path d="M19.9428 7.33556C20.2803 8.59518 19.0204 9.94926 18.8596 11.1655C18.6928 12.4268 19.54 14.0595 18.9147 15.1464C18.2894 16.2334 16.4484 16.3141 15.4396 17.0893C14.4672 17.8391 13.9233 19.6055 12.6643 19.9429C11.4054 20.2802 10.051 19.0196 8.83403 18.8591C7.57279 18.6923 5.94002 19.5394 4.85305 18.9141C3.76609 18.2888 3.68532 16.4479 2.91085 15.4389C2.16092 14.4667 0.394673 13.9234 0.0571579 12.6638C-0.28037 11.4042 0.980371 10.0505 1.14109 8.83424C1.30729 7.5732 0.460077 5.94048 1.08543 4.85354C1.71078 3.7666 3.55172 3.68584 4.56057 2.91073C5.53348 2.16065 6.0768 0.394446 7.33579 0.057115C8.59479 -0.280228 9.94981 0.980128 11.1661 1.14084C12.4274 1.30769 14.0601 0.4605 15.1471 1.08584C16.2341 1.71117 16.3148 3.55206 17.0899 4.56089C17.8364 5.53056 19.6046 6.07334 19.9428 7.33556Z" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" stroke="#111111" stroke-width="1.36364" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg> </span> <span class="feature-text"> Innovative Services </span> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="section services-section">
                            <div class="container">
                                <div class="row services-header align-items-end gy-4 mb-5">
                                    <div class="col-lg-6">
                                        <div class="heading-section text-start mb-0">
                                            <span class="heading-subtitle rounded-pill border px-3 py-2 d-inline-flex wow fadeInUp" data-wow-delay=".1s">
                                                <i class="ri-checkbox-blank-circle-fill"></i>
                                                Service We Offer
                                            </span>
                                            <h2 class="heading-title mt-4 split-title">
                                                End-to-End <span class="text-primary">Digital Solutions</span> For Every Idea
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <p>
                                            From the first line of code to the final launch, we cover every discipline your product needs under one roof.
                                        </p>
                                        <a class="services-cta wow fadeInUp" data-wow-delay=".2s" href="{{ route('service') }}">
                                            <span>See All Services</span>
                                            <span class="services-cta__icon"><i class="ri-arrow-right-up-line"></i></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row gy-4 mb-0">
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="services-card wow fadeInUp" data-wow-delay=".1s" style="--accent:#f2a90c;">
                                            <span class="services-card__index">01</span>
                                            <div class="services-card__icon">
                                                <i class="ri-terminal-box-line"></i>
                                            </div>
                                            <h3 class="services-card__title">Software Development</h3>
                                            <p class="services-card__desc">
                                                Custom business software and portal solutions designed for scalability and reliability, built around the way your team actually works.
                                            </p>
                                            <a class="services-card__cta" href="{{ route('service.detail', 'software-development') }}">
                                                Explore Service <i class="ri-arrow-right-up-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="services-card wow fadeInUp" data-wow-delay=".2s" style="--accent:#3b6fe0;">
                                            <span class="services-card__index">02</span>
                                            <div class="services-card__icon">
                                                <i class="ri-palette-line"></i>
                                            </div>
                                            <h3 class="services-card__title">UI/UX Design</h3>
                                            <p class="services-card__desc">
                                                Deliver seamless and enjoyable digital experiences. Our designs prioritize clarity, ease of use, and attractive interfaces for both web and mobile platforms.
                                            </p>
                                            <a class="services-card__cta" href="{{ route('service.detail', 'ui-ux-design') }}">
                                                Explore Service <i class="ri-arrow-right-up-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="services-card wow fadeInUp" data-wow-delay=".3s" style="--accent:#1f9d63;">
                                            <span class="services-card__index">03</span>
                                            <div class="services-card__icon">
                                                <i class="ri-smartphone-line"></i>
                                            </div>
                                            <h3 class="services-card__title">Mobile App Development</h3>
                                            <p class="services-card__desc">
                                                Native and cross-platform app experiences with smooth performance and clean UX. We turn ideas into high-performing mobile apps tailored to your users' needs.
                                            </p>
                                            <a class="services-card__cta" href="{{ route('service.detail', 'mobile-app-development') }}">
                                                Explore Service <i class="ri-arrow-right-up-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="services-card wow fadeInUp" data-wow-delay=".1s" style="--accent:#17a2a6;">
                                            <span class="services-card__index">04</span>
                                            <div class="services-card__icon">
                                                <i class="ri-global-line"></i>
                                            </div>
                                            <h3 class="services-card__title">Website Development</h3>
                                            <p class="services-card__desc">
                                                Modern, responsive, and conversion-focused websites tailored to your business goals — from marketing sites to complex web platforms and e-commerce stores.
                                            </p>
                                            <a class="services-card__cta" href="{{ route('service.detail', 'web-development') }}">
                                                Explore Service <i class="ri-arrow-right-up-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="services-card wow fadeInUp" data-wow-delay=".2s" style="--accent:#d1483f;">
                                            <span class="services-card__index">05</span>
                                            <div class="services-card__icon">
                                                <i class="ri-line-chart-line"></i>
                                            </div>
                                            <h3 class="services-card__title">SEO & Marketing</h3>
                                            <p class="services-card__desc">
                                                Search visibility, content strategy, and growth campaigns that drive quality traffic and turn visitors into customers.
                                            </p>
                                            <a class="services-card__cta" href="{{ route('service.detail', 'seo-marketing') }}">
                                                Explore Service <i class="ri-arrow-right-up-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="services-card wow fadeInUp" data-wow-delay=".3s" style="--accent:#7b4fd1;">
                                            <span class="services-card__index">06</span>
                                            <div class="services-card__icon">
                                                <i class="ri-robot-2-line"></i>
                                            </div>
                                            <h3 class="services-card__title">AI/ML</h3>
                                            <p class="services-card__desc">
                                                We build intelligent features — from automation and predictive models to AI-powered integrations — that give your product a competitive edge.
                                            </p>
                                            <a class="services-card__cta" href="{{ route('service.detail', 'ai-ml') }}">
                                                Explore Service <i class="ri-arrow-right-up-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> <!-- top / primary band -->
                        <div class="swiper marquee-section about-marquee bg-primary mb-5 page-marquee-section">
                            <div class="swiper-wrapper marquee-container">
                                <div class="swiper-slide d-flex align-items-center gap-5 marquee-item"> <span class="marquee-text stroke">UI/UX Desing</span> <i class="ri-asterisk fs-1 lh-1"></i> </div>
                                <div class="swiper-slide d-flex align-items-center gap-5 marquee-item"> <span class="marquee-text">Branding Design</span> <i class="ri-asterisk fs-1 lh-1"></i> </div>
                                <div class="swiper-slide d-flex align-items-center gap-5 marquee-item"> <span class="marquee-text stroke">10+ Years Experience</span> <i class="ri-asterisk fs-1 lh-1"></i> </div>
                                <div class="swiper-slide d-flex align-items-center gap-5 marquee-item"> <span class="marquee-text">User Experience</span> <i class="ri-asterisk fs-1 lh-1"></i> </div>
                                <div class="swiper-slide d-flex align-items-center gap-5 marquee-item"> <span class="marquee-text stroke">Digital Marketing Strategy</span> <i class="ri-asterisk fs-1 lh-1"></i> </div>
                                <div class="swiper-slide d-flex align-items-center gap-5 marquee-item"> <span class="marquee-text">Professional</span> <i class="ri-asterisk fs-1 lh-1"></i> </div>
                                <div class="swiper-slide d-flex align-items-center gap-5 marquee-item"> <span class="marquee-text stroke">Digital Marketing</span> <i class="ri-asterisk fs-1 lh-1"></i> </div>
                            </div>
                        </div>
                        <section class="section founder-section">
                            <div class="container">
                                <div class="row align-items-center gy-5">
                                    <div class="col-xl-5">
                                        <div class="founder-photo-card">
                                            <div class="founder-photo-frame">
                                                <img src="{{ asset('FrontendAssets/images/profile/founder.webp')}}" alt="Syed Sabeer Faisal — Founder & CEO of Deveon Inc" class="founder-photo" loading="lazy" decoding="async">
                                                <div class="founder-badge">
                                                    <div class="founder-badge__number-wrap">
                                                        <span class="odometer" data-count="10"></span><span class="suffix">+</span>
                                                    </div>
                                                    <span class="founder-badge__label">Years</span>
                                                </div>
                                            </div>
                                            <ul class="founder-social">
                                                <li><a href="{{ config('seo.social.facebook') }}" target="_blank" rel="noopener noreferrer" aria-label="Deveon Inc on Facebook"><i class="ri-facebook-circle-fill"></i></a></li>
                                                <li><a href="{{ config('seo.social.x') }}" target="_blank" rel="noopener noreferrer" aria-label="Deveon Inc on X"><i class="ri-twitter-x-line"></i></a></li>
                                                <li><a href="{{ config('seo.social.linkedin') }}" target="_blank" rel="noopener noreferrer" aria-label="Deveon Inc on LinkedIn"><i class="ri-linkedin-box-fill"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <div class="heading-section text-start mb-4">
                                            <span class="heading-subtitle rounded-pill border px-3 py-2 d-inline-flex wow fadeInUp" data-wow-delay=".3s"> <i class="ri-star-fill"></i> Leadership </span>
                                            <h2 class="heading-title mt-4 text-animated-slider"> Meet Our <span class="text-primary">Visionary Founder</span> </h2>
                                        </div>
                                        <div class="founder-quote">
                                            <p>&ldquo;At Deveon Inc, we don't just build software — we craft digital experiences that transform businesses and empower brands to thrive in an ever-evolving digital landscape.&rdquo;</p>
                                        </div>
                                        <div class="founder-bio">
                                            <p class="op-7 mb-3">
                                                Since founding this company, my vision has been clear: to deliver world-class digital solutions that combine cutting-edge technology with strategic creativity. From <strong>custom software development</strong> and <strong>mobile applications</strong> to <strong>graphic design</strong>, <strong>branding</strong>, and <strong>digital marketing</strong> — we bring ideas to life with precision, passion, and purpose.
                                            </p>
                                            <p class="op-7 mb-4">
                                                Our team doesn't just meet expectations — we exceed them. We build lasting partnerships with clients, understanding their unique challenges and delivering solutions that drive real, measurable results.
                                            </p>
                                        </div>
                                        <div class="row gy-3">
                                            <div class="col-sm-6">
                                                <div class="founder-stat">
                                                    <i class="ri-checkbox-circle-fill"></i>
                                                    <div>
                                                        <h3><span class="odometer" data-count="200"></span>+</h3>
                                                        <p>Projects Delivered</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="founder-stat">
                                                    <i class="ri-global-line"></i>
                                                    <div>
                                                        <h3><span class="odometer" data-count="10"></span>+</h3>
                                                        <p>Countries Reached</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="founder-signature">
                                            <div>
                                                <h4>Syed Sabeer Faisal</h4>
                                                <span>Founder & CEO, Deveon Inc</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                      
@include('frontend.partials.testimonials', [
                            'tTitle'      => 'What They <span class="text-primary">Say</span> About Us!',
                            'tIntro'      => 'Real feedback from the teams we have partnered with, in their own words.',
                            'tTitleClass' => 'text-animated-slider',
                        ])

@endsection

@section('script')

@endsection

@section('schema')
<script type="application/ld+json">
@php $ld = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'AboutPage',
            '@id' => url('/about') . '#aboutpage',
            'url' => url('/about'),
            'name' => 'About Deveon Inc',
            'mainEntity' => ['@id' => url('/') . '#organization'],
        ],
        [
            '@type' => 'Person',
            '@id' => url('/about') . '#founder',
            'name' => 'Syed Sabeer Faisal',
            'givenName' => 'Syed Sabeer',
            'familyName' => 'Faisal',
            'jobTitle' => 'Founder & Chief Executive Officer',
            'description' => 'Founder and Chief Executive Officer of Deveon Inc, a software development company building custom software, mobile applications and AI automation for clients across North America, the United Kingdom and Australia.',
            'image' => asset('FrontendAssets/images/profile/founder.webp'),
            'url' => url('/about'),
            'worksFor' => ['@id' => url('/') . '#organization'],
            'knowsAbout' => ['Software Development', 'Artificial Intelligence', 'Product Strategy', 'Enterprise Systems'],
            'sameAs' => [config('seo.social.linkedin')],
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'About', 'item' => url('/about')],
            ],
        ],
    ],
]; @endphp
{!! json_encode($ld, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection
