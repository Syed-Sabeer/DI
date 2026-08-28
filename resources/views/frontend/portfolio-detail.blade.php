@extends('layouts.frontend.master')

@section('title', $portfolio['title'].' | Deveon Inc Portfolio')
@section('meta_description', $portfolio['short'])

@section('css')
<style>
    /* ---------- Hero category badge ---------- */
    .portfolio-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 18px;
        border-radius: 999px;
        margin-bottom: 20px;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        background: color-mix(in srgb, var(--accent) 16%, transparent);
        color: var(--accent);
    }

    [data-theme-mode="light"] .portfolio-hero-badge {
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.35);
    }

    .portfolio-hero-badge i {
        font-size: 0.55rem;
    }

    /* ---------- Article intro ---------- */
    .service-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        border-radius: 999px;
        border: 1px solid var(--border);
        background: var(--gray-100);
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: 18px;
    }

    .article-shell .article-head .article-title.service-title {
        font-size: 38px;
        line-height: 1.2;
    }

    .service-subheading {
        font-size: 1.1rem;
        line-height: 1.7;
        opacity: 0.78;
        margin-bottom: 1.5rem;
    }

    /* ---------- Feature tiles ---------- */
    .feature-tile {
        display: flex;
        gap: 16px;
        align-items: flex-start;
        height: 100%;
        padding: 24px;
        border: 1px solid var(--border);
        border-radius: 16px;
        background: var(--gray-100);
        transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .feature-tile:hover {
        transform: translateY(-4px);
        border-color: color-mix(in srgb, var(--accent) 45%, var(--border));
        box-shadow: 0 24px 48px -30px rgba(var(--dark-rgb), 0.35);
    }

    .feature-tile__num {
        flex: 0 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 10px;
        font-size: 0.85rem;
        font-weight: 800;
        background: color-mix(in srgb, var(--accent) 16%, transparent);
        color: var(--accent);
    }

    .feature-tile__title {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 6px;
        color: rgb(var(--dark-rgb));
    }

    .feature-tile__desc {
        font-size: 0.88rem;
        line-height: 1.6;
        opacity: 0.7;
        margin-bottom: 0;
    }

    /* ---------- Result stats ---------- */
    .result-stats {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .result-stat {
        flex: 1 1 160px;
        text-align: center;
        padding: 28px 20px;
        border: 1px solid var(--border);
        border-radius: 16px;
        background: var(--gray-100);
    }

    .result-stat__value {
        font-size: 2rem;
        font-weight: 800;
        line-height: 1;
        margin-bottom: 10px;
        color: var(--accent);
    }

    [data-theme-mode="light"] .result-stat__value {
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.35);
    }

    .result-stat__label {
        font-size: 0.85rem;
        opacity: 0.7;
        margin: 0;
    }

    /* ---------- In-article CTA ---------- */
    .service-inline-cta {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-top: 3rem;
        padding: 32px;
        border-radius: 20px;
        background: rgb(var(--dark-rgb));
        color: var(--custom-white);
        border: 1px solid color-mix(in srgb, var(--accent) 45%, transparent);
    }

    .service-inline-cta p {
        margin: 0;
        opacity: 0.75;
        color: var(--custom-white);
    }

    .service-inline-cta h4 {
        margin: 0 0 6px;
        color: var(--custom-white);
    }

    .service-inline-cta .services-cta {
        flex-shrink: 0;
    }

    .services-cta {
        display: inline-flex;
        align-items: center;
        gap: 16px;
        padding: 8px 8px 8px 26px;
        border-radius: 999px;
        background: rgb(var(--dark-rgb));
        color: var(--custom-white);
        font-weight: 700;
        font-size: 0.9rem;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        transition: gap 0.35s cubic-bezier(0.22, 1, 0.36, 1);
        white-space: nowrap;
    }

    .services-cta:hover {
        gap: 20px;
        color: var(--custom-white);
    }

    .services-cta__icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: var(--primary-color);
        color: #111;
        font-size: 1.1rem;
        transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .services-cta:hover .services-cta__icon {
        transform: rotate(45deg);
    }

    .services-cta--on-dark {
        background: var(--primary-color);
        color: #111;
    }

    .services-cta--on-dark .services-cta__icon {
        background: rgb(1, 1, 4);
        color: var(--primary-color);
    }

    .services-cta--on-dark:hover {
        color: #111;
    }

    /* ---------- Sidebar ---------- */
    .services-nav__item--active a {
        color: var(--service-accent, var(--primary-color)) !important;
    }

    .project-meta-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 6px;
    }

    .project-meta-tags span {
        padding: 5px 12px;
        border-radius: 999px;
        background: var(--gray-200);
        font-size: 0.78rem;
        font-weight: 600;
        color: rgb(var(--dark-rgb));
    }

    .sidebar-contact-card .side-contact-item {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 14px;
    }

    .sidebar-contact-card .side-contact-item i {
        color: var(--primary-color);
        font-size: 1.1rem;
    }

    .sidebar-contact-card .side-contact-item a {
        color: rgb(var(--dark-rgb));
        font-weight: 600;
    }
</style>
@endsection

@section('content')
<div class="section-spacer"></div>
<!-- Hero -->
<section class="hero pages-banner overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="hero-banner-content text-center">
                    <span class="portfolio-hero-badge" style="--accent:{{ $portfolio['accent'] }};">
                        <i class="ri-checkbox-blank-circle-fill"></i>
                        {{ $portfolio['category'] }}
                    </span>
                    <h1 class="hero__title text-dark text-center text-animated-slider">{{ $portfolio['title'] }}</h1>
                    <div class="glow-border-container">
                        <ul class="pagebreadcrumb-list">
                            <li class="pagebreadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li><i class="ri-expand-horizontal-s-fill"></i></li>
                            <li class="pagebreadcrumb-item"><a href="{{ route('portfolio') }}">Portfolio</a></li>
                            <li><i class="ri-expand-horizontal-s-fill"></i></li>
                            <li class="active">{{ $portfolio['title'] }}</li>
                        </ul>
                        <div class="glow-border-card">
                            <div class="glow-border-inner"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-image-shape"><img src="{{ asset('FrontendAssets/images/shapes/33.png') }}" alt="" class="banner-light"><img src="{{ asset('FrontendAssets/images/shapes/7.png') }}" alt="" class="banner-dark d-none"></div>
</section>
<!-- /Hero -->

<section class="section service-article section-gap">
    <div class="container">
        <figure class="article-hero wow fadeInUp" data-wow-delay=".1s">
            <img src="{{ asset($portfolio['image']) }}" alt="{{ $portfolio['title'] }}" class="w-100">
        </figure>
        <div class="row g-5">
            <!-- CONTENT -->
            <div class="col-lg-8">
                <article class="article-shell" style="--accent:{{ $portfolio['accent'] }};">
                    <header class="article-head">
                        <span class="service-eyebrow">
                            <i class="ri-checkbox-blank-circle-fill"></i>
                            {{ $portfolio['category'] }}
                        </span>
                        <h2 class="article-title service-title split-title">{{ $portfolio['title'] }}</h2>
                    </header>
                    <div class="article-body">
                        <p class="service-subheading wow fadeInUp" data-wow-delay=".1s">{{ $portfolio['short'] }}</p>
                        <p class="wow fadeInUp" data-wow-delay=".2s">{{ $portfolio['overview'] }}</p>

                        <h3 class="section-title wow fadeInUp" data-wow-delay=".3s">The Challenge</h3>
                        <p class="wow fadeInUp" data-wow-delay=".3s">{{ $portfolio['challenge'] }}</p>

                        <h3 class="section-title wow fadeInUp" data-wow-delay=".3s">Our Approach</h3>
                        <p class="wow fadeInUp" data-wow-delay=".3s">{{ $portfolio['solution'] }}</p>

                        <h3 class="section-title mb-4 wow fadeInUp" data-wow-delay=".3s">Key Highlights</h3>
                        <div class="row g-3 mb-4 wow fadeInUp" data-wow-delay=".4s">
                            @foreach($portfolio['highlights'] as $highlight)
                            <div class="col-sm-6">
                                <div class="feature-tile">
                                    <span class="feature-tile__num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                    <div>
                                        <h4 class="feature-tile__title">{{ $highlight['title'] }}</h4>
                                        <p class="feature-tile__desc">{{ $highlight['desc'] }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <h3 class="section-title mb-4 wow fadeInUp" data-wow-delay=".3s">The Results</h3>
                        <div class="result-stats mb-4 wow fadeInUp" data-wow-delay=".4s">
                            @foreach($portfolio['results'] as $result)
                            <div class="result-stat">
                                <div class="result-stat__value">{{ $result['value'] }}</div>
                                <p class="result-stat__label">{{ $result['label'] }}</p>
                            </div>
                            @endforeach
                        </div>

                        <h3 class="section-title mb-4 wow fadeInUp" data-wow-delay=".3s">Project Gallery</h3>
                        <div class="media-grid wow fadeInUp" data-wow-delay=".3s">
                            <div class="row g-4">
                                @foreach($portfolio['gallery'] as $image)
                                <div class="col-sm-6">
                                    <div class="media-card">
                                        <img src="{{ asset($image) }}" alt="{{ $portfolio['title'] }} gallery image" class="img-fluid rounded">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="service-inline-cta wow fadeInUp" data-wow-delay=".2s" style="--accent:{{ $portfolio['accent'] }};">
                            <div>
                                <h4>Have a similar project in mind?</h4>
                                <p>Tell us what you're building — we'll get back to you within a day.</p>
                            </div>
                            <a class="services-cta services-cta--on-dark" href="{{ route('contact') }}">
                                <span>Get In Touch</span>
                                <span class="services-cta__icon"><i class="ri-arrow-right-up-line"></i></span>
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">
                <aside class="aside-panel">
                    <div class="side-card mb-4 side-nav wow fadeInUp" data-wow-delay=".1s">
                        <h4 class="side-title">Project Info</h4>
                        <div class="project-info-item">
                            <div class="text">
                                <span>Client:</span>
                                <h5 class="title">{{ $portfolio['client'] }}</h5>
                            </div>
                        </div>
                        <div class="project-info-item">
                            <div class="text">
                                <span>Category:</span>
                                <h5 class="title">{{ $portfolio['category'] }}</h5>
                            </div>
                        </div>
                        <div class="project-info-item">
                            <div class="text">
                                <span>Timeline:</span>
                                <h5 class="title">{{ $portfolio['timeline'] }}</h5>
                            </div>
                        </div>
                        <div class="project-info-item">
                            <div class="text">
                                <span>Year:</span>
                                <h5 class="title">{{ $portfolio['year'] }}</h5>
                            </div>
                        </div>
                        <div class="project-info-item">
                            <div class="text">
                                <span>Services Provided:</span>
                                <div class="project-meta-tags">
                                    @foreach($portfolio['team'] as $service)
                                    <span>{{ $service }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="side-card mb-4 side-nav wow fadeInUp" data-wow-delay=".2s" style="--service-accent:{{ $portfolio['accent'] }};">
                        <h3 class="side-title">More Projects</h3>
                        <nav class="services-nav">
                            <ul class="services-nav__list">
                                @foreach($portfolios as $other)
                                <li class="services-nav__item @if($other['slug'] === $portfolio['slug']) services-nav__item--active @endif">
                                    <a href="{{ route('portfolio.detail', $other['slug']) }}" class="services-nav__link d-flex justify-content-between" @if($other['slug'] === $portfolio['slug']) aria-current="page" @endif>
                                        <span>{{ $other['title'] }}</span>
                                        <span><i class="ri-arrow-right-up-long-line"></i></span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="side-card side-nav sidebar-contact-card wow fadeInUp" data-wow-delay=".3s">
                        <h4 class="side-title">Let's Talk</h4>
                        <p class="mb-4">Have a project in mind? We'd love to hear about it.</p>
                        <div class="side-contact-item">
                            <i class="ri-phone-line"></i>
                            <a href="tel:+19055148474">+1 (905) 514-8474</a>
                        </div>
                        <div class="side-contact-item mb-4">
                            <i class="ri-mail-send-line"></i>
                            <a href="mailto:info@deveoninc.com">info@deveoninc.com</a>
                        </div>
                        <a class="services-cta w-100 justify-content-between" href="{{ route('contact') }}">
                            <span>Start a Project</span>
                            <span class="services-cta__icon"><i class="ri-arrow-right-up-line"></i></span>
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<section class="contact-cta">
    <div class="container">
        <div class="contact-cta-content">
            <span class="cta-subtitle">Have a project in mind?</span>
            <h2 class="cta-title">Let's Get to Work</h2>
            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="cta-email-btn">
                    Start a Project <i class="ri-arrow-right-up-line"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
@endsection
