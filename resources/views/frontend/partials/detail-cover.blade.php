@php
    /*
     | Shared framed cover image for detail pages (portfolio + blog).
     |
     |   $coverImage   full URL of the image                     (required)
     |   $coverAlt     alt text                                  (required)
     |   $coverPath    monospace path shown in the chrome bar    e.g. '~/blog/my-post'
     |   $coverBadge   small pill at the right of the chrome bar e.g. '2026'
     |   $coverAccent  hex accent for the glow + pill            (defaults to brand)
     |
     | Must be placed directly after the page-hero partial and OUTSIDE the
     | content row - it uses a negative top margin to straddle the hero wave.
    */
    $coverPath   = $coverPath   ?? null;
    $coverBadge  = $coverBadge  ?? null;
    $coverAccent = $coverAccent ?? 'rgb(var(--primary-rgb))';
@endphp

<figure class="detail-cover wow fadeInUp" data-wow-delay=".1s" style="--accent:{{ $coverAccent }};">
    <div class="detail-cover__frame">
        <div class="detail-cover__bar">
            <span class="detail-cover__dots"><span></span><span></span><span></span></span>
            @if($coverPath)
            <span class="detail-cover__path">{!! $coverPath !!}</span>
            @endif
            @if($coverBadge)
            <span class="detail-cover__badge">{{ $coverBadge }}</span>
            @endif
        </div>
        <img src="{{ $coverImage }}" alt="{{ $coverAlt }}"
             onerror="this.onerror=null;this.src='{{ asset('FrontendAssets/images/blog/blog1.png') }}';">
    </div>
</figure>

<style>
    /* ---------- Framed detail cover ----------
       Sits in a dark "app window" frame and is lifted up so it straddles the
       curve of the dark page hero, the way a case-study cover should. */
    .detail-cover {
        position: relative;
        z-index: 2;
        max-width: 880px;
        margin: -170px auto 3.5rem;
    }

    .detail-cover::before {
        content: "";
        position: absolute;
        z-index: -1;
        inset: 12% -6% -14%;
        border-radius: 50%;
        background: radial-gradient(50% 50% at 50% 50%, color-mix(in srgb, var(--accent) 34%, transparent), transparent 70%);
        filter: blur(46px);
        opacity: 0.7;
        pointer-events: none;
    }

    .detail-cover__frame {
        overflow: hidden;
        border-radius: 14px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        background: #101015;
        box-shadow:
            0 2px 0 rgba(255, 255, 255, 0.05) inset,
            0 40px 80px -34px rgba(0, 0, 0, 0.65),
            0 10px 30px -20px rgba(0, 0, 0, 0.5);
    }

    .detail-cover__bar {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 11px 16px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        background: linear-gradient(180deg, #1b1b22 0%, #141419 100%);
    }

    .detail-cover__dots {
        display: inline-flex;
        gap: 6px;
        flex: 0 0 auto;
    }

    .detail-cover__dots span {
        width: 9px;
        height: 9px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.18);
    }

    .detail-cover__dots span:first-child {
        background: var(--accent);
    }

    .detail-cover__path {
        flex: 1 1 auto;
        min-width: 0;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        font-family: ui-monospace, SFMono-Regular, "SF Mono", Menlo, Consolas, monospace;
        font-size: 0.74rem;
        letter-spacing: 0.04em;
        color: rgba(255, 255, 255, 0.42);
    }

    .detail-cover__path b {
        font-weight: 600;
        color: rgba(255, 255, 255, 0.78);
    }

    .detail-cover__badge {
        flex: 0 0 auto;
        font-family: ui-monospace, SFMono-Regular, "SF Mono", Menlo, Consolas, monospace;
        font-size: 0.7rem;
        letter-spacing: 0.08em;
        white-space: nowrap;
        padding: 3px 10px;
        border-radius: 999px;
        border: 1px solid color-mix(in srgb, var(--accent) 40%, transparent);
        color: color-mix(in srgb, var(--accent) 80%, #fff);
    }

    /* 16:10 - the house ratio for every cover and card image on the site */
    .detail-cover__frame img {
        display: block;
        width: 100%;
        height: auto;
        aspect-ratio: 16 / 10;
        object-fit: cover;
        object-position: center;
        border-radius: 0;
    }

    @media (max-width: 991px) {
        .detail-cover {
            margin-top: -130px;
            margin-bottom: 2.5rem;
        }
    }

    @media (max-width: 767px) {
        .detail-cover {
            margin-top: -90px;
            margin-bottom: 2rem;
        }

        .detail-cover__frame {
            border-radius: 12px;
        }

        .detail-cover__bar {
            padding: 9px 12px;
            gap: 10px;
        }

        .detail-cover__path {
            display: none;
        }
    }
</style>
