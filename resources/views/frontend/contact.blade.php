@extends('layouts.frontend.master')
@section('meta_keywords', 'contact software development company, hire software developers USA, software company Ottawa Canada, app development enquiry UK Australia, Deveon Inc contact')
@section('meta_description', 'Talk to Deveon Inc about custom software, mobile apps or AI automation. Offices in Ottawa, Canada and Karachi, Pakistan. Serving the USA, Canada, UK and Australia.')
@section('title', 'Contact Deveon Inc | Software Development USA, Canada, UK')




@section('css')
<style>
    /* --primary-color is a bright lime green with low contrast on white/light
       backgrounds. Give it a soft dark edge in light mode so headings stay
       vivid without changing the color itself (same treatment as about.blade.php). */
    [data-theme-mode="light"] .heading-title .text-primary {
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
    }

    /* ---------- Contact method cards (Call / Email / Visit) ---------- */
    .contact-method-card {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        height: 100%;
        padding: 32px 28px;
        border-radius: 1rem;
        border: 1px solid var(--border);
        background: var(--gray-100);
        transition: border-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    }

    .contact-method-card:hover {
        border-color: var(--primary-color);
        transform: translateY(-4px);
        box-shadow: 0 20px 40px -28px rgba(var(--dark-rgb), 0.35);
    }

    .contact-method-card .contact-method-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 56px;
        height: 56px;
        border-radius: 14px;
        background: var(--primary-color);
        color: #0b0b0b;
        font-size: 1.5rem;
        margin-bottom: 20px;
    }

    .contact-method-card h3 {
        font-size: 1.15rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: rgb(var(--dark-rgb));
    }

    .contact-method-card p {
        font-size: 0.92rem;
        opacity: 0.7;
        margin-bottom: 18px;
    }

    .contact-method-card .contact-method-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 700;
        color: rgb(var(--dark-rgb));
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.45);
        margin-top: auto;
        transition: gap 0.25s ease, color 0.25s ease;
    }

    [data-theme-mode="dark"] .contact-method-card .contact-method-link {
        text-shadow: none;
    }

    .contact-method-card .contact-method-link i {
        color: var(--primary-color);
        transition: transform 0.25s ease;
    }

    .contact-method-card .contact-method-link:hover {
        color: var(--primary-color);
        gap: 10px;
    }

    .contact-method-card .contact-method-link:hover i {
        transform: translateX(3px);
    }

    /* ---------- "Why Partner" value cards ---------- */
    .value-card {
        position: relative;
        height: 100%;
        padding: 32px 28px;
        border-radius: 1.25rem;
        border: 1px solid var(--border);
        background: var(--gray-100);
        overflow: hidden;
        transition: border-color 0.35s ease, transform 0.35s ease, box-shadow 0.35s ease;
    }

    .value-card::after {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: inherit;
        padding: 1px;
        background: linear-gradient(135deg, var(--accent, var(--primary-color)), transparent 45%);
        -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        opacity: 0;
        transition: opacity 0.35s ease;
        pointer-events: none;
    }

    .value-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 24px 48px -30px rgba(var(--dark-rgb), 0.4);
    }

    .value-card:hover::after {
        opacity: 1;
    }

    .value-card .value-number {
        position: absolute;
        top: 18px;
        right: 22px;
        font-size: 2.5rem;
        font-weight: 800;
        line-height: 1;
        color: rgb(var(--dark-rgb));
        opacity: 0.06;
    }

    .value-card .value-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        font-size: 1.5rem;
        background: color-mix(in srgb, var(--accent) 14%, transparent);
        color: var(--accent);
        margin-bottom: 20px;
        transition: transform 0.35s ease;
    }

    .value-card:hover .value-icon {
        transform: scale(1.08) rotate(-4deg);
    }

    .value-card h3 {
        font-size: 1.15rem;
        font-weight: 700;
        margin-bottom: 2px;
        color: rgb(var(--dark-rgb));
    }

    .value-card .value-tag {
        display: block;
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--accent);
        margin-bottom: 12px;
    }

    .value-card p {
        font-size: 0.92rem;
        opacity: 0.7;
        margin: 0;
    }

    /* ---------- Message form ---------- */
    .message-card {
        position: relative;
        padding: 52px;
        border-radius: 1.75rem;
        border: 1px solid var(--border);
        background: var(--gray-100);
        box-shadow: 0 40px 80px -45px rgba(var(--dark-rgb), 0.4);
        overflow: hidden;
    }

    .message-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, var(--primary-color) 0%, rgb(var(--secondary-rgb)) 100%);
    }

    @media (max-width: 575px) {
        .message-card {
            padding: 30px 22px;
        }
    }

    .message-card-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 999px;
        background: color-mix(in srgb, var(--primary-color) 14%, transparent);
        color: rgb(var(--dark-rgb));
        font-size: 0.8rem;
        font-weight: 700;
        margin-bottom: 16px;
    }

    .message-card-badge i {
        color: var(--primary-color);
    }

    .message-card .field-label {
        display: block;
        font-size: 0.9rem;
        font-weight: 600;
        color: rgb(var(--dark-rgb));
        margin-bottom: 8px;
    }

    .input-icon-group {
        position: relative;
    }

    .input-icon-group i {
        position: absolute;
        top: 50%;
        inset-inline-start: 16px;
        transform: translateY(-50%);
        font-size: 1.05rem;
        color: rgb(var(--dark-rgb));
        opacity: 0.35;
        pointer-events: none;
        transition: color 0.25s ease, opacity 0.25s ease;
    }

    .input-icon-group .form-control {
        padding-inline-start: 44px;
    }

    .input-icon-group:focus-within i {
        color: var(--primary-color);
        opacity: 1;
    }

    .message-card .form-control {
        padding-top: 12px;
        padding-bottom: 12px;
        border-radius: 0.75rem;
    }

    .message-card .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px color-mix(in srgb, var(--primary-color) 18%, transparent);
    }

    .message-card textarea.form-control {
        resize: vertical;
    }

    .contact-agree {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.9rem;
        opacity: 0.85;
    }

    .contact-agree input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: var(--primary-color);
        flex-shrink: 0;
    }

    .contact-agree a {
        color: var(--primary-color);
        font-weight: 600;
        text-decoration: none;
    }

    .contact-agree a:hover {
        text-decoration: underline;
    }

    .message-card-footer {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-top: 26px;
        padding-top: 26px;
        border-top: 1px solid var(--border);
    }

    .contact-submit-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 30px;
        border-radius: 999px;
        border: none;
        background: var(--primary-color);
        color: #0b0b0b;
        font-weight: 700;
        font-size: 1rem;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .contact-submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 28px -14px rgba(var(--primary-rgb), 0.6);
    }

    .message-card-social {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .message-card-social .footer-social-list {
        display: flex;
        gap: 10px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .message-card-social .footer-social-list a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 1px solid var(--border);
        color: rgb(var(--dark-rgb));
        transition: all 0.3s ease;
    }

    .message-card-social .footer-social-list a:hover {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: #0b0b0b;
    }

    /* ---------- Offices ---------- */
    .office-card {
        position: relative;
        display: flex;
        align-items: flex-start;
        gap: 20px;
        height: 100%;
        padding: 30px 30px 30px 34px;
        border-radius: 1.25rem;
        border: 1px solid var(--border);
        background: var(--gray-100);
        overflow: hidden;
        transition: border-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    }

    .office-card::before {
        content: "";
        position: absolute;
        inset-inline-start: 0;
        top: 0;
        bottom: 0;
        width: 6px;
        background: var(--accent, var(--primary-color));
    }

    .office-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 24px 48px -30px rgba(var(--dark-rgb), 0.4);
        border-color: var(--accent, var(--primary-color));
    }

    .office-card .office-flag {
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--custom-white);
        box-shadow: 0 0 0 4px color-mix(in srgb, var(--accent) 18%, transparent), 0 10px 22px -12px rgba(var(--dark-rgb), 0.4);
        overflow: hidden;
    }

    .office-card .office-flag img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .office-card .office-region {
        display: block;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: 4px;
    }

    .office-card h3 {
        font-size: 1.15rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: rgb(var(--dark-rgb));
    }

    .office-card p {
        font-size: 0.92rem;
        opacity: 0.75;
        margin-bottom: 14px;
    }

    .office-card .office-hours {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.8rem;
        font-weight: 600;
        margin: 0 0 16px;
        padding: 6px 12px;
        border-radius: 999px;
        background: color-mix(in srgb, var(--accent) 12%, transparent);
        color: rgb(var(--dark-rgb));
    }

    .office-card .office-hours i {
        color: var(--accent);
    }

    .office-card .office-directions {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.88rem;
        font-weight: 700;
        color: rgb(var(--dark-rgb));
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.4);
        transition: gap 0.25s ease;
    }

    [data-theme-mode="dark"] .office-card .office-directions {
        text-shadow: none;
    }

    .office-card .office-directions i {
        color: var(--accent);
        transition: transform 0.25s ease;
    }

    .office-card .office-directions:hover {
        gap: 10px;
        color: var(--accent);
    }

    .office-card .office-directions:hover i {
        transform: translate(2px, -2px);
    }
    .contact-submit-btn:disabled { opacity: .72; cursor: wait; transform: none; }
    .contact-submit-btn .contact-spinner { animation: contact-spin .75s linear infinite; }
    @keyframes contact-spin { to { transform: rotate(360deg); } }
    .contact-swal-popup { border: 1px solid rgba(184, 233, 0, .32); border-radius: 18px; }
    .contact-swal-confirm { border-radius: 8px !important; padding: .75rem 1.5rem !important; color: #080b09 !important; font-weight: 700 !important; }

    /* ---------- Contact hero: dark, glowing, wave-divided ----------
       Always dark regardless of site theme, with a soft grid + radial glow,
       a large faint watermark icon, an eyebrow tag above the title, a pill
       breadcrumb, and a curved wave transitioning into the page below.
       Scoped to this page only. */
    .contact-hero-dark {
        position: relative;
        overflow: hidden;
        padding: 132px 0 130px;
        background: linear-gradient(180deg, #121218 0%, #0a0a0d 100%);
    }

    .contact-hero-dark::before {
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

    .contact-hero-dark::after {
        content: "";
        position: absolute;
        inset: 0;
        z-index: 0;
        background: radial-gradient(45% 60% at 50% 20%, color-mix(in srgb, var(--primary-color) 20%, transparent), transparent 70%);
        pointer-events: none;
    }

    .contact-hero-dark__watermark {
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

    .contact-hero-dark__content {
        position: relative;
        z-index: 1;
    }

    .contact-hero-dark__eyebrow {
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

    .contact-hero-dark__eyebrow .dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--primary-color);
        animation: careersPulse 1.8s ease-out infinite;
    }

    @keyframes careersPulse {
        0% {
            box-shadow: 0 0 0 0 color-mix(in srgb, var(--primary-color) 55%, transparent);
        }

        70% {
            box-shadow: 0 0 0 6px transparent;
        }

        100% {
            box-shadow: 0 0 0 0 transparent;
        }
    }

    .contact-hero-dark__title {
        margin: 0 0 28px;
        font-size: 3.4rem;
        font-weight: 800;
        color: #fff;
    }

    .contact-hero-dark__title span {
        color: var(--primary-color);
    }

    /* Terminal-style breadcrumb chip — same idea as the portfolio page's path
       bar, refined to sit inside this hero's richer dark/glow treatment
       (bigger, panel-toned to match the eyebrow pill, deeper shadow). */
    .contact-hero-dark__crumb {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 11px 22px 11px 18px;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        background: rgba(255, 255, 255, 0.05);
        box-shadow: 0 24px 48px -20px rgba(0, 0, 0, 0.6);
    }

    .contact-hero-dark__crumb-dots {
        display: flex;
        gap: 6px;
    }

    .contact-hero-dark__crumb-dots span {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.18);
    }

    .contact-hero-dark__crumb-dots span:first-child {
        background: var(--primary-color);
    }

    .contact-hero-dark__crumb-path {
        display: inline-flex;
        align-items: center;
        gap: 2px;
        font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, "Liberation Mono", monospace;
        font-size: 0.9rem;
        letter-spacing: 0.01em;
        color: rgba(255, 255, 255, 0.45);
    }

    .contact-hero-dark__crumb-path a {
        color: rgba(255, 255, 255, 0.85);
        transition: color 0.25s ease;
    }

    .contact-hero-dark__crumb-path a:hover {
        color: var(--primary-color);
    }

    .contact-hero-dark__crumb-path .current {
        display: inline-block;
        overflow: hidden;
        white-space: nowrap;
        vertical-align: bottom;
        width: 7ch;
        color: var(--primary-color);
        font-weight: 600;
        animation: contactCrumbType 6s steps(1, end) infinite;
    }

    /* Pure-CSS typewriter loop: type "contact" out character by character,
       hold it fully typed for ~3s, erase it, pause briefly, then repeat.
       Per-keyframe timing-functions do the discrete stepping. */
    @keyframes contactCrumbType {
        0% {
            width: 0;
            animation-timing-function: steps(7, end);
        }

        20% {
            width: 7ch;
            animation-timing-function: steps(1, end);
        }

        70% {
            width: 7ch;
            animation-timing-function: steps(7, end);
        }

        87% {
            width: 0;
            animation-timing-function: steps(1, end);
        }

        100% {
            width: 0;
        }
    }

    .contact-hero-dark__crumb-cursor {
        display: inline-block;
        width: 7px;
        height: 16px;
        margin-inline-start: 3px;
        background: var(--primary-color);
        animation: contactCrumbBlink 1.1s step-end infinite;
    }

    @keyframes contactCrumbBlink {
        50% {
            opacity: 0;
        }
    }

    .contact-hero-dark__wave {
        position: absolute;
        z-index: 1;
        inset-inline: 0;
        bottom: -6px;
        width: 100%;
        height: 96px;
        display: block;
    }

    .contact-hero-dark__wave .contact-hero-dark__wave-fill {
        fill: var(--default-body-bg-color);
        stroke: none;
    }

    /* On dark theme the fill barely differs from the hero's own background,
       so the curve needs its own definition rather than relying on contrast —
       a soft lime edge traces the arc so it still reads as a deliberate
       shape instead of disappearing into a flat dark page. */
    .contact-hero-dark__wave .contact-hero-dark__wave-edge {
        fill: none;
        stroke: var(--primary-color);
        stroke-width: 2;
        stroke-linecap: round;
        opacity: 0.35;
    }

    @media (max-width: 767px) {
        .contact-hero-dark {
            padding: 96px 0 100px;
        }

        .contact-hero-dark__title {
            font-size: 2.2rem;
        }

        .contact-hero-dark__watermark {
            font-size: 14rem;
        }
    }
</style>
@endsection

@section('content')

    <div class="section-spacer"></div>
    <!-- Hero -->
    <section class="contact-hero-dark">
        <i class="ri-send-plane-fill contact-hero-dark__watermark"></i>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-hero-dark__content text-center">
                        <span class="contact-hero-dark__eyebrow">
                            <span class="dot"></span>
                            Let's Start a Conversation
                        </span>
                        <h1 class="contact-hero-dark__title">
                            Contact <span>Us</span>
                        </h1>
                        <div class="contact-hero-dark__crumb">
                            <span class="contact-hero-dark__crumb-dots">
                                <span></span><span></span><span></span>
                            </span>
                            <span class="contact-hero-dark__crumb-path">
                                <a href="{{ route('home') }}">~</a><span>/</span><span class="current">contact</span><span class="contact-hero-dark__crumb-cursor"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg class="contact-hero-dark__wave" viewBox="0 0 1440 100" preserveAspectRatio="none" aria-hidden="true">
            <path class="contact-hero-dark__wave-fill" d="M0,100 C150,0 1290,0 1440,100 L1440,100 L0,100 Z"></path>
            <path class="contact-hero-dark__wave-edge" d="M0,100 C150,0 1290,0 1440,100"></path>
        </svg>
    </section>
    <!-- /Hero -->

    <!-- Intro -->
    <section class="section pb-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="heading-section text-center mb-0">
                        <span class="heading-subtitle mx-auto justify-content-center d-inline-flex wow fadeInUp" data-wow-delay=".1s">
                            Let's Collaborate
                        </span>
                        <h2 class="heading-title mt-4">
                            Get In Touch With <span class="text-primary">Deveon Inc</span>
                        </h2>
                        <p>
                            Have a software development project in mind? Let's discuss how we can help you achieve your goals.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Intro -->

    <!-- Contact methods -->
    <section class="section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4">
                    <div class="contact-method-card wow fadeInUp" data-wow-delay=".1s">
                        <div class="contact-method-icon">
                            <i class="ri-phone-line"></i>
                        </div>
                        <h3>Give us a Call</h3>
                        <p>Speak with our team directly. We're available to assist you with any inquiries.</p>
                        <a class="contact-method-link" href="tel:+19055148474">
                            +1 (905) 514-8474 <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-method-card wow fadeInUp" data-wow-delay=".2s">
                        <div class="contact-method-icon">
                            <i class="ri-mail-line"></i>
                        </div>
                        <h3>Send us an Email</h3>
                        <p>Drop us a line via email and we promise to get back to you within 24 hours.</p>
                        <a class="contact-method-link" href="mailto:info@deveoninc.com">
                            info@deveoninc.com <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-method-card wow fadeInUp" data-wow-delay=".3s">
                        <div class="contact-method-icon">
                            <i class="ri-map-pin-2-line"></i>
                        </div>
                        <h3>Visit an Office</h3>
                        <p>We're remote-first with offices in Pakistan and Canada, serving clients worldwide.</p>
                        <a class="contact-method-link" href="#offices">
                            View Locations <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Contact methods -->

    <!-- Why Partner -->
    <section class="section pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <div class="heading-section text-center">
                        <h2 class="heading-title split-title">
                            Why Partner With <span class="text-primary">Deveon Inc?</span>
                        </h2>
                        <p>
                            Whether you're a startup building your first MVP or an established enterprise
                            modernizing your tech stack, our team is here to help you succeed.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row gy-4">
                <div class="col-md-6 col-xl-4">
                    <div class="value-card wow fadeInUp" data-wow-delay=".1s" style="--accent:#f2a90c;">
                        <span class="value-number">01</span>
                        <div class="value-icon">
                            <i class="ri-flashlight-line"></i>
                        </div>
                        <h3>Rapid Response Time</h3>
                        <span class="value-tag">Quick Turnaround</span>
                        <p>We typically respond to inquiries within 1-2 hours during business hours, keeping your project moving.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="value-card wow fadeInUp" data-wow-delay=".2s" style="--accent:#3b6fe0;">
                        <span class="value-number">02</span>
                        <div class="value-icon">
                            <i class="ri-team-line"></i>
                        </div>
                        <h3>Expert Team</h3>
                        <span class="value-tag">Skilled Professionals</span>
                        <p>Certified professionals with expertise across multiple technologies, from Laravel and React to Flutter.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="value-card wow fadeInUp" data-wow-delay=".3s" style="--accent:#1f9d63;">
                        <span class="value-number">03</span>
                        <div class="value-icon">
                            <i class="ri-eye-line"></i>
                        </div>
                        <h3>Transparent Process</h3>
                        <span class="value-tag">Clear Communication</span>
                        <p>Regular status reports and full visibility into project scope, timelines, and pricing every step of the way.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="value-card wow fadeInUp" data-wow-delay=".1s" style="--accent:#17a2a6;">
                        <span class="value-number">04</span>
                        <div class="value-icon">
                            <i class="ri-settings-3-line"></i>
                        </div>
                        <h3>Comprehensive Services</h3>
                        <span class="value-tag">End-to-End Solutions</span>
                        <p>From consultation and design to development, testing, and ongoing maintenance — one point of contact.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="value-card wow fadeInUp" data-wow-delay=".2s" style="--accent:#d1483f;">
                        <span class="value-number">05</span>
                        <div class="value-icon">
                            <i class="ri-global-line"></i>
                        </div>
                        <h3>Global Reach</h3>
                        <span class="value-tag">International Experience</span>
                        <p>Offices in Pakistan and Canada bring a global perspective with the personal touch of a boutique agency.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="value-card wow fadeInUp" data-wow-delay=".3s" style="--accent:#7b4fd1;">
                        <span class="value-number">06</span>
                        <div class="value-icon">
                            <i class="ri-trophy-line"></i>
                        </div>
                        <h3>Proven Track Record</h3>
                        <span class="value-tag">Successful Projects</span>
                        <p>Hundreds of successful projects delivered across industries, with measurable results and satisfied clients.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Why Partner -->

    <!-- Message form -->
    <section class="section pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="message-card wow fadeInUp" data-wow-delay=".1s">
                        <div class="heading-section text-start mb-4">
                            <span class="message-card-badge"><i class="ri-time-line"></i> We typically respond within 24 hours</span>
                            <h2 class="heading-title mb-2">
                                Send us a <span class="text-primary">Message</span>
                            </h2>
                            <p class="mb-0">Fill out the form below and our team will get back to you shortly.</p>
                        </div>
                        <form id="team-contact-form" method="POST" action="{{ route('contact.submit') }}" novalidate>
                            @csrf
                            <div class="row gy-3">
                                <div class="col-sm-6">
                                    <label class="field-label" for="conName">Full Name *</label>
                                    <div class="input-icon-group">
                                        <i class="ri-user-3-line"></i>
                                        <input type="text" class="form-control" name="fullname" id="conName"
                                            placeholder="John Doe" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="field-label" for="conEmail">Email Address *</label>
                                    <div class="input-icon-group">
                                        <i class="ri-mail-line"></i>
                                        <input type="email" class="form-control" name="email" id="conEmail"
                                            placeholder="john@example.com" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="field-label" for="conPhone">Phone Number *</label>
                                    <div class="input-icon-group">
                                        <i class="ri-phone-line"></i>
                                        <input class="form-control" type="text" name="phone" id="conPhone"
                                            placeholder="+1 (905) 514-8474" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="field-label" for="conSubject">Subject *</label>
                                    <div class="input-icon-group">
                                        <i class="ri-chat-3-line"></i>
                                        <input type="text" class="form-control" name="subject" id="conSubject"
                                            value="{{ request('subject') }}" placeholder="How can we help?" required>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label class="field-label" for="message">Your Message *</label>
                                    <textarea class="form-control" rows="5" name="message" id="message"
                                        placeholder="Tell us about your project..." required></textarea>
                                </div>

                                <div class="col-12">
                                    <label class="contact-agree">
                                        <input type="checkbox" name="privacy" value="1" required>
                                        <span>I agree to the <a href="javascript:void(0);">Terms &amp; Conditions</a> and <a href="javascript:void(0);">Privacy Policy</a></span>
                                    </label>
                                </div>

                                <div class="col-12">
                                    <div class="message-card-footer">
                                        <button type="submit" class="contact-submit-btn" data-contact-submit>
                                            <i class="ri-send-plane-2-line" data-submit-icon></i>
                                            <span data-submit-text>Send Message</span>
                                        </button>
                                        <div class="message-card-social">
                                            <span>Connect with us:</span>
                                            <ul class="footer-social-list">
                                                <li><a href="{{ config('seo.social.facebook') }}" target="_blank" rel="noopener noreferrer" aria-label="Deveon Inc on Facebook"><i class="ri-facebook-fill"></i></a></li>
                                                <li><a href="{{ config('seo.social.instagram') }}" target="_blank" rel="noopener noreferrer" aria-label="Deveon Inc on Instagram"><i class="ri-instagram-line"></i></a></li>
                                                <li><a href="{{ config('seo.social.linkedin') }}" target="_blank" rel="noopener noreferrer" aria-label="Deveon Inc on LinkedIn"><i class="ri-linkedin-box-fill"></i></a></li>
                                                <li><a href="{{ config('seo.social.x') }}" target="_blank" rel="noopener noreferrer" aria-label="Deveon Inc on X"><i class="ri-twitter-x-line"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Message form -->

    <!-- Offices -->
    <section class="section pt-0" id="offices">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <div class="heading-section text-center">
                        <span class="heading-subtitle mx-auto justify-content-center d-inline-flex wow fadeInUp" data-wow-delay=".1s">
                            <i class="ri-map-pin-line"></i> Our Locations
                        </span>
                        <h2 class="heading-title mt-4">
                            Find Our <span class="text-primary">Global Offices</span>
                        </h2>
                        <p>We're present across multiple regions to better serve our clients worldwide.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">
                <div class="col-md-6">
                    <div class="office-card wow fadeInUp" data-wow-delay=".1s" style="--accent:#016937;">
                        <div class="office-flag">
                            <img src="{{ asset('FrontendAssets/images/flags/pakistan.webp') }}" alt="Pakistan flag">
                        </div>
                        <div>
                            <span class="office-region">Offshore Development Center</span>
                            <h3>Pakistan Office</h3>
                            <p>71A Street 3, Sindhi Muslim Cooperative Housing Society, Block A (SMCHS), Karachi, 75400, Pakistan</p>
                            <div><span class="office-hours"><i class="ri-time-line"></i> Mon - Sat, 9 AM - 11:30 PM</span></div>
                            <a class="office-directions" href="https://www.google.com/maps/search/?api=1&query=71A%20Street%203%2C%20Sindhi%20Muslim%20Cooperative%20Housing%20Society%2C%20Block%20A%20%28SMCHS%29%2C%20Karachi%2C%2075400%2C%20Pakistan" target="_blank" rel="noopener">
                                Get Directions <i class="ri-arrow-right-up-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="office-card wow fadeInUp" data-wow-delay=".2s" style="--accent:#d52b1e;">
                        <div class="office-flag">
                            <img src="{{ asset('FrontendAssets/images/flags/canada.png') }}" alt="Canada flag">
                        </div>
                        <div>
                            <span class="office-region">Headquarters</span>
                            <h3>Canada Office</h3>
                            <p>Suite 391 - 1505 Laperriere Avenue, Ottawa, Ontario K1Z 7T1, Canada</p>
                            <div><span class="office-hours"><i class="ri-time-line"></i> Sun - Fri, 9 AM - 11:30 PM</span></div>
                            <a class="office-directions" href="https://www.google.com/maps/search/?api=1&query=Suite%20391%20-%201505%20Laperriere%20Avenue%2C%20Ottawa%2C%20Ontario%20K1Z%207T1%2C%20Canada" target="_blank" rel="noopener">
                                Get Directions <i class="ri-arrow-right-up-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Offices -->

@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('team-contact-form');
    if (!form || typeof Swal === 'undefined') return;

    const button = form.querySelector('[data-contact-submit]');
    const icon = form.querySelector('[data-submit-icon]');
    const text = form.querySelector('[data-submit-text]');

    const alertTheme = () => {
        const dark = document.documentElement.getAttribute('data-theme-mode') === 'dark';
        return {
            background: dark ? '#101311' : '#ffffff',
            color: dark ? '#f5f7f5' : '#161816',
            confirmButtonColor: '#b8e900',
            customClass: { popup: 'contact-swal-popup', confirmButton: 'contact-swal-confirm' }
        };
    };

    const setLoading = (loading) => {
        button.disabled = loading;
        text.textContent = loading ? 'Sending message...' : 'Send Message';
        icon.className = loading ? 'ri-loader-4-line contact-spinner' : 'ri-send-plane-2-line';
    };

    form.addEventListener('submit', async function (event) {
        event.preventDefault();
        form.querySelectorAll('.is-invalid').forEach(field => field.classList.remove('is-invalid'));
        if (!form.checkValidity()) { form.reportValidity(); return; }

        setLoading(true);
        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
                body: new FormData(form)
            });
            const data = await response.json().catch(() => ({}));

            if (!response.ok) {
                Object.keys(data.errors || {}).forEach(name => form.querySelector(`[name="${name}"]`)?.classList.add('is-invalid'));
                const throttled = response.status === 429;
                await Swal.fire({
                    ...alertTheme(),
                    icon: throttled ? 'warning' : (data.icon || 'error'),
                    title: throttled ? 'Please slow down' : (data.title || 'Unable to send'),
                    text: throttled ? 'Too many messages were sent. Please wait one minute and try again.' : (data.message || 'Please check your details and try again.'),
                    confirmButtonText: 'Got it'
                });
                return;
            }

            form.reset();
            await Swal.fire({
                ...alertTheme(), icon: 'success', title: data.title, text: data.message,
                confirmButtonText: 'Done', timer: 6500, timerProgressBar: true
            });
        } catch (error) {
            await Swal.fire({ ...alertTheme(), icon: 'error', title: 'Connection problem', text: 'We could not reach the server. Please check your connection and try again.', confirmButtonText: 'Try again' });
        } finally {
            setLoading(false);
        }
    });
});
</script>
@endsection

@section('schema')
<script type="application/ld+json">
@php $ld = [
    '@context' => 'https://schema.org',
    '@graph' => [
        ['@type' => 'ContactPage', '@id' => url('/contact') . '#contactpage',
         'url' => url('/contact'), 'name' => 'Contact Deveon Inc',
         'about' => ['@id' => url('/') . '#organization']],
        ['@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')], ['@type' => 'ListItem', 'position' => 2, 'name' => 'Contact', 'item' => url('/contact')]]],
    ],
]; @endphp
{!! json_encode($ld, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection
