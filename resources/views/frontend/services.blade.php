@extends('layouts.frontend.master')
@section('meta_keywords', 'software development services, mobile app development services, web development company, UI
UX design services, AI ML development services, SEO marketing agency, branding agency, USA Canada UK Australia')

@section('title', 'Software Development & AI Services')
@section('meta_description', 'Custom software, web and mobile app development, UI/UX design, branding, SEO and AI/ML
services from Deveon Inc — delivered for clients in the USA, Canada, UK and Australia.')

@section('css')
<style>
    /* ---------- Services intro ---------- */
    .services-intro p {
        font-size: 1.05rem;
        line-height: 1.75;
        opacity: 0.72;
    }

    /* ---------- Services grid (matches about page card design) ---------- */
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

    .services-card__title a {
        color: inherit;
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

    [data-theme-mode="light"] .heading-title .text-primary {
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
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

    /* ---------- Bottom CTA ---------- */
    .contact-cta .cta-actions {
        margin-top: 8px;
    }

    .contact-cta .cta-email-btn {
        display: inline-flex;
        align-items: center;
        gap: 12px;
    }
</style>
@endsection

@section('content')
<div class="section-spacer"></div>
<!-- Hero -->
@include('frontend.partials.page-hero', [
'heroEyebrow' => 'What We Do',
'heroTitle' => 'Our <span>Services</span>',
'heroWatermarkIcon' => 'ri-terminal-box-line',
'heroCrumbCurrent' => 'services',
])
<!-- /Hero -->

<!-- Intro -->
<section class="section pb-0 services-intro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <div class="heading-section text-center">
                    <span class="heading-subtitle rounded-pill border px-3 py-2 d-inline-flex mx-auto wow fadeInUp"
                        data-wow-delay=".1s">
                        <i class="ri-checkbox-blank-circle-fill"></i>
                        What We Do
                    </span>
                    <h2 class="heading-title mt-4 split-title">
                        Everything You Need To <span class="text-primary">Build, Launch</span> And Grow
                    </h2>
                    <p class="mt-4 mb-0">
                        From the first line of code to the campaign that brings customers in the door, our team covers
                        every discipline your product and brand need under one roof.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services grid -->
<section class="section services-section">
    <div class="container">
        <div class="row gy-4">
            @foreach($services as $service)
            <div class="col-sm-6 col-lg-4">
                <div class="services-card wow fadeInUp" data-wow-delay=".{{ ($loop->index % 3) + 1 }}s"
                    style="--accent:{{ $service['accent'] }};">
                    <span class="services-card__index">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="services-card__icon">
                        <i class="{{ $service['icon'] }}"></i>
                    </div>
                    <h3 class="services-card__title">
                        <a href="{{ route('service.detail', $service['slug']) }}">{{ $service['title'] }}</a>
                    </h3>
                    <p class="services-card__desc">
                        {{ $service['short'] }}
                    </p>
                    <a class="services-card__cta" href="{{ route('service.detail', $service['slug']) }}">
                        Explore Service <i class="ri-arrow-right-up-line"></i>
                    </a>
                </div>
            </div>
            @endforeach
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
            '@type' => 'CollectionPage',
            '@id' => url('/service') . '#collection',
            'url' => url('/service'),
            'name' => 'Services',
            'mainEntity' => [
                '@type' => 'ItemList',
                'itemListElement' => collect($services ?? [])->values()->map(fn ($s, $i) => [
                    '@type' => 'ListItem',
                    'position' => $i + 1,
                    'name' => $s['title'] ?? '',
                    'url' => url('/service-detail/' . ($s['slug'] ?? '')),
                ])->all(),
            ],
        ],
        ['@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')], ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => url('/service')]]],
    ],
]; @endphp
{!! json_encode($ld, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection