@extends('layouts.frontend.master')
@section('meta_type', 'article')
@section('meta_image', asset($portfolio['image']))
@section('meta_keywords', strtolower($portfolio['category']).', '.strtolower($portfolio['title']).', custom software case study, Deveon Inc portfolio')

@section('title', $portfolio['title'])
@section('meta_description', $portfolio['short'])

@section('css')
<style>
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

    /* ---------- Project gallery: compact grid ---------- */
    .portfolio-gallery-hint {
        margin: 0 0 18px;
        font-size: 0.88rem;
        opacity: 0.6;
    }

    .portfolio-gallery-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 14px;
    }

    .portfolio-gallery-item {
        display: block;
        position: relative;
        width: 100%;
        aspect-ratio: 4 / 3;
        overflow: hidden;
        padding: 0;
        border-radius: 0.75rem;
        border: 1px solid var(--border);
        background: var(--gray-100);
        cursor: pointer;
        transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .portfolio-gallery-item:hover {
        transform: translateY(-3px);
        border-color: color-mix(in srgb, var(--accent, var(--primary-color)) 45%, var(--border));
        box-shadow: 0 20px 40px -24px rgba(var(--dark-rgb), 0.4);
    }

    .portfolio-gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        transition: transform 0.4s ease;
    }

    .portfolio-gallery-item:hover img {
        transform: scale(1.08);
    }

    .portfolio-gallery-item__num {
        position: absolute;
        top: 8px;
        left: 8px;
        z-index: 2;
        padding: 2px 8px;
        border-radius: 6px;
        background: rgba(0, 0, 0, 0.55);
        color: #fff;
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 0.05em;
    }

    .portfolio-gallery-item__zoom {
        position: absolute;
        inset: 0;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, 0);
        color: #fff;
        font-size: 1.4rem;
        opacity: 0;
        transition: opacity 0.3s ease, background 0.3s ease;
    }

    .portfolio-gallery-item:hover .portfolio-gallery-item__zoom {
        opacity: 1;
        background: rgba(0, 0, 0, 0.35);
    }

    @media (max-width: 991px) {
        .portfolio-gallery-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 575px) {
        .portfolio-gallery-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* ---------- Gallery lightbox ---------- */
    .portfolio-lightbox {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
        background: rgba(5, 5, 8, 0.92);
        backdrop-filter: blur(6px);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .portfolio-lightbox.is-open {
        opacity: 1;
        visibility: visible;
    }

    .portfolio-lightbox__stage {
        position: relative;
        max-width: 1100px;
        width: 100%;
        text-align: center;
    }

    .portfolio-lightbox__img {
        max-width: 100%;
        max-height: 82vh;
        border-radius: 14px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 40px 100px -30px rgba(0, 0, 0, 0.7);
        transform: scale(0.96);
        opacity: 0;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .portfolio-lightbox.is-open .portfolio-lightbox__img {
        transform: scale(1);
        opacity: 1;
    }

    .portfolio-lightbox__counter {
        display: block;
        margin-top: 16px;
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.85rem;
        letter-spacing: 0.05em;
    }

    .portfolio-lightbox__close {
        position: absolute;
        top: 24px;
        right: 24px;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 46px;
        height: 46px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        color: #fff;
        font-size: 1.4rem;
        cursor: pointer;
        transition: background 0.25s ease, color 0.25s ease, transform 0.25s ease;
    }

    .portfolio-lightbox__close:hover {
        background: var(--primary-color);
        color: #111;
        transform: rotate(90deg);
    }

    .portfolio-lightbox__nav {
        position: absolute;
        top: 50%;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 52px;
        height: 52px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        color: #fff;
        font-size: 1.6rem;
        cursor: pointer;
        transform: translateY(-50%);
        transition: background 0.25s ease, color 0.25s ease;
    }

    .portfolio-lightbox__nav:hover {
        background: var(--primary-color);
        color: #111;
    }

    .portfolio-lightbox__nav--prev {
        left: 16px;
    }

    .portfolio-lightbox__nav--next {
        right: 16px;
    }

    @media (max-width: 767px) {
        .portfolio-lightbox {
            padding: 20px;
        }

        .portfolio-lightbox__close {
            top: 14px;
            right: 14px;
            width: 40px;
            height: 40px;
        }

        .portfolio-lightbox__nav {
            width: 42px;
            height: 42px;
            font-size: 1.3rem;
        }
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
@include('frontend.partials.page-hero', [
    'heroEyebrow' => $portfolio['category'],
    'heroTitle' => e($portfolio['title']),
    'heroWatermarkIcon' => 'ri-window-line',
    'heroAccent' => $portfolio['accent'],
    'heroCrumbMiddle' => ['label' => 'portfolio', 'route' => route('portfolio')],
    'heroCrumbCurrent' => $portfolio['slug'],
])
<!-- /Hero -->

<section class="section service-article section-gap">
    <div class="container">
        @include('frontend.partials.detail-cover', [
            'coverImage'  => asset($portfolio['image']),
            'coverAlt'    => $portfolio['title'],
            'coverPath'   => '~/portfolio/<b>' . e($portfolio['slug']) . '</b>',
            'coverBadge'  => $portfolio['year'] ?? null,
            'coverAccent' => $portfolio['accent'],
        ])
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

                        <h3 class="section-title mb-2 wow fadeInUp" data-wow-delay=".3s">Project Gallery</h3>
                        <p class="portfolio-gallery-hint wow fadeInUp" data-wow-delay=".3s">Click any screenshot to view it full size.</p>
                        <div class="portfolio-gallery-grid mb-4 wow fadeInUp" data-wow-delay=".3s">
                            @foreach($portfolio['gallery'] as $image)
                            <button type="button" class="portfolio-gallery-item" data-lightbox-src="{{ asset($image) }}">
                                <img src="{{ asset($image) }}" alt="{{ $portfolio['title'] }} screenshot {{ $loop->iteration }}" loading="lazy">
                                <span class="portfolio-gallery-item__num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <span class="portfolio-gallery-item__zoom"><i class="ri-zoom-in-line"></i></span>
                            </button>
                            @endforeach
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


<!-- Gallery lightbox -->
<div class="portfolio-lightbox" id="portfolioLightbox" aria-hidden="true">
    <button type="button" class="portfolio-lightbox__close" aria-label="Close"><i class="ri-close-line"></i></button>
    <button type="button" class="portfolio-lightbox__nav portfolio-lightbox__nav--prev" aria-label="Previous screenshot"><i class="ri-arrow-left-s-line"></i></button>
    <button type="button" class="portfolio-lightbox__nav portfolio-lightbox__nav--next" aria-label="Next screenshot"><i class="ri-arrow-right-s-line"></i></button>
    <div class="portfolio-lightbox__stage">
        <img src="" alt="" class="portfolio-lightbox__img" loading="lazy" decoding="async">
        <span class="portfolio-lightbox__counter"></span>
    </div>
</div>

@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var items = Array.prototype.slice.call(document.querySelectorAll('.portfolio-gallery-item'));
    var lightbox = document.getElementById('portfolioLightbox');
    if (!items.length || !lightbox) return;

    // The page content sits inside a GSAP ScrollSmoother wrapper, which applies
    // a transform for the smooth-scroll effect. A `transform` on any ancestor
    // turns that ancestor into the containing block for `position: fixed`
    // descendants, so the lightbox would otherwise be trapped inside the
    // scroll container instead of covering the real viewport. Moving it to
    // <body> escapes that (same fix already used for the career apply modal).
    if (lightbox.parentElement !== document.body) {
        document.body.appendChild(lightbox);
    }

    var img = lightbox.querySelector('.portfolio-lightbox__img');
    var counter = lightbox.querySelector('.portfolio-lightbox__counter');
    var closeBtn = lightbox.querySelector('.portfolio-lightbox__close');
    var prevBtn = lightbox.querySelector('.portfolio-lightbox__nav--prev');
    var nextBtn = lightbox.querySelector('.portfolio-lightbox__nav--next');
    var currentIndex = 0;

    function show(index) {
        currentIndex = (index + items.length) % items.length;
        var item = items[currentIndex];
        img.src = item.getAttribute('data-lightbox-src');
        img.alt = item.querySelector('img').alt;
        counter.textContent = (currentIndex + 1) + ' / ' + items.length;
    }

    function open(index) {
        show(index);
        lightbox.classList.add('is-open');
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function close() {
        lightbox.classList.remove('is-open');
        lightbox.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    items.forEach(function (item, index) {
        item.addEventListener('click', function () { open(index); });
    });

    closeBtn.addEventListener('click', close);
    prevBtn.addEventListener('click', function () { show(currentIndex - 1); });
    nextBtn.addEventListener('click', function () { show(currentIndex + 1); });

    lightbox.addEventListener('click', function (event) {
        if (event.target === lightbox) close();
    });

    document.addEventListener('keydown', function (event) {
        if (!lightbox.classList.contains('is-open')) return;
        if (event.key === 'Escape') close();
        if (event.key === 'ArrowLeft') show(currentIndex - 1);
        if (event.key === 'ArrowRight') show(currentIndex + 1);
    });
});
</script>
@endsection

@section('schema')
<script type="application/ld+json">
@php $ld = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'CreativeWork',
            '@id' => url('/portfolio/' . $portfolio['slug']) . '#work',
            'name' => $portfolio['title'],
            'headline' => $portfolio['title'],
            'description' => $portfolio['short'],
            'url' => url('/portfolio/' . $portfolio['slug']),
            'image' => asset($portfolio['image']),
            'genre' => $portfolio['category'],
            'creator' => ['@id' => url('/') . '#organization'],
            'dateCreated' => $portfolio['year'] ?? null,
            'keywords' => $portfolio['category'],
        ],
        ['@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')], ['@type' => 'ListItem', 'position' => 2, 'name' => 'Portfolio', 'item' => url('/portfolio')], ['@type' => 'ListItem', 'position' => 3, 'name' => $portfolio['title'], 'item' => url('/portfolio/' . $portfolio['slug'])]]],
    ],
]; @endphp
{!! json_encode($ld, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection
