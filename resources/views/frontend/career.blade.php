@extends('layouts.frontend.master')

@section('title', 'Careers')
@section('meta_description', 'Explore current career opportunities and join the Deveon Inc team.')

@section('css')
<style>
    [data-theme-mode="light"] .heading-title .text-primary {
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
    }

    /* ---------- Careers hero: compact, dark, but with craft ----------
       Deliberately skips the site's .hero.pages-banner template (huge padding
       + 110px title) in favor of a short, always-dark band — scoped to this
       page only. Kept compact, but layered with texture, an icon badge, a
       solid accent pill, and a perks strip so it doesn't read as flat. */
    .careers-hero-mini {
        position: relative;
        overflow: hidden;
        padding: 68px 0 40px;
        background: linear-gradient(180deg, #121218 0%, #0a0a0d 100%);
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .careers-hero-mini::before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: 0;
        opacity: 0.5;
        background-image:
            linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 42px 42px;
        -webkit-mask-image: radial-gradient(60% 100% at 20% 0%, #000 0%, transparent 75%);
        mask-image: radial-gradient(60% 100% at 20% 0%, #000 0%, transparent 75%);
    }

    .careers-hero-mini::after {
        content: "";
        position: absolute;
        inset: 0;
        z-index: 0;
        background:
            radial-gradient(40% 90% at 12% -10%, color-mix(in srgb, var(--primary-color) 16%, transparent), transparent 70%),
            radial-gradient(30% 70% at 92% 110%, color-mix(in srgb, var(--primary-color) 10%, transparent), transparent 70%);
        pointer-events: none;
    }

    .careers-hero-mini .container {
        position: relative;
        z-index: 1;
    }

    .careers-hero-mini__crumb {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 22px;
        font-size: 0.82rem;
        color: rgba(255, 255, 255, 0.4);
    }

    .careers-hero-mini__crumb a {
        color: rgba(255, 255, 255, 0.7);
        transition: color 0.25s ease;
    }

    .careers-hero-mini__crumb a:hover {
        color: var(--primary-color);
    }

    .careers-hero-mini__crumb .current {
        color: #fff;
        font-weight: 600;
    }

    .careers-hero-mini__row {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 18px;
    }

    .careers-hero-mini__heading {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .careers-hero-mini__icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: color-mix(in srgb, var(--primary-color) 16%, transparent);
        color: var(--primary-color);
        font-size: 1.4rem;
        border: 1px solid color-mix(in srgb, var(--primary-color) 30%, transparent);
    }

    .careers-hero-mini__title {
        margin: 0;
        font-size: 2.2rem;
        font-weight: 700;
        line-height: 1.2;
        color: #fff;
    }

    .careers-hero-mini__badge {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        flex-shrink: 0;
        padding: 9px 20px;
        border-radius: 999px;
        background: var(--primary-color);
        font-size: 0.76rem;
        font-weight: 800;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: #0a0a0d;
        box-shadow: 0 16px 32px -14px color-mix(in srgb, var(--primary-color) 65%, transparent);
    }

    .careers-hero-mini__dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #0a0a0d;
        animation: careersPulse 1.8s ease-out infinite;
    }

    @keyframes careersPulse {
        0% {
            box-shadow: 0 0 0 0 rgba(10, 10, 13, 0.5);
        }

        70% {
            box-shadow: 0 0 0 6px transparent;
        }

        100% {
            box-shadow: 0 0 0 0 transparent;
        }
    }

    .careers-hero-mini__perks {
        display: flex;
        flex-wrap: wrap;
        gap: 10px 26px;
        margin: 26px 0 0;
        padding: 18px 0 0;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        list-style: none;
    }

    .careers-hero-mini__perks li {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.84rem;
        color: rgba(255, 255, 255, 0.65);
    }

    .careers-hero-mini__perks li i {
        color: var(--primary-color);
        font-size: 1rem;
    }

    @media (max-width: 575px) {
        .careers-hero-mini {
            padding: 48px 0 32px;
        }

        .careers-hero-mini__icon {
            width: 44px;
            height: 44px;
            font-size: 1.2rem;
        }

        .careers-hero-mini__title {
            font-size: 1.6rem;
        }
    }

    /* ---------- Job listing cards ---------- */
    .jobs-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .job-listing-card {
        position: relative;
        display: flex;
        align-items: center;
        gap: 26px;
        padding: 30px 32px;
        border-radius: 1.25rem;
        border: 1px solid var(--border);
        background: var(--gray-100);
        transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .job-listing-card:hover {
        transform: translateY(-4px);
        border-color: color-mix(in srgb, var(--primary-color) 45%, var(--border));
        box-shadow: 0 30px 55px -32px rgba(var(--dark-rgb), 0.4);
    }

    .job-listing-card__badge {
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 auto;
        width: 60px;
        height: 60px;
        border-radius: 16px;
        background: color-mix(in srgb, var(--primary-color) 14%, transparent);
        color: var(--primary-color);
        font-size: 1.5rem;
    }

    [data-theme-mode="light"] .job-listing-card__badge {
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.35);
    }

    .job-listing-card__body {
        flex: 1 1 auto;
        min-width: 0;
    }

    .job-listing-card__top {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px 14px;
        margin-bottom: 12px;
    }

    .job-listing-card__title {
        margin: 0;
        font-size: 1.2rem;
        font-weight: 700;
    }

    .job-listing-card__title a {
        color: rgb(var(--dark-rgb));
        background-image: linear-gradient(currentColor, currentColor);
        background-size: 0 2px;
        background-repeat: no-repeat;
        background-position: 0 100%;
        transition: background-size 0.3s ease, color 0.3s ease;
    }

    .job-listing-card__title a:hover {
        color: var(--primary-color);
        background-size: 100% 2px;
    }

    .job-listing-card__urgent {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 3px 12px;
        border-radius: 999px;
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        background: color-mix(in srgb, #d1483f 16%, transparent);
        color: #d1483f;
    }

    .job-listing-card__urgent i {
        font-size: 0.6rem;
    }

    .job-listing-card__meta {
        display: flex;
        flex-wrap: wrap;
        gap: 8px 22px;
        margin-bottom: 14px;
        padding: 0;
        list-style: none;
    }

    .job-listing-card__meta li {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.88rem;
        opacity: 0.72;
    }

    .job-listing-card__meta li i {
        color: var(--primary-color);
        font-size: 1rem;
    }

    [data-theme-mode="light"] .job-listing-card__meta li i {
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.35);
    }

    .job-listing-card__meta li.job-listing-card__salary {
        opacity: 1;
        font-weight: 700;
        color: rgb(var(--dark-rgb));
    }

    .job-listing-card__footer {
        display: flex;
        flex-wrap: wrap;
        gap: 4px 18px;
        font-size: 0.78rem;
        opacity: 0.55;
    }

    .job-listing-card__cta {
        display: inline-flex;
        align-items: center;
        gap: 14px;
        flex: 0 0 auto;
        padding: 8px 8px 8px 24px;
        border-radius: 999px;
        background: rgb(var(--dark-rgb));
        color: var(--custom-white);
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        white-space: nowrap;
        transition: gap 0.35s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.35s ease;
    }

    .job-listing-card__cta:hover {
        gap: 18px;
        color: var(--custom-white);
        box-shadow: 0 20px 40px -20px rgba(var(--dark-rgb), 0.5);
    }

    .job-listing-card__cta span {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: var(--primary-color);
        color: #111;
        font-size: 1rem;
        transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .job-listing-card__cta:hover span {
        transform: rotate(45deg);
    }

    @media (max-width: 767px) {
        .job-listing-card {
            flex-wrap: wrap;
            padding: 26px 24px;
        }

        .job-listing-card__cta {
            width: 100%;
            justify-content: space-between;
        }
    }
</style>
@endsection

@section('content')
<div class="section-spacer"></div>
<section class="careers-hero-mini">
    <div class="container">
        <div class="careers-hero-mini__crumb">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <span class="current">Careers</span>
        </div>
        <div class="careers-hero-mini__row">
            <div class="careers-hero-mini__heading">
                <span class="careers-hero-mini__icon"><i class="ri-briefcase-4-line"></i></span>
                <h1 class="careers-hero-mini__title">Careers</h1>
            </div>
            @if($careers->total() > 0)
            <span class="careers-hero-mini__badge">
                <span class="careers-hero-mini__dot"></span>
                {{ $careers->total() }} Open {{ \Illuminate\Support\Str::plural('Position', $careers->total()) }}
            </span>
            @else
            <span class="careers-hero-mini__badge">
                <span class="careers-hero-mini__dot"></span>
                Always Open To Great Talent
            </span>
            @endif
        </div>
        <ul class="careers-hero-mini__perks">
            <li><i class="ri-global-line"></i> Remote-Friendly</li>
            <li><i class="ri-time-line"></i> Flexible Hours</li>
            <li><i class="ri-line-chart-line"></i> Real Growth</li>
        </ul>
    </div>
</section>

<section class="section section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <div class="heading-section mb-5 text-center">
                    <span class="heading-subtitle rounded-pill border px-3 py-2 d-inline-flex mx-auto wow fadeInUp" data-wow-delay=".1s">
                        <i class="ri-checkbox-blank-circle-fill"></i>
                        Open Positions
                    </span>
                    <h2 class="heading-title mt-4 split-title">
                        Find Your Next <span class="text-primary">Opportunity</span>
                    </h2>
                    <p class="mt-4 mb-0">Join our team and help build digital products that make a difference.</p>
                </div>
            </div>
        </div>

        <div class="jobs-list">
            @forelse($careers as $career)
            <article class="job-listing-card wow fadeInUp" data-wow-delay=".1s">
                <div class="job-listing-card__badge">
                    <i class="ri-briefcase-4-line"></i>
                </div>
                <div class="job-listing-card__body">
                    <div class="job-listing-card__top">
                        <h3 class="job-listing-card__title">
                            <a href="{{ route('careers.show', $career->slug) }}">{{ $career->job_title }}</a>
                        </h3>
                        @if($career->application_deadline && $career->application_deadline->isFuture() && now()->diffInDays($career->application_deadline) <= 7)
                        <span class="job-listing-card__urgent"><i class="ri-time-line"></i> Closing Soon</span>
                        @endif
                    </div>
                    <ul class="job-listing-card__meta">
                        @if($career->job_type)<li><i class="ri-briefcase-line"></i>{{ $career->job_type }}</li>@endif
                        @if($career->location)<li><i class="ri-map-pin-line"></i>{{ $career->location }}</li>@endif
                        @if($career->experience)<li><i class="ri-user-star-line"></i>{{ $career->experience }}</li>@endif
                        @if($career->salary_range)<li class="job-listing-card__salary"><i class="ri-money-dollar-circle-line"></i>{{ $career->salary_range }}</li>@endif
                    </ul>
                    <div class="job-listing-card__footer">
                        <span>Posted {{ $career->created_at->diffForHumans() }}</span>
                        @if($career->application_deadline)<span>Apply by {{ $career->application_deadline->format('M d, Y') }}</span>@endif
                    </div>
                </div>
                <a href="{{ route('careers.show', $career->slug) }}" class="job-listing-card__cta">
                    View &amp; Apply
                    <span><i class="ri-arrow-right-line"></i></span>
                </a>
            </article>
            @empty
            <div class="text-center py-5">
                <h3>No open positions right now</h3>
                <p>Please check back soon for new opportunities.</p>
            </div>
            @endforelse
        </div>

        @if($careers->hasPages())
        <div class="d-flex justify-content-center mt-5">{{ $careers->links() }}</div>
        @endif
    </div>
</section>
@endsection
