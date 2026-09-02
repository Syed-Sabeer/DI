@extends('layouts.frontend.master')
@php use Illuminate\Support\Str; @endphp
@section('meta_keywords', strtolower($service['title']).' services, '.strtolower($service['title']).' company USA,
'.strtolower($service['title']).' agency Canada, hire '.strtolower($service['title']).' developers UK Australia, Deveon
Inc')

@section('title', $service['title'].' Services in USA, Canada, UK & Australia')
@section('meta_description', Str::limit($service['short'], 150).' Deveon Inc — Powering Intelligent Systems.')

@section('css')
<style>
    /* ---------- Hero icon badge ---------- */
    .service-hero-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 78px;
        height: 78px;
        border-radius: 22px;
        margin: 0 auto 24px;
        font-size: 2.1rem;
        background: color-mix(in srgb, var(--accent) 16%, transparent);
        color: var(--accent);
        box-shadow: 0 20px 45px -20px color-mix(in srgb, var(--accent) 60%, transparent);
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
        font-size: 42px;
        line-height: 1.15;
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

    /* ---------- Process steps ---------- */
    .process-steps {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .process-step {
        flex: 1 1 210px;
        padding: 26px 24px;
        border: 1px solid var(--border);
        border-radius: 16px;
        background: var(--gray-100);
    }

    .process-step__num {
        font-size: 1.9rem;
        font-weight: 800;
        line-height: 1;
        margin-bottom: 12px;
        color: var(--accent);
        opacity: 0.5;
    }

    .process-step__title {
        font-weight: 700;
        margin-bottom: 8px;
        color: rgb(var(--dark-rgb));
    }

    .process-step__desc {
        font-size: 0.88rem;
        line-height: 1.6;
        opacity: 0.7;
        margin-bottom: 0;
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

    /* On an already-dark surface (e.g. the inline CTA banner), invert to a light pill so it still pops. */
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
'heroEyebrow' => $service['tagline'],
'heroTitle' => e($service['title']),
'heroIconBadge' => $service['icon'],
'heroWatermarkIcon' => $service['icon'],
'heroAccent' => $service['accent'],
'heroCrumbMiddle' => ['label' => 'services', 'route' => route('service')],
'heroCrumbCurrent' => $service['slug'],
])
<!-- /Hero -->

<section class="section service-article section-gap">
    <div class="container">
        <div class="row g-5">
            <!-- CONTENT -->
            <div class="col-lg-8">
                <article class="article-shell" style="--accent:{{ $service['accent'] }};">
                    <header class="article-head">
                        <span class="service-eyebrow">
                            <i class="ri-checkbox-blank-circle-fill"></i>
                            {{ $service['title'] }}
                        </span>
                        <h2 class="article-title service-title split-title">{{ $service['tagline'] }}</h2>
                    </header>
                    <div class="article-body">
                        <p class="service-subheading wow fadeInUp" data-wow-delay=".1s">{{ $service['subheading'] }}</p>
                        <p class="wow fadeInUp" data-wow-delay=".2s">{{ $service['intro'] }}</p>

                        <h3 class="section-title wow fadeInUp" data-wow-delay=".3s">What's Included</h3>
                        <div class="row g-3 mb-4 wow fadeInUp" data-wow-delay=".4s">
                            @foreach($service['features'] as $feature)
                            <div class="col-sm-6">
                                <div class="feature-tile">
                                    <span class="feature-tile__num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT)
                                        }}</span>
                                    <div>
                                        <h4 class="feature-tile__title">{{ $feature['title'] }}</h4>
                                        <p class="feature-tile__desc">{{ $feature['desc'] }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <h3 class="section-title wow fadeInUp" data-wow-delay=".5s">How We Work</h3>
                        <p class="wow fadeInUp" data-wow-delay=".6s">A simple, transparent process that keeps you
                            informed from kickoff to launch — and after.</p>
                        <div class="process-steps mb-4 wow fadeInUp" data-wow-delay=".6s">
                            <div class="process-step">
                                <div class="process-step__num">01</div>
                                <h4 class="process-step__title">Discover</h4>
                                <p class="process-step__desc">We dig into your goals, users, and constraints to scope
                                    the right solution.</p>
                            </div>
                            <div class="process-step">
                                <div class="process-step__num">02</div>
                                <h4 class="process-step__title">Plan</h4>
                                <p class="process-step__desc">We map the approach — architecture, design, or strategy —
                                    before execution begins.</p>
                            </div>
                            <div class="process-step">
                                <div class="process-step__num">03</div>
                                <h4 class="process-step__title">Build</h4>
                                <p class="process-step__desc">We execute in focused sprints, with regular check-ins so
                                    you always know where things stand.</p>
                            </div>
                            <div class="process-step">
                                <div class="process-step__num">04</div>
                                <h4 class="process-step__title">Grow</h4>
                                <p class="process-step__desc">We launch, measure, and keep refining so the results
                                    compound over time.</p>
                            </div>
                        </div>

                        <div class="service-inline-cta wow fadeInUp" data-wow-delay=".2s"
                            style="--accent:{{ $service['accent'] }};">
                            <div>
                                <h4>Ready to start your {{ $service['title'] }} project?</h4>
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
                    <div class="side-card mb-4 side-nav wow fadeInUp" data-wow-delay=".1s"
                        style="--service-accent:{{ $service['accent'] }};">
                        <h3 class="side-title">All Services</h3>
                        <nav class="services-nav">
                            <ul class="services-nav__list">
                                @foreach($services as $other)
                                <li
                                    class="services-nav__item @if($other['slug'] === $service['slug']) services-nav__item--active @endif">
                                    <a href="{{ route('service.detail', $other['slug']) }}"
                                        class="services-nav__link d-flex justify-content-between"
                                        @if($other['slug']===$service['slug']) aria-current="page" @endif>
                                        <span>{{ $other['title'] }}</span>
                                        <span><i class="ri-arrow-right-up-long-line"></i></span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="side-card side-nav sidebar-contact-card wow fadeInUp" data-wow-delay=".2s">
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

@section('schema')
<script type="application/ld+json">
    @php $ld = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'Service',
            '@id' => url('/service-detail/' . $service['slug']) . '#service',
            'name' => $service['title'],
            'description' => strip_tags($service['short'] ?? ''),
            'serviceType' => $service['title'],
            'url' => url('/service-detail/' . $service['slug']),
            'provider' => ['@id' => url('/') . '#organization'],
            'areaServed' => array_map(fn ($m) => ['@type' => 'Country', 'name' => $m['name']], config('seo.targetMarkets')),
            'audience' => ['@type' => 'BusinessAudience', 'name' => 'Businesses and startups'],
        ],
        ['@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')], ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => url('/service')], ['@type' => 'ListItem', 'position' => 3, 'name' => $service['title'], 'item' => url('/service-detail/' . $service['slug'])]]],
    ],
]; @endphp
{!! json_encode($ld, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection