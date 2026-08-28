@php
    $heroCrumbCurrent = $heroCrumbCurrent ?? '';
    $heroCrumbLen = strlen($heroCrumbCurrent);
@endphp
<section class="page-hero-dark" @if(!empty($heroAccent)) style="--hero-accent:{{ $heroAccent }};" @endif>
    <i class="{{ $heroWatermarkIcon ?? 'ri-terminal-box-line' }} page-hero-dark__watermark"></i>
    <div class="container">
        <div class="page-hero-dark__content text-center">
            <span class="page-hero-dark__eyebrow @if(!empty($heroIconBadge)) page-hero-dark__eyebrow--icon @endif">
                @if(!empty($heroIconBadge))
                <span class="page-hero-dark__eyebrow-icon"><i class="{{ $heroIconBadge }}"></i></span>
                @else
                <span class="dot"></span>
                @endif
                {{ $heroEyebrow }}
            </span>
            <h1 class="page-hero-dark__title">{!! $heroTitle !!}</h1>
            <div class="page-hero-dark__crumb">
                <span class="page-hero-dark__crumb-dots">
                    <span></span><span></span><span></span>
                </span>
                <span class="page-hero-dark__crumb-path">
                    <a href="{{ route('home') }}">~</a><span>/</span>
                    @if(!empty($heroCrumbMiddle))
                    <a href="{{ $heroCrumbMiddle['route'] }}">{{ $heroCrumbMiddle['label'] }}</a><span>/</span>
                    @endif
                    <span class="current">{{ $heroCrumbCurrent }}</span><span class="page-hero-dark__crumb-cursor"></span>
                </span>
            </div>
        </div>
    </div>
    <svg class="page-hero-dark__wave" viewBox="0 0 1440 100" preserveAspectRatio="none" aria-hidden="true">
        <path class="page-hero-dark__wave-fill" d="M0,100 C150,0 1290,0 1440,100 L1440,100 L0,100 Z"></path>
        <path class="page-hero-dark__wave-edge" d="M0,100 C150,0 1290,0 1440,100"></path>
    </svg>
</section>
<style>
    /* ---------- Shared dark page hero ----------
       Always dark regardless of site theme, with a soft grid + radial glow, a
       large faint watermark icon, an eyebrow tag, a typewriter terminal-style
       breadcrumb, and a curved wave transitioning into the page below.
       This partial is included from every page that needs it, so every page
       shares one source instead of duplicating ~200 lines of CSS. */
    .page-hero-dark {
        position: relative;
        overflow: hidden;
        padding: 132px 0 130px;
        background: linear-gradient(180deg, #121218 0%, #0a0a0d 100%);
    }

    .page-hero-dark::before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: 0;
        opacity: 0.5;
        background-image:
            linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 42px 42px;
        -webkit-mask-image: radial-gradient(60% 70% at 50% 30%, #000 0%, transparent 75%);
        mask-image: radial-gradient(60% 70% at 50% 30%, #000 0%, transparent 75%);
    }

    .page-hero-dark::after {
        content: "";
        position: absolute;
        inset: 0;
        z-index: 0;
        background: radial-gradient(45% 60% at 50% 20%, color-mix(in srgb, var(--hero-accent, var(--primary-color)) 20%, transparent), transparent 70%);
        pointer-events: none;
    }

    .page-hero-dark__watermark {
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

    .page-hero-dark__content {
        position: relative;
        z-index: 1;
    }

    .page-hero-dark__eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 24px;
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

    /* Variant used when a per-page icon (e.g. a service's own icon) is
       passed in — the icon sits inline with the eyebrow text instead of as
       a separate badge floating above it, so the two elements read as one
       unit rather than colliding. */
    .page-hero-dark__eyebrow--icon {
        gap: 12px;
        padding: 6px 22px 6px 6px;
    }

    .page-hero-dark__eyebrow-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 30px;
        height: 30px;
        border-radius: 10px;
        background: var(--hero-accent, var(--primary-color));
        color: #0a0a0d;
        font-size: 0.95rem;
    }

    .page-hero-dark__eyebrow .dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--hero-accent, var(--primary-color));
        animation: pageHeroPulse 1.8s ease-out infinite;
    }

    @keyframes pageHeroPulse {
        0% {
            box-shadow: 0 0 0 0 color-mix(in srgb, var(--hero-accent, var(--primary-color)) 55%, transparent);
        }

        70% {
            box-shadow: 0 0 0 6px transparent;
        }

        100% {
            box-shadow: 0 0 0 0 transparent;
        }
    }

    .page-hero-dark__title {
        margin: 0 0 28px;
        font-size: clamp(1.9rem, 4.5vw, 3.4rem);
        font-weight: 800;
        line-height: 1.15;
        color: #fff;
    }

    .page-hero-dark__title span {
        color: var(--hero-accent, var(--primary-color));
    }

    .page-hero-dark__crumb {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 11px 22px 11px 18px;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        background: rgba(255, 255, 255, 0.05);
        box-shadow: 0 24px 48px -20px rgba(0, 0, 0, 0.6);
        max-width: 100%;
    }

    .page-hero-dark__crumb-dots {
        display: flex;
        gap: 6px;
        flex-shrink: 0;
    }

    .page-hero-dark__crumb-dots span {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.18);
    }

    .page-hero-dark__crumb-dots span:first-child {
        background: var(--hero-accent, var(--primary-color));
    }

    .page-hero-dark__crumb-path {
        display: inline-flex;
        align-items: center;
        gap: 2px;
        min-width: 0;
        font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, "Liberation Mono", monospace;
        font-size: 0.9rem;
        letter-spacing: 0.01em;
        color: rgba(255, 255, 255, 0.45);
    }

    .page-hero-dark__crumb-path a {
        color: rgba(255, 255, 255, 0.85);
        transition: color 0.25s ease;
        flex-shrink: 0;
    }

    .page-hero-dark__crumb-path a:hover {
        color: var(--hero-accent, var(--primary-color));
    }

    .page-hero-dark__crumb-path .current {
        display: inline-block;
        overflow: hidden;
        white-space: nowrap;
        vertical-align: bottom;
        color: var(--hero-accent, var(--primary-color));
        font-weight: 600;
        animation: pageHeroCrumbType 6s steps(1, end) infinite;
    }

    /* Pure-CSS typewriter loop: type the current path segment out character
       by character, hold it fully typed for ~3s, erase it, pause briefly,
       then repeat. Per-keyframe timing-functions do the discrete stepping;
       the exact character count comes from PHP (strlen), interpolated below
       since this partial is rendered fresh per page rather than a static
       shared stylesheet. */
    @keyframes pageHeroCrumbType {
        0% {
            width: 0;
            animation-timing-function: steps({{ max($heroCrumbLen, 1) }}, end);
        }

        20% {
            width: {{ $heroCrumbLen }}ch;
            animation-timing-function: steps(1, end);
        }

        70% {
            width: {{ $heroCrumbLen }}ch;
            animation-timing-function: steps({{ max($heroCrumbLen, 1) }}, end);
        }

        87% {
            width: 0;
            animation-timing-function: steps(1, end);
        }

        100% {
            width: 0;
        }
    }

    .page-hero-dark__crumb-cursor {
        display: inline-block;
        width: 7px;
        height: 16px;
        margin-inline-start: 3px;
        background: var(--hero-accent, var(--primary-color));
        flex-shrink: 0;
        animation: pageHeroCrumbBlink 1.1s step-end infinite;
    }

    @keyframes pageHeroCrumbBlink {
        50% {
            opacity: 0;
        }
    }

    .page-hero-dark__wave {
        position: absolute;
        z-index: 1;
        inset-inline: 0;
        bottom: -6px;
        width: 100%;
        height: 96px;
        display: block;
    }

    .page-hero-dark__wave .page-hero-dark__wave-fill {
        fill: var(--default-body-bg-color);
        stroke: none;
    }

    .page-hero-dark__wave .page-hero-dark__wave-edge {
        fill: none;
        stroke: var(--hero-accent, var(--primary-color));
        stroke-width: 2;
        stroke-linecap: round;
        opacity: 0.35;
    }

    @media (max-width: 767px) {
        .page-hero-dark {
            padding: 96px 0 100px;
        }

        .page-hero-dark__watermark {
            font-size: 14rem;
        }

        .page-hero-dark__crumb-path {
            font-size: 0.8rem;
        }
    }
</style>
