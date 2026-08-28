@extends('layouts.frontend.master')

@section('title', 'Our Portfolio | Deveon Inc')
@section('meta_description', 'Explore Deveon Inc\'s portfolio of software platforms, mobile apps, e-commerce stores, and enterprise systems designed and built for ambitious teams.')

@section('css')
<style>
    /* ---------- Portfolio intro ---------- */
    .portfolio-intro p {
        font-size: 1.05rem;
        line-height: 1.75;
        opacity: 0.72;
    }

    /* ---------- Portfolio grid (3D tilt showcase) ---------- */
    .portfolio-section .portfolio-card {
        --accent: var(--primary-color);
        position: relative;
        display: block;
        height: 100%;
        border-radius: 1.5rem;
        border: 1px solid var(--border);
        background: var(--gray-100);
        padding: 20px 20px 26px;
        transition: transform 0.15s ease-out, box-shadow 0.4s ease, border-color 0.4s ease;
        transform-style: preserve-3d;
        will-change: transform;
    }

    .portfolio-section .portfolio-card:hover {
        box-shadow: 0 40px 70px -30px rgba(var(--dark-rgb), 0.45);
        border-color: color-mix(in srgb, var(--accent) 45%, var(--border));
    }

    .portfolio-section .portfolio-card__glow {
        position: absolute;
        inset: 0;
        z-index: 2;
        border-radius: inherit;
        pointer-events: none;
        opacity: 0;
        background: radial-gradient(280px circle at var(--x, 50%) var(--y, 50%), color-mix(in srgb, var(--accent) 22%, transparent), transparent 60%);
        transition: opacity 0.4s ease;
    }

    .portfolio-section .portfolio-card:hover .portfolio-card__glow {
        opacity: 1;
    }

    .portfolio-section .portfolio-card__frame {
        position: relative;
        z-index: 1;
        border-radius: 1rem;
        overflow: hidden;
        border: 1px solid var(--border);
        background: var(--custom-white);
        transform: translateZ(30px);
    }

    .portfolio-section .portfolio-card__bar {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 12px 14px;
        background: var(--gray-200);
        border-bottom: 1px solid var(--border);
    }

    .portfolio-section .portfolio-card__bar span {
        width: 9px;
        height: 9px;
        border-radius: 50%;
        background: rgb(var(--dark-rgb));
        opacity: 0.16;
    }

    .portfolio-section .portfolio-card__bar span:first-child {
        background: var(--accent);
        opacity: 0.85;
    }

    .portfolio-section .portfolio-card__url {
        margin-inline-start: 8px;
        padding: 3px 12px;
        border-radius: 999px;
        background: var(--custom-white);
        border: 1px solid var(--border);
        font-size: 0.7rem;
        color: rgb(var(--dark-rgb));
        opacity: 0.55;
    }

    .portfolio-section .portfolio-card__screen {
        position: relative;
        aspect-ratio: 16 / 10;
        overflow: hidden;
        background: var(--gray-200);
    }

    .portfolio-section .portfolio-card__screen img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .portfolio-section .portfolio-card:hover .portfolio-card__screen img {
        transform: scale(1.05);
    }

    .portfolio-section .portfolio-card__info {
        position: relative;
        z-index: 1;
        padding-top: 22px;
        transform: translateZ(20px);
    }

    .portfolio-section .portfolio-card__tag {
        display: inline-flex;
        padding: 5px 14px;
        border-radius: 999px;
        margin-bottom: 14px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        background: var(--accent);
        color: #fff;
    }

    .portfolio-section .portfolio-card__title {
        margin: 0 0 10px;
        font-size: 1.15rem;
        font-weight: 700;
        line-height: 1.35;
        color: rgb(var(--dark-rgb));
    }

    .portfolio-section .portfolio-card__title a {
        color: inherit;
        background-image: linear-gradient(currentColor, currentColor);
        background-size: 0 2px;
        background-repeat: no-repeat;
        background-position: 0 100%;
        transition: background-size 0.3s ease, color 0.3s ease;
    }

    .portfolio-section .portfolio-card__title a:hover {
        color: var(--accent);
        background-size: 100% 2px;
    }

    .portfolio-section .portfolio-card__desc {
        margin: 0 0 16px;
        font-size: 0.88rem;
        line-height: 1.6;
        opacity: 0.7;
    }

    .portfolio-section .portfolio-card__link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.85rem;
        font-weight: 700;
        color: rgb(var(--dark-rgb));
        transition: gap 0.3s ease, color 0.3s ease;
    }

    .portfolio-section .portfolio-card__link i {
        color: var(--accent);
        transition: transform 0.3s ease;
    }

    .portfolio-section .portfolio-card:hover .portfolio-card__link {
        color: var(--accent);
        gap: 10px;
    }

    .portfolio-section .portfolio-card:hover .portfolio-card__link i {
        transform: translate(2px, -2px);
    }

    [data-theme-mode="light"] .heading-title .text-primary {
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
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
    'heroEyebrow' => 'Featured Projects',
    'heroTitle' => 'Our <span>Portfolio</span>',
    'heroWatermarkIcon' => 'ri-window-line',
    'heroCrumbCurrent' => 'portfolio',
])
<!-- /Hero -->

<!-- Intro -->
<section class="section pb-0 portfolio-intro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <div class="heading-section text-center">
                    <span class="heading-subtitle rounded-pill border px-3 py-2 d-inline-flex mx-auto wow fadeInUp" data-wow-delay=".1s">
                        <i class="ri-checkbox-blank-circle-fill"></i>
                        Our Projects
                    </span>
                    <h2 class="heading-title mt-4 split-title">
                        Real Projects, <span class="text-primary">Real Results</span>
                    </h2>
                    <p class="mt-4 mb-0">
                        A closer look at the platforms, apps, and systems we've designed, built, and shipped for teams across industries.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio grid -->
<section class="section portfolio-section">
    <div class="container">
        <div class="row gy-4">
            @foreach($portfolios as $item)
            <div class="col-md-6 col-lg-4">
                <article class="portfolio-card wow fadeInUp" data-wow-delay=".{{ ($loop->index % 3) + 1 }}s" data-tilt style="--accent:{{ $item['accent'] }};">
                    <div class="portfolio-card__glow"></div>
                    <div class="portfolio-card__frame">
                        <div class="portfolio-card__bar">
                            <span></span><span></span><span></span>
                            <span class="portfolio-card__url">deveoninc.com/{{ $item['slug'] }}</span>
                        </div>
                        <div class="portfolio-card__screen">
                            <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" loading="lazy">
                        </div>
                    </div>
                    <div class="portfolio-card__info">
                        <span class="portfolio-card__tag">{{ $item['category'] }}</span>
                        <h3 class="portfolio-card__title">
                            <a href="{{ route('portfolio.detail', $item['slug']) }}">{{ $item['title'] }}</a>
                        </h3>
                        <p class="portfolio-card__desc">{{ $item['short'] }}</p>
                        <a class="portfolio-card__link" href="{{ route('portfolio.detail', $item['slug']) }}">View Project <i class="ri-arrow-right-up-line"></i></a>
                    </div>
                </article>
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
<script>
    (function () {
        var cards = document.querySelectorAll('.portfolio-section [data-tilt]');
        if (!cards.length) return;

        var canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
        var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (!canHover || reduceMotion) return;

        cards.forEach(function (card) {
            card.addEventListener('mousemove', function (e) {
                var rect = card.getBoundingClientRect();
                var px = (e.clientX - rect.left) / rect.width;
                var py = (e.clientY - rect.top) / rect.height;
                var rotateX = (0.5 - py) * 10;
                var rotateY = (px - 0.5) * 12;

                card.style.transform = 'perspective(1000px) rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg) translateY(-4px)';
                card.style.setProperty('--x', (px * 100) + '%');
                card.style.setProperty('--y', (py * 100) + '%');
            });

            card.addEventListener('mouseleave', function () {
                card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0)';
            });
        });
    })();
</script>
@endsection
