@extends('layouts.frontend.master')

@section('title', $document['title'] . ' | Deveon Inc')
@section('meta_description', $document['lead'])

@section('css')
<style>
    /* =====================================================================
       LEGAL DOCUMENTS — shared layout for Privacy, Terms and Legal Notice.
       Sticky contents rail on the left, readable measure on the right.
       ===================================================================== */
    .legal-page {
        --accent: {{ $document['accent'] }};
    }

    /* ---------- meta bar under the hero ---------- */
    .legal-meta {
        position: relative;
        z-index: 2;
        max-width: 1080px;
        margin: -84px auto 3rem;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 14px 26px;
        padding: 22px 28px;
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        background: #101015;
        box-shadow: 0 30px 60px -34px rgba(0, 0, 0, 0.7);
    }

    .legal-meta__item {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        font-size: 0.86rem;
        color: rgba(255, 255, 255, 0.55);
    }

    .legal-meta__item i {
        font-size: 1rem;
        color: var(--accent);
    }

    .legal-meta__item b {
        font-weight: 600;
        color: rgba(255, 255, 255, 0.92);
    }

    .legal-meta__sep {
        width: 1px;
        height: 26px;
        background: rgba(255, 255, 255, 0.12);
    }

    .legal-meta__print {
        margin-inline-start: auto;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 18px;
        border-radius: 999px;
        border: 1px solid rgba(255, 255, 255, 0.16);
        background: rgba(255, 255, 255, 0.05);
        color: #fff;
        font-size: 0.8rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s ease, border-color 0.3s ease;
    }

    .legal-meta__print:hover {
        background: color-mix(in srgb, var(--accent) 18%, transparent);
        border-color: color-mix(in srgb, var(--accent) 50%, transparent);
    }

    /* ---------- contents rail ---------- */
    .legal-toc {
        position: sticky;
        top: 110px;
        padding: 26px 22px;
        border-radius: 18px;
        border: 1px solid var(--border);
        background: var(--gray-100);
    }

    .legal-toc__title {
        margin: 0 0 16px;
        font-size: 0.74rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: rgb(var(--dark-rgb));
        opacity: 0.45;
    }

    .legal-toc__list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: grid;
        gap: 2px;
        counter-reset: toc;
    }

    .legal-toc__list a {
        counter-increment: toc;
        display: flex;
        gap: 11px;
        padding: 9px 12px;
        border-radius: 10px;
        font-size: 0.9rem;
        line-height: 1.4;
        text-decoration: none;
        color: rgb(var(--dark-rgb));
        opacity: 0.68;
        transition: background 0.25s ease, opacity 0.25s ease, color 0.25s ease;
    }

    .legal-toc__list a::before {
        content: counter(toc, decimal-leading-zero);
        flex: 0 0 auto;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.04em;
        opacity: 0.5;
        padding-top: 2px;
    }

    .legal-toc__list a:hover {
        opacity: 1;
        background: color-mix(in srgb, var(--accent) 12%, transparent);
    }

    .legal-toc__list a.is-active {
        opacity: 1;
        font-weight: 600;
        background: color-mix(in srgb, var(--accent) 16%, transparent);
        box-shadow: inset 2px 0 0 var(--accent);
    }

    .legal-toc__list a.is-active::before {
        opacity: 1;
        color: color-mix(in srgb, var(--accent) 82%, rgb(var(--dark-rgb)));
    }

    /* ---------- document body ---------- */
    .legal-doc__intro {
        padding: 26px 30px;
        margin-bottom: 34px;
        border-radius: 16px;
        border: 1px solid var(--border);
        border-inline-start: 3px solid var(--accent);
        background: var(--gray-100);
        font-size: 1.05rem;
        line-height: 1.75;
        color: rgb(var(--dark-rgb));
        opacity: 0.88;
    }

    .legal-section {
        scroll-margin-top: 120px;
        padding-block-end: 36px;
        margin-block-end: 36px;
        border-block-end: 1px solid var(--border);
    }

    .legal-section:last-child {
        border-block-end: 0;
        margin-block-end: 0;
        padding-block-end: 0;
    }

    .legal-section__head {
        display: flex;
        align-items: baseline;
        gap: 14px;
        margin-bottom: 16px;
    }

    .legal-section__num {
        flex: 0 0 auto;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        color: var(--accent);
        padding-top: 4px;
    }

    [data-theme-mode="light"] .legal-section__num {
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.4);
    }

    .legal-section__title {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        letter-spacing: -0.015em;
        line-height: 1.25;
        color: rgb(var(--dark-rgb));
    }

    .legal-section__body {
        padding-inline-start: 34px;
    }

    .legal-section__body p {
        font-size: 1rem;
        line-height: 1.8;
        margin-bottom: 1rem;
        color: rgb(var(--dark-rgb));
        opacity: 0.75;
    }

    .legal-section__body p:last-child { margin-bottom: 0; }

    .legal-section__body b { opacity: 1; font-weight: 600; }

    .legal-section__body a {
        color: rgb(var(--dark-rgb));
        text-decoration: underline;
        text-underline-offset: 3px;
        text-decoration-color: color-mix(in srgb, var(--accent) 70%, transparent);
        transition: color 0.25s ease;
    }

    .legal-section__body a:hover { color: var(--accent); }

    .legal-section__body ul {
        margin: 0 0 1rem;
        padding: 0;
        list-style: none;
        display: grid;
        gap: 11px;
    }

    .legal-section__body ul li {
        position: relative;
        padding-inline-start: 24px;
        font-size: 1rem;
        line-height: 1.75;
        color: rgb(var(--dark-rgb));
        opacity: 0.75;
    }

    .legal-section__body ul li::before {
        content: "";
        position: absolute;
        inset-inline-start: 4px;
        top: 0.7em;
        width: 6px;
        height: 6px;
        border-radius: 2px;
        background: var(--accent);
    }

    /* company fact table inside the Legal Notice */
    .legal-facts {
        display: grid;
        gap: 0;
        margin-bottom: 1.25rem;
        border: 1px solid var(--border);
        border-radius: 14px;
        overflow: hidden;
    }

    .legal-facts__row {
        display: grid;
        grid-template-columns: 200px 1fr;
        gap: 16px;
        padding: 14px 18px;
        font-size: 0.95rem;
        line-height: 1.6;
        border-block-end: 1px solid var(--border);
    }

    .legal-facts__row:last-child { border-block-end: 0; }
    .legal-facts__row:nth-child(odd) { background: var(--gray-100); }

    .legal-facts__row span {
        color: rgb(var(--dark-rgb));
        opacity: 0.55;
    }

    .legal-facts__row b {
        font-weight: 600;
        color: rgb(var(--dark-rgb));
    }

    /* ---------- footer of the document ---------- */
    .legal-contact {
        margin-top: 44px;
        padding: 30px 32px;
        border-radius: 18px;
        border: 1px solid var(--border);
        background: var(--gray-100);
    }

    .legal-contact h3 {
        margin: 0 0 8px;
        font-size: 1.25rem;
        font-weight: 700;
        color: rgb(var(--dark-rgb));
    }

    .legal-contact p {
        margin: 0 0 18px;
        font-size: 0.98rem;
        line-height: 1.7;
        color: rgb(var(--dark-rgb));
        opacity: 0.7;
    }

    .legal-contact__links {
        display: flex;
        flex-wrap: wrap;
        gap: 10px 26px;
    }

    .legal-contact__links a {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        font-size: 0.95rem;
        font-weight: 600;
        text-decoration: none;
        color: rgb(var(--dark-rgb));
        transition: color 0.25s ease;
    }

    .legal-contact__links a i { color: var(--accent); font-size: 1.05rem; }
    .legal-contact__links a:hover { color: var(--accent); }

    .legal-related {
        margin-top: 40px;
    }

    .legal-related__label {
        font-size: 0.74rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        opacity: 0.45;
        margin-bottom: 16px;
        color: rgb(var(--dark-rgb));
    }

    .legal-related__grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }

    .legal-related__card {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px 22px;
        border-radius: 16px;
        border: 1px solid var(--border);
        background: var(--custom-white);
        text-decoration: none;
        transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1), border-color 0.35s ease, box-shadow 0.35s ease;
    }

    .legal-related__card:hover {
        transform: translateY(-4px);
        border-color: color-mix(in srgb, var(--accent) 45%, var(--border));
        box-shadow: 0 24px 48px -30px rgba(var(--dark-rgb), 0.4);
    }

    .legal-related__icon {
        flex: 0 0 auto;
        display: grid;
        place-items: center;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        font-size: 1.2rem;
        background: color-mix(in srgb, var(--accent) 14%, transparent);
        color: var(--accent);
    }

    .legal-related__card strong {
        display: block;
        font-size: 1rem;
        font-weight: 600;
        color: rgb(var(--dark-rgb));
        margin-bottom: 2px;
    }

    .legal-related__card span {
        font-size: 0.84rem;
        color: rgb(var(--dark-rgb));
        opacity: 0.6;
    }

    .legal-related__card i.ri-arrow-right-up-line {
        margin-inline-start: auto;
        color: rgb(var(--dark-rgb));
        opacity: 0.35;
    }

    /* ---------- responsive ---------- */
    @media (max-width: 1199px) {
        .legal-toc { position: static; }
    }

    @media (max-width: 767px) {
        .legal-meta {
            margin-top: -60px;
            padding: 18px 20px;
            gap: 12px 18px;
        }

        .legal-meta__sep { display: none; }
        .legal-meta__print { margin-inline-start: 0; }
        .legal-section__body { padding-inline-start: 0; }
        .legal-section__title { font-size: 1.28rem; }
        .legal-facts__row { grid-template-columns: 1fr; gap: 4px; }
        .legal-related__grid { grid-template-columns: 1fr; }
    }

    /* ---------- print ---------- */
    @media print {
        .legal-meta__print,
        .legal-toc,
        .legal-related,
        .page-hero-dark__wave { display: none !important; }

        .legal-section { break-inside: avoid; border-color: #ddd; }
        .legal-section__body { padding-inline-start: 0; }
    }
</style>
@endsection

@section('content')
<div class="section-spacer"></div>

@include('frontend.partials.page-hero', [
    'heroEyebrow'      => $document['eyebrow'],
    'heroTitle'        => $document['title'],
    'heroWatermarkIcon'=> $document['icon'],
    'heroAccent'       => $document['accent'],
    'heroCrumbCurrent' => $document['slug'],
])

<section class="section legal-page section-gap">
    <div class="container">

        <!-- meta bar, lifted over the hero curve -->
        <div class="legal-meta wow fadeInUp" data-wow-delay=".1s">
            <span class="legal-meta__item">
                <i class="ri-history-line"></i> Last updated <b>{{ $document['updated'] }}</b>
            </span>
            <span class="legal-meta__sep"></span>
            <span class="legal-meta__item">
                <i class="ri-list-check-2"></i> <b>{{ count($document['sections']) }}</b> sections
            </span>
            <span class="legal-meta__sep"></span>
            <span class="legal-meta__item">
                <i class="ri-building-line"></i> <b>Deveon Inc</b>
            </span>
            <button type="button" class="legal-meta__print" onclick="window.print()">
                <i class="ri-printer-line"></i> Print
            </button>
        </div>

        <div class="row g-5">

            <!-- ============ contents ============ -->
            <div class="col-xl-4 col-lg-5">
                <nav class="legal-toc wow fadeInUp" data-wow-delay=".15s" aria-label="Document contents">
                    <h2 class="legal-toc__title">On this page</h2>
                    <ul class="legal-toc__list">
                        @foreach($document['sections'] as $section)
                        <li>
                            <a href="#{{ $section['id'] }}" data-toc-link="{{ $section['id'] }}">
                                {!! $section['heading'] !!}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>

            <!-- ============ document ============ -->
            <div class="col-xl-8 col-lg-7">
                <div class="legal-doc">
                    <p class="legal-doc__intro wow fadeInUp" data-wow-delay=".15s">{{ $document['lead'] }}</p>

                    @foreach($document['sections'] as $section)
                    <section class="legal-section wow fadeInUp" data-wow-delay=".1s" id="{{ $section['id'] }}">
                        <div class="legal-section__head">
                            <span class="legal-section__num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <h2 class="legal-section__title">{!! $section['heading'] !!}</h2>
                        </div>
                        <div class="legal-section__body">
                            {!! $section['body'] !!}
                        </div>
                    </section>
                    @endforeach

                    <!-- contact -->
                    <div class="legal-contact wow fadeInUp" data-wow-delay=".1s">
                        <h3>Questions about this document?</h3>
                        <p>If anything here is unclear, or you want to exercise a right described above, contact us and a member of the team will respond.</p>
                        <div class="legal-contact__links">
                            <a href="mailto:info@deveoninc.com"><i class="ri-mail-line"></i> info@deveoninc.com</a>
                            <a href="tel:+19055148474"><i class="ri-phone-line"></i> +1 905 514 8474</a>
                            <a href="{{ route('contact') }}"><i class="ri-send-plane-line"></i> Contact form</a>
                        </div>
                    </div>

                    <!-- the other two documents -->
                    <div class="legal-related wow fadeInUp" data-wow-delay=".1s">
                        <div class="legal-related__label">Related documents</div>
                        <div class="legal-related__grid">
                            @foreach($others as $other)
                            <a class="legal-related__card" href="{{ route($other['route']) }}">
                                <span class="legal-related__icon"><i class="{{ $other['icon'] }}"></i></span>
                                <span>
                                    <strong>{!! $other['title'] !!}</strong>
                                    <span>{{ $other['eyebrow'] }}</span>
                                </span>
                                <i class="ri-arrow-right-up-line"></i>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
// Highlight the contents entry for whichever section is currently in view.
document.addEventListener('DOMContentLoaded', function () {
    var links = document.querySelectorAll('[data-toc-link]');
    if (!links.length || !('IntersectionObserver' in window)) return;

    var map = {};
    links.forEach(function (l) { map[l.getAttribute('data-toc-link')] = l; });

    var setActive = function (id) {
        links.forEach(function (l) { l.classList.remove('is-active'); });
        if (map[id]) map[id].classList.add('is-active');
    };

    var observer = new IntersectionObserver(function (entries) {
        var visible = entries
            .filter(function (e) { return e.isIntersecting; })
            .sort(function (a, b) { return a.boundingClientRect.top - b.boundingClientRect.top; });
        if (visible.length) setActive(visible[0].target.id);
    }, { rootMargin: '-120px 0px -65% 0px', threshold: 0 });

    document.querySelectorAll('.legal-section').forEach(function (s) { observer.observe(s); });
});
</script>
@endsection
