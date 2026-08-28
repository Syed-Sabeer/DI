@extends('layouts.frontend.master')

@section('title', 'Page Not Found | Deveon Inc')
@section('meta_description', 'The page you are looking for could not be found. Head back home or explore our services, portfolio, and blog.')

@section('css')
<style>
    /* ---------- 404 page ----------
       Always-dark, matching the site's established dark-hero language (grid
       texture, radial glow), with a browser/terminal mockup that "runs" the
       requested URL and fails — a small on-brand joke for a software company. */
    .error-404-section {
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        min-height: 74vh;
        padding: 110px 0;
        background: linear-gradient(180deg, #121218 0%, #0a0a0d 100%);
    }

    .error-404-section::before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: 0;
        opacity: 0.5;
        background-image:
            linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 42px 42px;
        -webkit-mask-image: radial-gradient(60% 70% at 50% 35%, #000 0%, transparent 75%);
        mask-image: radial-gradient(60% 70% at 50% 35%, #000 0%, transparent 75%);
    }

    .error-404-section::after {
        content: "";
        position: absolute;
        inset: 0;
        z-index: 0;
        background: radial-gradient(45% 55% at 50% 25%, color-mix(in srgb, var(--primary-color) 18%, transparent), transparent 70%);
        pointer-events: none;
    }

    .error-404-watermark {
        position: absolute;
        top: 50%;
        inset-inline-end: -60px;
        z-index: 0;
        transform: translateY(-50%) rotate(-18deg);
        font-size: 22rem;
        line-height: 1;
        color: rgba(255, 255, 255, 0.035);
        pointer-events: none;
    }

    .error-404-content {
        position: relative;
        z-index: 1;
        max-width: 640px;
        margin: 0 auto;
    }

    .error-404-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 22px;
        padding: 9px 22px;
        border-radius: 999px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        background: rgba(255, 255, 255, 0.05);
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.8);
    }

    .error-404-eyebrow .dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--primary-color);
        animation: error404Pulse 1.8s ease-out infinite;
    }

    @keyframes error404Pulse {
        0% {
            box-shadow: 0 0 0 0 color-mix(in srgb, var(--primary-color) 55%, transparent);
        }

        70% {
            box-shadow: 0 0 0 7px transparent;
        }

        100% {
            box-shadow: 0 0 0 0 transparent;
        }
    }

    .error-404-code {
        margin: 0 0 24px;
        font-size: clamp(6rem, 20vw, 12rem);
        font-weight: 800;
        line-height: 1;
        letter-spacing: -0.03em;
        color: #fff;
    }

    .error-404-code span {
        color: var(--primary-color);
        text-shadow: 0 0 40px color-mix(in srgb, var(--primary-color) 65%, transparent);
    }

    /* Terminal mockup, matching the portfolio project cards' browser-window style */
    .error-404-terminal {
        margin: 0 auto 30px;
        max-width: 460px;
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        background: #0e0e12;
        box-shadow: 0 30px 60px -30px rgba(0, 0, 0, 0.7);
        text-align: left;
    }

    .error-404-terminal__bar {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 11px 14px;
        background: rgba(255, 255, 255, 0.04);
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .error-404-terminal__bar span {
        width: 9px;
        height: 9px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.18);
    }

    .error-404-terminal__bar span:first-child {
        background: var(--primary-color);
    }

    .error-404-terminal__path {
        margin-inline-start: 8px;
        font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, "Liberation Mono", monospace;
        font-size: 0.72rem;
        color: rgba(255, 255, 255, 0.4);
    }

    .error-404-terminal__body {
        padding: 18px 20px 20px;
        font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, "Liberation Mono", monospace;
        font-size: 0.86rem;
        line-height: 1.8;
    }

    .error-404-terminal__body p {
        margin: 0;
        word-break: break-word;
        color: rgba(255, 255, 255, 0.7);
    }

    .error-404-terminal__prompt {
        margin-inline-end: 8px;
        color: var(--primary-color);
        font-weight: 700;
    }

    .error-404-terminal__error {
        color: #ff6b6b !important;
    }

    .error-404-terminal__cursor {
        display: inline-block;
        width: 7px;
        height: 14px;
        margin-inline-start: 3px;
        background: var(--primary-color);
        vertical-align: -2px;
        animation: error404Blink 1.1s step-end infinite;
    }

    @keyframes error404Blink {
        50% {
            opacity: 0;
        }
    }

    .error-404-title {
        margin: 0 0 14px;
        font-size: clamp(1.9rem, 4vw, 2.8rem);
        font-weight: 800;
        color: #fff;
    }

    .error-404-title span {
        color: var(--primary-color);
    }

    .error-404-desc {
        margin: 0 auto 34px;
        max-width: 460px;
        font-size: 1rem;
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.6);
    }

    .error-404-actions {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 22px;
        margin-bottom: 40px;
    }

    .services-cta {
        display: inline-flex;
        align-items: center;
        gap: 16px;
        padding: 8px 8px 8px 26px;
        border-radius: 999px;
        background: var(--primary-color);
        color: #0a0a0d;
        font-weight: 700;
        font-size: 0.9rem;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        transition: gap 0.35s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.35s ease;
    }

    .services-cta:hover {
        gap: 20px;
        color: #0a0a0d;
        box-shadow: 0 20px 40px -18px color-mix(in srgb, var(--primary-color) 60%, transparent);
    }

    .services-cta__icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #0a0a0d;
        color: var(--primary-color);
        font-size: 1.1rem;
        transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .services-cta:hover .services-cta__icon {
        transform: rotate(45deg);
    }

    .error-404-secondary-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 700;
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.75);
        transition: color 0.25s ease, gap 0.25s ease;
    }

    .error-404-secondary-link i {
        color: var(--primary-color);
        transition: transform 0.25s ease;
    }

    .error-404-secondary-link:hover {
        color: #fff;
        gap: 12px;
    }

    .error-404-secondary-link:hover i {
        transform: translateX(3px);
    }

    .error-404-links {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 10px 22px;
        padding-top: 30px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
    }

    .error-404-links a {
        font-size: 0.85rem;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.55);
        transition: color 0.25s ease;
    }

    .error-404-links a:hover {
        color: var(--primary-color);
    }

    @media (max-width: 575px) {
        .error-404-section {
            padding: 80px 0;
            min-height: unset;
        }

        .error-404-watermark {
            font-size: 12rem;
        }

        .error-404-actions {
            flex-direction: column;
            gap: 16px;
        }
    }
</style>
@endsection

@section('content')
<div class="section-spacer"></div>
<section class="error-404-section">
    <i class="ri-terminal-box-line error-404-watermark"></i>
    <div class="container">
        <div class="error-404-content text-center">
            {{-- <span class="error-404-eyebrow">
                <span class="dot"></span>
                Error 404
            </span> --}}

            <h1 class="error-404-code">4<span>0</span>4</h1>

            <div class="error-404-terminal">
                <div class="error-404-terminal__bar">
                    <span></span><span></span><span></span>
                    <span class="error-404-terminal__path">~/404</span>
                </div>
                <div class="error-404-terminal__body">
                    <p><span class="error-404-terminal__prompt">$</span>cd /{{ request()->path() === '/' ? '' : request()->path() }}</p>
                    <p class="error-404-terminal__error">bash: cd: No such file or directory<span class="error-404-terminal__cursor"></span></p>
                </div>
            </div>

            <h2 class="error-404-title">Page Not <span>Found</span></h2>
            <p class="error-404-desc">The page you're looking for doesn't exist, may have moved, or the URL might be mistyped.</p>

            <div class="error-404-actions">
                <a href="{{ route('home') }}" class="services-cta">
                    <span>Back To Home</span>
                    <span class="services-cta__icon"><i class="ri-arrow-right-up-line"></i></span>
                </a>
                <a href="{{ route('contact') }}" class="error-404-secondary-link">
                    Contact Support <i class="ri-arrow-right-line"></i>
                </a>
            </div>

            <nav class="error-404-links">
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('service') }}">Services</a>
                <a href="{{ route('portfolio') }}">Portfolio</a>
                <a href="{{ route('blog') }}">Blog</a>
                <a href="{{ route('careers') }}">Careers</a>
            </nav>
        </div>
    </div>
</section>
@endsection
