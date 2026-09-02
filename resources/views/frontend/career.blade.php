@extends('layouts.frontend.master')
@section('meta_keywords', 'software developer jobs, AI engineer careers, UI UX designer jobs, remote software jobs, tech
careers Karachi, Deveon Inc careers')

@section('title', 'Careers at Deveon Inc | Software & AI Jobs')
@section('meta_description', 'Join Deveon Inc — we build custom software and AI systems for clients across North
America, the UK and Australia. See our open engineering, design and product roles.')

@section('css')
<style>
    [data-theme-mode="light"] .heading-title .text-primary {
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
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
@include('frontend.partials.page-hero', [
'heroEyebrow' => $careers->total() > 0
? $careers->total() . ' Open ' . \Illuminate\Support\Str::plural('Position', $careers->total())
: 'Always Open To Great Talent',
'heroTitle' => 'Careers',
'heroWatermarkIcon' => 'ri-briefcase-4-line',
'heroCrumbCurrent' => 'careers',
])

<section class="section section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <div class="heading-section mb-5 text-center">
                    <span class="heading-subtitle rounded-pill border px-3 py-2 d-inline-flex mx-auto wow fadeInUp"
                        data-wow-delay=".1s">
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
                        @if($career->application_deadline && $career->application_deadline->isFuture() &&
                        now()->diffInDays($career->application_deadline) <= 7) <span class="job-listing-card__urgent"><i
                                class="ri-time-line"></i> Closing Soon</span>
                            @endif
                    </div>
                    <ul class="job-listing-card__meta">
                        @if($career->job_type)<li><i class="ri-briefcase-line"></i>{{ $career->job_type }}</li>@endif
                        @if($career->location)<li><i class="ri-map-pin-line"></i>{{ $career->location }}</li>@endif
                        @if($career->experience)<li><i class="ri-user-star-line"></i>{{ $career->experience }}</li>
                        @endif
                        @if($career->salary_range)<li class="job-listing-card__salary"><i
                                class="ri-money-dollar-circle-line"></i>{{ $career->salary_range }}</li>@endif
                    </ul>
                    <div class="job-listing-card__footer">
                        <span>Posted {{ $career->created_at->diffForHumans() }}</span>
                        @if($career->application_deadline)<span>Apply by {{ $career->application_deadline->format('M d,
                            Y') }}</span>@endif
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

@section('schema')
<script type="application/ld+json">
    @php $ld = [
    '@context' => 'https://schema.org',
    '@graph' => [
        ['@type' => 'CollectionPage', '@id' => url('/career') . '#careers',
         'url' => url('/career'), 'name' => 'Careers at Deveon Inc',
         'about' => ['@id' => url('/') . '#organization']],
        ['@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')], ['@type' => 'ListItem', 'position' => 2, 'name' => 'Careers', 'item' => url('/career')]]],
    ],
]; @endphp
{!! json_encode($ld, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection