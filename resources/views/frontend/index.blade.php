@extends('layouts.frontend.master')

@section('css')
<style>
  /*
      --primary-color is a bright lime green that has very low contrast on
      white/light backgrounds (it only "pops" against dark ones). Rather than
      changing the color itself, give it a soft dark edge so it reads clearly
      on light backgrounds too, the way the dark backdrop does for it elsewhere.
  */
  [data-theme-mode="light"] .heading-title .text-primary {
      text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
  }

  /* ---------- Shared section header + pill CTA (services, blog, etc.) ---------- */
  .services-header p,
  .section-header-cta p {
      font-size: 1.02rem;
      line-height: 1.7;
      opacity: 0.72;
      margin-bottom: 22px;
  }

  .services-header .heading-subtitle,
  .section-header-cta .heading-subtitle {
      gap: 8px;
      font-size: 0.8rem;
      letter-spacing: 0.14em;
      background: var(--gray-100);
  }

  .services-header .heading-subtitle i,
  .section-header-cta .heading-subtitle i {
      font-size: 0.55rem;
      color: var(--primary-color);
  }

  [data-theme-mode="light"] .services-header .heading-subtitle i,
  [data-theme-mode="light"] .section-header-cta .heading-subtitle i {
      text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
  }

  .services-header .heading-title,
  .section-header-cta .heading-title {
      letter-spacing: -0.015em;
  }

  .services-cta {
      display: inline-flex;
      align-items: center;
      gap: 16px;
      padding: 8px 8px 8px 28px;
      border-radius: 999px;
      background: rgb(var(--dark-rgb));
      color: var(--custom-white);
      font-weight: 700;
      font-size: 0.92rem;
      letter-spacing: 0.02em;
      text-transform: uppercase;
      transition: gap 0.35s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.35s ease;
  }

  .services-cta:hover {
      gap: 22px;
      color: var(--custom-white);
      box-shadow: 0 20px 40px -18px rgba(var(--dark-rgb), 0.5);
  }

  .services-cta__icon {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      width: 46px;
      height: 46px;
      border-radius: 50%;
      background: var(--primary-color);
      color: #111;
      font-size: 1.2rem;
      transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1);
  }

  .services-cta:hover .services-cta__icon {
      transform: rotate(45deg);
  }

  @media (max-width: 575px) {
      .services-cta {
          padding: 7px 7px 7px 22px;
          font-size: 0.85rem;
      }

      .services-cta__icon {
          width: 40px;
          height: 40px;
          font-size: 1.05rem;
      }
  }

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

  /* ---------- Blog & News section ---------- */
  .home-blog-section .blog-card {
      position: relative;
      display: flex;
      flex-direction: column;
      height: 100%;
      border-radius: 1.5rem;
      overflow: hidden;
      border: 1px solid var(--border);
      background: var(--gray-100);
      transition: transform 0.4s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.4s ease, border-color 0.4s ease;
  }

  .home-blog-section .blog-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 34px 64px -32px rgba(var(--dark-rgb), 0.4);
      border-color: color-mix(in srgb, var(--primary-color) 45%, var(--border));
  }

  .home-blog-section .blog-card__media {
      position: relative;
      display: block;
      aspect-ratio: 4 / 3;
      overflow: hidden;
  }

  .home-blog-section .blog-card__media-link {
      display: block;
      width: 100%;
      height: 100%;
  }

  .home-blog-section .blog-card__media img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
  }

  .home-blog-section .blog-card:hover .blog-card__media img {
      transform: scale(1.08);
  }

  .home-blog-section .blog-card__category {
      position: absolute;
      top: 18px;
      inset-inline-start: 18px;
      z-index: 2;
      display: inline-flex;
      align-items: center;
      padding: 6px 16px;
      border-radius: 999px;
      font-size: 0.72rem;
      font-weight: 700;
      letter-spacing: 0.04em;
      text-transform: uppercase;
      background: linear-gradient(to right, var(--primary-color) 0%, rgb(var(--secondary-rgb)) 100%);
      color: #111;
      box-shadow: 0 10px 24px -10px rgba(0, 0, 0, 0.4);
      transition: transform 0.3s ease;
  }

  .home-blog-section .blog-card__category:hover {
      color: #111;
      transform: translateY(-2px);
  }

  .home-blog-section .blog-card__body {
      display: flex;
      flex-direction: column;
      flex: 1;
      padding: 28px 26px 30px;
  }

  .home-blog-section .blog-card__date {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 0.82rem;
      opacity: 0.6;
      margin-bottom: 14px;
      color: rgb(var(--dark-rgb));
  }

  .home-blog-section .blog-card__date i {
      color: var(--primary-color);
  }

  [data-theme-mode="light"] .home-blog-section .blog-card__date i {
      text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
  }

  .home-blog-section .blog-card__title {
      font-size: 1.2rem;
      font-weight: 700;
      line-height: 1.4;
      margin-bottom: 12px;
      color: rgb(var(--dark-rgb));
  }

  .home-blog-section .blog-card__title a {
      color: inherit;
      background-image: linear-gradient(currentColor, currentColor);
      background-size: 0 2px;
      background-repeat: no-repeat;
      background-position: 0 100%;
      transition: background-size 0.3s ease, color 0.3s ease;
  }

  .home-blog-section .blog-card__title a:hover {
      color: var(--primary-color);
      background-size: 100% 2px;
  }

  [data-theme-mode="light"] .home-blog-section .blog-card__title a:hover {
      text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
  }

  .home-blog-section .blog-card__excerpt {
      font-size: 0.92rem;
      line-height: 1.65;
      opacity: 0.7;
      margin-bottom: 22px;
      flex: 1;
  }

  .home-blog-section .blog-card__link {
      display: flex;
      width: 100%;
      align-items: center;
      gap: 6px;
      font-size: 0.88rem;
      font-weight: 700;
      color: rgb(var(--dark-rgb));
      padding-top: 18px;
      border-top: 1px solid var(--border);
      text-shadow: 0 0 1px rgba(17, 17, 17, 0.4);
      transition: color 0.3s ease, gap 0.3s ease, border-color 0.3s ease;
  }

  [data-theme-mode="dark"] .home-blog-section .blog-card__link {
      text-shadow: none;
  }

  .home-blog-section .blog-card__link i {
      color: var(--primary-color);
      transition: transform 0.3s ease;
  }

  .home-blog-section .blog-card:hover .blog-card__link {
      color: var(--primary-color);
      gap: 10px;
      border-color: color-mix(in srgb, var(--primary-color) 40%, var(--border));
  }

  .home-blog-section .blog-card:hover .blog-card__link i {
      transform: translate(2px, -2px);
  }

  /* ---------- Portfolio section (3D tilt showcase slider) ---------- */
  .home-portfolio-section .portpolio04-swiper {
      padding: 6px 6px 40px;
  }

  .home-portfolio-section .portfolio-card {
      --accent: var(--primary-color);
      position: relative;
      display: block;
      border-radius: 1.5rem;
      border: 1px solid var(--border);
      background: var(--gray-100);
      padding: 20px 20px 26px;
      transition: transform 0.15s ease-out, box-shadow 0.4s ease, border-color 0.4s ease;
      transform-style: preserve-3d;
      will-change: transform;
  }

  .home-portfolio-section .portfolio-card:hover {
      box-shadow: 0 40px 70px -30px rgba(var(--dark-rgb), 0.45);
      border-color: color-mix(in srgb, var(--accent) 45%, var(--border));
  }

  .home-portfolio-section .portfolio-card__glow {
      position: absolute;
      inset: 0;
      z-index: 2;
      border-radius: inherit;
      pointer-events: none;
      opacity: 0;
      background: radial-gradient(280px circle at var(--x, 50%) var(--y, 50%), color-mix(in srgb, var(--accent) 22%, transparent), transparent 60%);
      transition: opacity 0.4s ease;
  }

  .home-portfolio-section .portfolio-card:hover .portfolio-card__glow {
      opacity: 1;
  }

  .home-portfolio-section .portfolio-card__frame {
      position: relative;
      z-index: 1;
      border-radius: 1rem;
      overflow: hidden;
      border: 1px solid var(--border);
      background: var(--custom-white);
      transform: translateZ(30px);
  }

  .home-portfolio-section .portfolio-card__bar {
      display: flex;
      align-items: center;
      gap: 6px;
      padding: 12px 14px;
      background: var(--gray-200);
      border-bottom: 1px solid var(--border);
  }

  .home-portfolio-section .portfolio-card__bar span {
      width: 9px;
      height: 9px;
      border-radius: 50%;
      background: rgb(var(--dark-rgb));
      opacity: 0.16;
  }

  .home-portfolio-section .portfolio-card__bar span:first-child {
      background: var(--accent);
      opacity: 0.85;
  }

  .home-portfolio-section .portfolio-card__url {
      margin-inline-start: 8px;
      padding: 3px 12px;
      border-radius: 999px;
      background: var(--custom-white);
      border: 1px solid var(--border);
      font-size: 0.7rem;
      color: rgb(var(--dark-rgb));
      opacity: 0.55;
  }

  .home-portfolio-section .portfolio-card__screen {
      position: relative;
      aspect-ratio: 16 / 10;
      overflow: hidden;
      background: var(--gray-200);
  }

  .home-portfolio-section .portfolio-card__screen img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: top center;
      transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
  }

  .home-portfolio-section .portfolio-card:hover .portfolio-card__screen img {
      transform: scale(1.05);
  }

  .home-portfolio-section .portfolio-card__info {
      position: relative;
      z-index: 1;
      padding-top: 22px;
      transform: translateZ(20px);
  }

  .home-portfolio-section .portfolio-card__tag {
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

  .home-portfolio-section .portfolio-card__title {
      margin: 0 0 10px;
      font-size: 1.15rem;
      font-weight: 700;
      line-height: 1.35;
      color: rgb(var(--dark-rgb));
  }

  .home-portfolio-section .portfolio-card__title a {
      color: inherit;
      background-image: linear-gradient(currentColor, currentColor);
      background-size: 0 2px;
      background-repeat: no-repeat;
      background-position: 0 100%;
      transition: background-size 0.3s ease, color 0.3s ease;
  }

  .home-portfolio-section .portfolio-card__title a:hover {
      color: var(--accent);
      background-size: 100% 2px;
  }

  .home-portfolio-section .portfolio-card__desc {
      margin: 0 0 16px;
      font-size: 0.88rem;
      line-height: 1.6;
      opacity: 0.7;
  }

  .home-portfolio-section .portfolio-card__link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 0.85rem;
      font-weight: 700;
      color: rgb(var(--dark-rgb));
      transition: gap 0.3s ease, color 0.3s ease;
  }

  .home-portfolio-section .portfolio-card__link i {
      color: var(--accent);
      transition: transform 0.3s ease;
  }

  .home-portfolio-section .portfolio-card:hover .portfolio-card__link {
      color: var(--accent);
      gap: 10px;
  }

  .home-portfolio-section .portfolio-card:hover .portfolio-card__link i {
      transform: translate(2px, -2px);
  }

  /* ---------- Process / "How We Deliver" section ----------
     Intentionally hard-coded dark palette: this section is designed to always
     read as a dark surface, in both light and dark site themes — it does not
     invert like other sections. Only the lime accent uses the theme token,
     since --primary-color is identical across both themes anyway.
     It's full-bleed (background on the section itself, not an inset card), with
     its own border + grid texture so it reads as a distinct band even when the
     page itself is already dark. */
  .process-dark-section {
      position: relative;
      overflow: hidden;
      background:
          radial-gradient(60% 70% at 50% -10%, rgba(184, 235, 0, 0.12), transparent 60%),
          linear-gradient(180deg, #121218 0%, #08080b 100%);
      border-top: 1px solid rgba(255, 255, 255, 0.08);
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      box-shadow: inset 0 1px 0 rgba(184, 235, 0, 0.08);
  }

  .process-dark-section::before {
      content: "";
      position: absolute;
      inset: 0;
      z-index: 0;
      opacity: 0.5;
      background-image:
          linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
          linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
      background-size: 42px 42px;
      -webkit-mask-image: radial-gradient(70% 70% at 50% 30%, #000 0%, transparent 75%);
      mask-image: radial-gradient(70% 70% at 50% 30%, #000 0%, transparent 75%);
      pointer-events: none;
  }

  .process-dark-section .container {
      position: relative;
      z-index: 1;
  }

  .process-dark-header {
      position: relative;
      z-index: 1;
      text-align: center;
      max-width: 640px;
      margin: 0 auto 56px;
  }

  .process-dark-eyebrow {
      display: inline-block;
      margin-bottom: 14px;
      font-size: 0.8rem;
      font-weight: 700;
      letter-spacing: 0.16em;
      text-transform: uppercase;
      color: var(--primary-color);
  }

  .process-dark-title {
      margin: 0 0 16px;
      font-size: 2.4rem;
      font-weight: 700;
      line-height: 1.25;
      color: #fff;
  }

  .process-dark-title span {
      color: var(--primary-color);
  }

  @media (max-width: 767px) {
      .process-dark-title {
          font-size: 1.7rem;
      }
  }

  .process-dark-desc {
      margin: 0;
      font-size: 1rem;
      line-height: 1.7;
      color: rgba(255, 255, 255, 0.6);
  }

  .process-dark-steps {
      position: relative;
      z-index: 1;
      display: flex;
      align-items: flex-start;
      gap: 6px;
  }

  .process-dark-step {
      flex: 1 1 0;
      min-width: 0;
      text-align: center;
      padding: 0 8px;
  }

  .process-dark-step__badge {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 78px;
      height: 78px;
      margin: 0 auto 22px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid color-mix(in srgb, var(--primary-color) 30%, transparent);
      font-size: 1.7rem;
      color: var(--primary-color);
      transition: transform 0.35s ease, background 0.35s ease;
  }

  .process-dark-step:hover .process-dark-step__badge {
      transform: translateY(-4px);
      background: color-mix(in srgb, var(--primary-color) 14%, transparent);
  }

  .process-dark-step__num {
      position: absolute;
      bottom: -6px;
      right: -6px;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 26px;
      height: 26px;
      border-radius: 50%;
      background: var(--primary-color);
      border: 3px solid #0c0c11;
      color: #0a0a0d;
      font-size: 0.7rem;
      font-weight: 800;
  }

  .process-dark-step__title {
      margin: 0 0 10px;
      font-size: 1.05rem;
      font-weight: 700;
      color: #fff;
  }

  .process-dark-step__text {
      margin: 0 auto;
      max-width: 230px;
      font-size: 0.88rem;
      line-height: 1.65;
      color: rgba(255, 255, 255, 0.55);
  }

  .process-dark-connector {
      flex: 0 0 auto;
      width: 70px;
      padding-top: 24px;
  }

  .process-dark-connector svg {
      display: block;
      width: 100%;
      height: 30px;
      overflow: visible;
  }

  .process-dark-connector path {
      fill: none;
      stroke: var(--primary-color);
      stroke-width: 2;
      stroke-linecap: round;
      stroke-dasharray: 5 6;
      opacity: 0.6;
      marker-end: url(#processArrowHead);
  }

  @media (max-width: 991px) {
      .process-dark-steps {
          flex-direction: column;
          align-items: center;
          gap: 40px;
      }

      .process-dark-step {
          padding: 0;
      }

      .process-dark-connector {
          display: none;
      }
  }

  /* ---------- Testimonials section ---------- */
  .home-testimonials-header .heading-subtitle i {
      font-size: 0.55rem;
      color: var(--primary-color);
  }

  [data-theme-mode="light"] .home-testimonials-header .heading-subtitle i {
      text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
  }

  .home-testimonials-header p {
      font-size: 1.02rem;
      opacity: 0.72;
  }

  .testimonial-card {
      position: relative;
      overflow: hidden;
      border-radius: 1.5rem !important;
      gap: 24px !important;
      transition: transform 0.4s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.4s ease;
  }

  .testimonial-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 34px 64px -32px rgba(var(--dark-rgb), 0.35);
  }

  .testimonial-card .testimonial-content,
  .testimonial-card .testimonial-author {
      position: relative;
      z-index: 1;
  }

  .testimonial-quote-icon {
      position: absolute;
      top: 26px;
      inset-inline-end: 30px;
      z-index: 0;
      font-size: 3.2rem;
      line-height: 1;
      color: var(--primary-color);
      opacity: 0.16;
  }

  .testimonial-stars {
      display: flex;
      gap: 4px;
      margin: 0 0 16px;
      padding: 0;
      list-style: none;
  }

  .testimonial-stars i {
      font-size: 0.85rem;
      color: var(--primary-color);
  }

  [data-theme-mode="light"] .testimonial-stars i {
      text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
  }

  .testimonial-card .author-avatar img {
      box-shadow: 0 0 0 3px color-mix(in srgb, var(--primary-color) 35%, transparent);
  }

  .testimonial-divider {
      margin: 0;
      border-top: 1px solid color-mix(in srgb, rgb(var(--dark-rgb)) 12%, transparent);
  }

  .testimonial-card.dark .testimonial-divider {
      border-top-color: color-mix(in srgb, var(--custom-white) 18%, transparent);
  }
 </style>
@endsection

@section('content')

     <div class="home02-spacer">
                </div>

 <!-- start: banner Section -->
                <section class="hero hero-banner-01 pb-0 overflow-hidden">
                  <div class="container">
                    <div class="row">
                      <div class="col-12">
                        <div class="hero-banner-content position-relative">
                          <h1 class="hero__title text-start split-title">
                            Innovative
                            <span class="glow-text">
                              Software
                            </span>
                            <span class="d-flex flex-wrap align-items-center gap-4 text-fixed-white brand-text">
                              Development
                              <span class="banner-image-split">
                                <span class="image-split">
                                  <img src="{{ asset('FrontendAssets/images/projects/10.png')}}" class="image-fluid" alt="">
                                </span>
                                <span class="image-split">
                                  <img src="{{ asset('FrontendAssets/images/projects/11.png')}}" class="image-fluid" alt="">
                                </span>
                                <span class="image-split">
                                  <img src="{{ asset('FrontendAssets/images/projects/12.png')}}" class="image-fluid" alt="">
                                </span>
                              </span>
                              Company
                            </span>
                          </h1>
                          <img src="{{ asset('FrontendAssets/images/shapes/65.png')}}" alt="" class="img-fluid banner-shape-arrow-img d-xl-block d-none">
                        </div>
                        <div class="about-section">
                          <div class="about-container">
                            <div class="about-right">
                              <p class="text-fixed-white op-7">
                                We build custom software, mobile apps, and digital experiences that help businesses grow. Our team combines strong engineering with thoughtful design to deliver measurable results.
                              </p>
                              <div class="d-flex gap-3">
                                <div class="avatar-list-stacked me-3">
                                  <span class="avatar avatar-rounded">
                                    <img src="{{ asset('FrontendAssets/images/profile/1.jpg')}}" alt="img">
                                  </span>
                                  <span class="avatar avatar-rounded">
                                    <img src="{{ asset('FrontendAssets/images/profile/2.jpg')}}" alt="img">
                                  </span>
                                  <span class="avatar avatar-rounded">
                                    <img src="{{ asset('FrontendAssets/images/profile/3.jpg')}}" alt="img">
                                  </span>
                                  <span class="avatar avatar-rounded">
                                    <img src="{{ asset('FrontendAssets/images/profile/4.jpg')}}" alt="img">
                                  </span>
                                </div>
                                <div class="rating-box">
                                  <span class="rating-label">
                                    4.9 Ratings
                                  </span>
                                  <ul class="stars">
                                    <li>
                                      <i class="ri-star-fill">
                                      </i>
                                    </li>
                                    <li>
                                      <i class="ri-star-fill">
                                      </i>
                                    </li>
                                    <li>
                                      <i class="ri-star-fill">
                                      </i>
                                    </li>
                                    <li>
                                      <i class="ri-star-fill">
                                      </i>
                                    </li>
                                    <li>
                                      <i class="ri-star-fill">
                                      </i>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="divider op-6 d-xl-block d-none">
                            </div>
                            <div class="about-left">
                              <div class="counter-box">
                                <div class="profile-experince-number">
                                  <span class="odometer metricCard__number mb-2" data-count="150">
                                  </span>
                                  <span class="suffix">
                                    +
                                  </span>
                                </div>
                                <div class="counter-title">
                                  Happy Clients
                                </div>
                              </div>
                              <a href="{{ route('about') }}" class="btn btn-white-bg landing-custom-button btn-anim">
                                <span class="btn__text">
                                  Explore Now
                                </span>
                                <span class="btn__icon">
                                  <i class="ri-arrow-right-long-line">
                                  </i>
                                </span>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="hero-video-banner d-xl-flex d-none">
                          <div class="rotating-text">
                            <svg width="200" height="200" viewBox="0 0 250 250">
                              <defs>
                                <path id="circlePathUnique" d="M125,125 m-120,0 a120,120 0 1,1 240,0 a120,120 0 1,1 -240,0">
                                </path>
                              </defs>
                              <text>
                                <textPath href="#circlePathUnique" font-size="26" font-weight="500" fill="#fff" startOffset="0%">
                                  * DEVEON INC * SOFTWARE DEVELOPMENT * 5+ YEARS
                                </textPath>
                              </text>
                            </svg>
                          </div>
                          <div class="hero-video-brand">
                            <img src="{{ asset('FrontendAssets/images/brand/toggle-dark.png')}}" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="swiper marquee-section">
                    <div class="swiper-wrapper marquee-container">
                      <div class="swiper-slide marquee-item">
                        <span class="marquee-text stroke">
                          IT Solutions & Consulting
                        </span>
                        <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                      </div>
                      <div class="swiper-slide marquee-item">
                        <span class="marquee-text">
                          Creative Idea Generation
                        </span>
                        <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                      </div>
                      <div class="swiper-slide marquee-item">
                        <span class="marquee-text stroke">
                          Product Design & Development
                        </span>
                        <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                      </div>
                      <div class="swiper-slide marquee-item">
                        <span class="marquee-text">
                          Modern Web Design
                        </span>
                        <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                      </div>
                      <div class="swiper-slide marquee-item">
                        <span class="marquee-text stroke">
                          Digital Marketing Strategy
                        </span>
                        <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                      </div>
                      <div class="swiper-slide marquee-item">
                        <span class="marquee-text">
                          IT Solutions
                        </span>
                        <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                      </div>
                      <div class="swiper-slide marquee-item">
                        <span class="marquee-text stroke">
                          UX/UI Design
                        </span>
                        <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                      </div>
                      <div class="swiper-slide marquee-item">
                        <span class="marquee-text">
                          Digital Marketing
                        </span>
                        <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                      </div>
                    </div>
                  </div> -->
                  <div class="bg-image-shape op-8">
                    <img src="{{ asset('FrontendAssets/images/shapes/69.png')}}" alt="">
                  </div>
                </section>
                <!-- end: banner Section -->
                 <section class="section">
                  <div class="container">
                    <div class="d-flex gap-4 mb-5 pb-4 justify-content-center align-items-center">
                      <div class="devider-side d-xl-block d-none">
                      </div>
                      <div class="heading-section mb-0 text-center">
                        <span class="heading-subtitle mb-0 flex-wrap justify-content-center rounded-pill wow fadeInUp" data-wow-delay=".3s">
                          Partnering with
                          <span class="text-fixed-white fw-semibold px-3 py-1 bg-primary-gradient rounded-pill">
                            50+
                          </span>
                          Organizations Across Various Sectors
                        </span>
                      </div>
                      <div class="rotate-180 devider-side d-xl-block d-none">
                      </div>
                    </div>
                    <div class="swiper client-swiper">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide">
                          <img src="{{ asset('FrontendAssets/images/png/apps/6.svg')}}" alt="Brand" class="brand02-image rounded" style="padding: 0rem;">
                        </div>
                        <div class="swiper-slide">
                          <img src="{{ asset('FrontendAssets/images/png/apps/7.svg')}}" alt="Brand" class="brand02-image rounded" style="padding: 0rem;">
                        </div>
                        <div class="swiper-slide">
                          <img src="{{ asset('FrontendAssets/images/png/apps/8.svg')}}" alt="Brand" class="brand02-image rounded">
                        </div>
                        <div class="swiper-slide">
                          <img src="{{ asset('FrontendAssets/images/png/apps/9.svg')}}" alt="Brand" class="brand02-image rounded">
                        </div>
                        <div class="swiper-slide">
                          <img src="{{ asset('FrontendAssets/images/png/apps/10.svg')}}" alt="Brand" class="brand02-image rounded" style="padding: 0rem;">
                        </div>
                        <div class="swiper-slide">
                          <img src="{{ asset('FrontendAssets/images/png/apps/11.svg')}}" alt="Brand" class="brand02-image rounded">
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- start: Banner Section -->
                <section class="section section-gap section-gap-x more-aboutus-section">
                  <div class="container">
                    <div class="row gy-4 gx-5 align-items-center about-container">
                      <!-- Left media -->
                      <div class="col-lg-5 position-relative d-lg-block d-none">
                        <div class="abt-media clip-anim">
                          <img loading="lazy" class="abt-media__main anim-img" data-animate="true" src="{{ asset('FrontendAssets/images/shapes/6.png')}}" alt="about">
                        </div>
                        <div class="abt-media__svg">
                          <img src="{{ asset('FrontendAssets/images/shapes/5.png')}}" alt="" class="img-fluid">
                        </div>
                      </div>
                      <!-- Right content -->
                      <div class="col-lg-7">
                        <div class="abt-copy abt-copy--v2">
                          <div class="heading-section text-start">
                            <span class="heading-subtitle rounded-pill wow fadeInUp" data-wow-delay=".3s">
                              <svg fill="var(--primary-color)" width="18" height="22" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.093 18.177c0 2.26-1.833 4.093-4.093 4.093s-4.093-1.833-4.093-4.093c0-5.459 8.187-5.459 8.187 0zM16 2.473c7.145 0.057 15.271 5.095 16 14.589h-9.677c0 0-1.244-5.245-6.323-5.208-5.079 0.031-6.323 5.208-6.323 5.208h-9.677c0.469-9.328 8.459-14.647 16-14.589zM16.068 29.527c-5.328 0.015-10.308-4.005-12.349-10.235h5.959c0 0 1.281 5.187 6.359 5.151 5.084-0.031 6.292-5.151 6.292-5.151h5.953c-1.328 6.588-6.885 10.219-12.213 10.235z"/>
                              </svg>
                              More About Deveon Inc
                            </span>
                            <h2 class="heading-title split-title">
                              Transforming Businesses for the Future with Powerful Software and Digital Solutions.
                            </h2>
                          </div>
                          <div class="abt-split">
                            <div>
                              <div class="experince-box">
                                <div class="experince-number d-flex gap-2">
                                  <span class="odometer metricCard__number mb-2" data-count="10">
                                  </span>
                                  <span class="suffix">
                                    +
                                  </span>
                                </div>
                                <div class="counter-title">
                                  Years Of Experiences
                                </div>
                              </div>
                              <div class="mt-4 pt-2">
                                <a href="{{ route('about') }}" class="btn btn-primary-gradient landing-custom-button btn-anim">
                                  <span class="btn__text">
                                    Know More Us
                                  </span>
                                  <span class="btn__icon">
                                    <i class="ri-arrow-right-long-line">
                                    </i>
                                  </span>
                                </a>
                              </div>
                            </div>
                            <div>
                              <div class="d-flex gap-3 flex-wrap mb-4">
                                <div class="avatar-list-stacked me-3">
                                  <span class="avatar avatar-rounded">
                                    <img src="{{ asset('FrontendAssets/images/profile/1.jpg')}}" alt="img">
                                  </span>
                                  <span class="avatar avatar-rounded">
                                    <img src="{{ asset('FrontendAssets/images/profile/2.jpg')}}" alt="img">
                                  </span>
                                  <span class="avatar avatar-rounded">
                                    <img src="{{ asset('FrontendAssets/images/profile/3.jpg')}}" alt="img">
                                  </span>
                                  <span class="avatar avatar-rounded">
                                    <img src="{{ asset('FrontendAssets/images/profile/4.jpg')}}" alt="img">
                                  </span>
                                </div>
                                <div>
                                  <h2 class="mb-0">
                                    150+
                                  </h2>
                                  <p class="op-7">
                                    Clients Worldwide
                                  </p>
                                </div>
                              </div>
                              <p class="abt-split__text  op-7">
                                We’re Deveon Inc, a software development company that turns your ideas into scalable digital products — from custom software and mobile apps to websites, AI/ML integrations, and design that leave a lasting impact.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- end: Banner Section -->

             <section class="section services-section">
                    <div class="container">
                        <div class="row services-header align-items-end gy-4 mb-5">
                            <div class="col-lg-6">
                                <div class="heading-section text-start mb-0">
                                    <span class="heading-subtitle rounded-pill border px-3 py-2 d-inline-flex wow fadeInUp" data-wow-delay=".1s">
                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                        Service We Offer
                                    </span>
                                    <h2 class="heading-title mt-4 split-title">
                                        End-to-End <span class="text-primary">Digital Solutions</span> For Every Idea
                                    </h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p>
                                    From the first line of code to the final launch, we cover every discipline your product needs under one roof.
                                </p>
                                <a class="services-cta wow fadeInUp" data-wow-delay=".2s" href="{{ route('service') }}">
                                    <span>See All Services</span>
                                    <span class="services-cta__icon"><i class="ri-arrow-right-up-line"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="row gy-4 mb-0">
                            <div class="col-sm-6 col-lg-4">
                                <div class="services-card wow fadeInUp" data-wow-delay=".1s" style="--accent:#f2a90c;">
                                    <span class="services-card__index">01</span>
                                    <div class="services-card__icon">
                                        <i class="ri-terminal-box-line"></i>
                                    </div>
                                    <h3 class="services-card__title">Software Development</h3>
                                    <p class="services-card__desc">
                                        Custom business software and portal solutions designed for scalability and reliability, built around the way your team actually works.
                                    </p>
                                    <a class="services-card__cta" href="{{ route('service.detail', 'software-development') }}">
                                        Explore Service <i class="ri-arrow-right-up-line"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="services-card wow fadeInUp" data-wow-delay=".2s" style="--accent:#3b6fe0;">
                                    <span class="services-card__index">02</span>
                                    <div class="services-card__icon">
                                        <i class="ri-palette-line"></i>
                                    </div>
                                    <h3 class="services-card__title">UI/UX Design</h3>
                                    <p class="services-card__desc">
                                        Deliver seamless and enjoyable digital experiences. Our designs prioritize clarity, ease of use, and attractive interfaces for both web and mobile platforms.
                                    </p>
                                    <a class="services-card__cta" href="{{ route('service.detail', 'ui-ux-design') }}">
                                        Explore Service <i class="ri-arrow-right-up-line"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="services-card wow fadeInUp" data-wow-delay=".3s" style="--accent:#1f9d63;">
                                    <span class="services-card__index">03</span>
                                    <div class="services-card__icon">
                                        <i class="ri-smartphone-line"></i>
                                    </div>
                                    <h3 class="services-card__title">Mobile App Development</h3>
                                    <p class="services-card__desc">
                                        Native and cross-platform app experiences with smooth performance and clean UX. We turn ideas into high-performing mobile apps tailored to your users' needs.
                                    </p>
                                    <a class="services-card__cta" href="{{ route('service.detail', 'mobile-app-development') }}">
                                        Explore Service <i class="ri-arrow-right-up-line"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="services-card wow fadeInUp" data-wow-delay=".1s" style="--accent:#17a2a6;">
                                    <span class="services-card__index">04</span>
                                    <div class="services-card__icon">
                                        <i class="ri-global-line"></i>
                                    </div>
                                    <h3 class="services-card__title">Website Development</h3>
                                    <p class="services-card__desc">
                                        Modern, responsive, and conversion-focused websites tailored to your business goals — from marketing sites to complex web platforms and e-commerce stores.
                                    </p>
                                    <a class="services-card__cta" href="{{ route('service.detail', 'web-development') }}">
                                        Explore Service <i class="ri-arrow-right-up-line"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="services-card wow fadeInUp" data-wow-delay=".2s" style="--accent:#d1483f;">
                                    <span class="services-card__index">05</span>
                                    <div class="services-card__icon">
                                        <i class="ri-line-chart-line"></i>
                                    </div>
                                    <h3 class="services-card__title">SEO & Marketing</h3>
                                    <p class="services-card__desc">
                                        Search visibility, content strategy, and growth campaigns that drive quality traffic and turn visitors into customers.
                                    </p>
                                    <a class="services-card__cta" href="{{ route('service.detail', 'seo-marketing') }}">
                                        Explore Service <i class="ri-arrow-right-up-line"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="services-card wow fadeInUp" data-wow-delay=".3s" style="--accent:#7b4fd1;">
                                    <span class="services-card__index">06</span>
                                    <div class="services-card__icon">
                                        <i class="ri-robot-2-line"></i>
                                    </div>
                                    <h3 class="services-card__title">AI/ML</h3>
                                    <p class="services-card__desc">
                                        We build intelligent features — from automation and predictive models to AI-powered integrations — that give your product a competitive edge.
                                    </p>
                                    <a class="services-card__cta" href="{{ route('service.detail', 'ai-ml') }}">
                                        Explore Service <i class="ri-arrow-right-up-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

   <section class="section py-0 choose04-us-section">
                <div class="choose-thumb-wrapper d-xl-block d-none z-index-1">
                  <div class="clip-anim">
                    <img class="anim-img" data-animate="true" src="{{ asset('FrontendAssets/images/shapes/52.png')}}" alt="">
                  </div>
                </div>
                <div class="container">
                  <div class="row align-items-center">
                    <!-- CONTENT -->
                    <div class="col-xl-7 my-auto offset-xl-5 col-lg-12">
                      <div class="choose04-us-section__content mt-5 pt-4">
                        <!-- TITLE -->
                        <div class="choose04-us-section__header">
                          <div class="heading-section mb-5 text-start">
                            <span class="heading-subtitle rounded-pill wow fadeInUp" data-wow-delay=".3s">
                              <i class="ri-circle-fill">
                              </i>
                              Why Choose Us
                            </span>
                            <h2 class="heading-title mt-4 text-animated-slider">
                              Designing digital experiences that inspire impact.
                            </h2>
                          </div>
                        </div>
                        <!-- FEATURES -->
                        <div class="choose04-us-section__features mb-0 row gy-4 gx-5 align-items-end">
                          <div class="col-md-7">
                            <!-- REVIEW -->
                            <div class="choose04-us-section__review mb-4">
                              <div class="choose04-us-section__review-box flex-wrap">
                                <div class="avatar-list-stacked me-4 mb-3">
                                  <span class="avatar avatar-rounded">
                                    <img src="{{ asset('FrontendAssets/images/profile/1.jpg')}}" alt="img">
                                  </span>
                                  <span class="avatar avatar-rounded">
                                    <img src="{{ asset('FrontendAssets/images/profile/2.jpg')}}" alt="img">
                                  </span>
                                  <span class="avatar avatar-rounded">
                                    <img src="{{ asset('FrontendAssets/images/profile/3.jpg')}}" alt="img">
                                  </span>
                                  <span class="avatar avatar-rounded">
                                    <img src="{{ asset('FrontendAssets/images/profile/4.jpg')}}" alt="img">
                                  </span>
                                </div>
                                <div>
                                  <span class="choose04-us-section__count">
                                    150+
                                  </span>
                                  <p>
                                    Clients Worldwide
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div>
                              <div class="choose04-us-section__item">
                                <span class="choose04-us-section__icon">
                                </span>
                                <p>
                                  5+ years of proven experience delivering results.
                                </p>
                              </div>
                              <div class="choose04-us-section__item">
                                <span class="choose04-us-section__icon">
                                </span>
                                <p>
                                  Trusted by startups and enterprises alike.
                                </p>
                              </div>
                              <div class="choose04-us-section__item">
                                <span class="choose04-us-section__icon">
                                </span>
                                <p>
                                  Focused on maximizing value.
                                </p>
                              </div>
                              <div class="choose04-us-section__item">
                                <span class="choose04-us-section__icon">
                                </span>
                                <p>
                                  A dedicated team driven by passion.
                                </p>
                              </div>
                            </div>
                            <!-- BUTTON -->
                            <div class="choose04-us-section__action mt-5">
                              <a href="{{ route('service') }}" class="btn btn-black-bg landing-custom-button btn-anim">
                                <span class="btn__text">
                                  Read More
                                </span>
                                <span class="btn__icon">
                                  <i class="ri-arrow-right-long-line">
                                  </i>
                                </span>
                              </a>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="choose4-us-image">
                              <img src="{{ asset('FrontendAssets/images/shapes/5.png')}}" alt="img" class="arrow-img d-lg-block d-none">
                              <img src="{{ asset('FrontendAssets/images/shapes/51.png')}}" alt="" class="img-fluid rounded main-image">
                              <div class="choose4-us-img-content">
                                <div class="compign-div d-flex gap-2">
                                  <span class="odometer compign-number" data-count="150">
                                  </span>
                                  <span class="suffix">
                                    +
                                  </span>
                                </div>
                                <h3 class="text-fixed-white op-7 fs-5 fw-medium">
                                  Projects Delivered
                                </h3>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- SLIDER -->
                <div class="swiper chooseus-marque marquee-section">
                  <div class="swiper-wrapper marquee-container">
                    <div class="swiper-slide marquee-item">
                      <span class="marquee-text stroke">
                        Software Development
                      </span>
                      <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                    </div>
                    <div class="swiper-slide marquee-item">
                      <span class="marquee-text">
                        AI & ML Solutions
                      </span>
                      <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                    </div>
                    <div class="swiper-slide marquee-item">
                      <span class="marquee-text stroke">
                        Mobile App Development
                      </span>
                      <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                    </div>
                    <div class="swiper-slide marquee-item">
                      <span class="marquee-text">
                        Website Development
                      </span>
                      <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                    </div>
                    <div class="swiper-slide marquee-item">
                      <span class="marquee-text stroke">
                        SEO & Marketing
                      </span>
                      <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                    </div>
                    <div class="swiper-slide marquee-item">
                      <span class="marquee-text">
                        IT Solutions & Consulting
                      </span>
                      <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                    </div>
                    <div class="swiper-slide marquee-item">
                      <span class="marquee-text stroke">
                        UI/UX Design
                      </span>
                      <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                    </div>
                    <div class="swiper-slide marquee-item">
                      <span class="marquee-text">
                        Digital Marketing
                      </span>
                      <img class="marquee-icon" src="{{ asset('FrontendAssets/images/shapes/4.svg')}}" alt="">
                    </div>
                  </div>
                </div>
              </section>
              <section class="section home-portfolio-section">
                <div class="container">
                  <div class="row section-header-cta align-items-end gy-4 mb-5">
                    <div class="col-lg-6">
                      <div class="heading-section text-start mb-0">
                        <span class="heading-subtitle rounded-pill border px-3 py-2 d-inline-flex wow fadeInUp" data-wow-delay=".1s">
                          <i class="ri-checkbox-blank-circle-fill"></i>
                          Our Portfolio
                        </span>
                        <h2 class="heading-title mt-4 split-title">
                          Building <span class="text-primary">Digital Products</span> That Drive Results
                        </h2>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        A snapshot of the platforms, apps, and systems we've designed, built, and shipped for ambitious teams.
                      </p>
                      <div class="d-flex align-items-center flex-wrap gap-3">
                        <a class="services-cta wow fadeInUp" data-wow-delay=".2s" href="{{ route('portfolio') }}">
                          <span>View All Projects</span>
                          <span class="services-cta__icon"><i class="ri-arrow-right-up-line"></i></span>
                        </a>
                        <div class="slider-navigation">
                          <div class="slider-prev">
                            <span><i class="ri-arrow-left-s-line"></i></span>
                          </div>
                          <div class="slider-next">
                            <span><i class="ri-arrow-right-s-line"></i></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper portpolio04-swiper">
                    <div class="swiper-wrapper">
                      @foreach($portfolios as $item)
                      <div class="swiper-slide">
                        <article class="portfolio-card wow fadeInUp" data-wow-delay=".{{ $loop->iteration }}s" data-tilt style="--accent:{{ $item['accent'] }};">
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
                </div>
              </section>




                  <section class="section process-dark-section">
                  <div class="container">
                    <svg width="0" height="0" style="position:absolute;">
                      <defs>
                        <marker id="processArrowHead" markerWidth="8" markerHeight="8" refX="4" refY="4" orient="auto">
                          <path d="M0,0 L8,4 L0,8 Z" style="fill:var(--primary-color);"></path>
                        </marker>
                      </defs>
                    </svg>
                    <div class="process-dark-header">
                      <span class="process-dark-eyebrow wow fadeInUp" data-wow-delay=".1s">Our Process</span>
                      <h2 class="process-dark-title wow fadeInUp" data-wow-delay=".2s">How We Deliver <span>IT Solutions</span></h2>
                      <p class="process-dark-desc wow fadeInUp" data-wow-delay=".3s">
                        From initial concept to final launch, we follow a proven process that ensures smart solutions, measurable results, and long-term impact.
                      </p>
                    </div>
                    <div class="process-dark-steps">
                      <div class="process-dark-step wow fadeInUp" data-wow-delay=".1s">
                        <div class="process-dark-step__badge">
                          <i class="ri-search-eye-line"></i>
                          <span class="process-dark-step__num">01</span>
                        </div>
                        <h3 class="process-dark-step__title">Business Analysis</h3>
                        <p class="process-dark-step__text">We analyze your goals, market, and challenges to craft the right IT strategy and roadmap.</p>
                      </div>
                      <div class="process-dark-connector">
                        <svg viewBox="0 0 70 30" preserveAspectRatio="none" aria-hidden="true">
                          <path d="M2,26 C20,2 50,2 68,26"></path>
                        </svg>
                      </div>
                      <div class="process-dark-step wow fadeInUp" data-wow-delay=".2s">
                        <div class="process-dark-step__badge">
                          <i class="ri-terminal-window-line"></i>
                          <span class="process-dark-step__num">02</span>
                        </div>
                        <h3 class="process-dark-step__title">System Design</h3>
                        <p class="process-dark-step__text">Our architects design scalable, secure, and user-focused systems tailored to your unique requirements.</p>
                      </div>
                      <div class="process-dark-connector">
                        <svg viewBox="0 0 70 30" preserveAspectRatio="none" aria-hidden="true">
                          <path d="M2,26 C20,2 50,2 68,26"></path>
                        </svg>
                      </div>
                      <div class="process-dark-step wow fadeInUp" data-wow-delay=".3s">
                        <div class="process-dark-step__badge">
                          <i class="ri-shield-check-line"></i>
                          <span class="process-dark-step__num">03</span>
                        </div>
                        <h3 class="process-dark-step__title">Testing & Validation</h3>
                        <p class="process-dark-step__text">We perform rigorous testing to ensure performance, security, and reliability across all environments.</p>
                      </div>
                      <div class="process-dark-connector">
                        <svg viewBox="0 0 70 30" preserveAspectRatio="none" aria-hidden="true">
                          <path d="M2,26 C20,2 50,2 68,26"></path>
                        </svg>
                      </div>
                      <div class="process-dark-step wow fadeInUp" data-wow-delay=".4s">
                        <div class="process-dark-step__badge">
                          <i class="ri-line-chart-line"></i>
                          <span class="process-dark-step__num">04</span>
                        </div>
                        <h3 class="process-dark-step__title">Delivery & Growth</h3>
                        <p class="process-dark-step__text">We deploy with precision and support your growth through continuous optimization and innovation.</p>
                      </div>
                    </div>
                  </div>
                </section>

 <section class="section section-devider">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-xl-6">
                      <div class="heading-section home-testimonials-header mb-5 pb-2 text-center">
                        <span class="heading-subtitle rounded-pill border px-3 py-2 d-inline-flex justify-content-center mx-auto wow fadeInUp" data-wow-delay=".1s">
                          <i class="ri-double-quotes-l"></i>
                          Testimonials
                        </span>
                        <h2 class="heading-title mt-4 split-title">
                          What Our <span class="text-primary">Partners Say</span> About Us!
                        </h2>
                        <p class="mt-4 mb-0">
                          Real feedback from the teams we've partnered with — on the results, the process, and what it's like to work with us.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="swiper freelancer-testimonials-slider">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="testimonial-card">
                          <i class="ri-double-quotes-r testimonial-quote-icon"></i>
                          <div class="testimonial-content">
                            <ul class="testimonial-stars">
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                            </ul>
                            <span class="testimonial-rating">
                              “Outstanding Experience!”
                            </span>
                            <p class="testimonial-text">
                              <span>
                                Deveon
                              </span>
                              truly understood our product vision. Their engineering team shipped our MVP in record time and user engagement tripled in just three months!
                            </p>
                          </div>
                          <div class="testimonial-divider"></div>
                          <div class="testimonial-author">
                            <div class="author-avatar">
                              <img src="{{ asset('FrontendAssets/images/profile/1.jpg')}}" alt="Sarah Lee">
                            </div>
                            <div class="author-info">
                              <h3 class="author-name">
                                Sarah Lee
                              </h3>
                              <span class="author-role">
                                Product Manager
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="testimonial-card dark mt-4">
                          <i class="ri-double-quotes-r testimonial-quote-icon"></i>
                          <div class="testimonial-content">
                            <ul class="testimonial-stars">
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                            </ul>
                            <span class="testimonial-rating">
                              “Truly Transformative!”
                            </span>
                            <p class="testimonial-text">
                              Their insight into scaling small businesses is unmatched. Our app downloads skyrocketed by
                              <span>
                                180%
                              </span>
                              after their strategy.
                            </p>
                          </div>
                          <div class="testimonial-divider"></div>
                          <div class="testimonial-author">
                            <div class="author-avatar">
                              <img src="{{ asset('FrontendAssets/images/profile/2.jpg')}}" alt="Raj Patel">
                            </div>
                            <div class="author-info">
                              <h3 class="author-name">
                                Raj Patel
                              </h3>
                              <span class="author-role">
                                Software Engineer
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="testimonial-card">
                          <i class="ri-double-quotes-r testimonial-quote-icon"></i>
                          <div class="testimonial-content">
                            <ul class="testimonial-stars">
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                            </ul>
                            <span class="testimonial-rating">
                              “Highly Recommended!”
                            </span>
                            <p class="testimonial-text">
                              Deveon helped us rebuild our platform from the ground up, leading to a
                              <span>
                                2.5x
                              </span>
                              increase in active users. Their approach is both practical and innovative.
                            </p>
                          </div>
                          <div class="testimonial-divider"></div>
                          <div class="testimonial-author">
                            <div class="author-avatar">
                              <img src="{{ asset('FrontendAssets/images/profile/1.jpg')}}" alt="Emily Wong">
                            </div>
                            <div class="author-info">
                              <h3 class="author-name">
                                Emily Wong
                              </h3>
                              <span class="author-role">
                                Marketing Lead
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="testimonial-card dark mt-4">
                          <i class="ri-double-quotes-r testimonial-quote-icon"></i>
                          <div class="testimonial-content">
                            <ul class="testimonial-stars">
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                              <li><i class="ri-star-fill"></i></li>
                            </ul>
                            <span class="testimonial-rating">
                              “Game Changer!”
                            </span>
                            <p class="testimonial-text">
                              Working with Deveon boosted our conversion rates tremendously. Their understanding of both engineering and growth is phenomenal.
                            </p>
                          </div>
                          <div class="testimonial-divider"></div>
                          <div class="testimonial-author">
                            <div class="author-avatar">
                              <img src="{{ asset('FrontendAssets/images/profile/2.jpg')}}" alt="Michael Turner">
                            </div>
                            <div class="author-info">
                              <h3 class="author-name">
                                Michael Turner
                              </h3>
                              <span class="author-role">
                                Founder & CEO
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>


                <section class="section home-blog-section">
                  <div class="container">
                    <div class="row section-header-cta align-items-end gy-4 mb-5">
                      <div class="col-lg-6">
                        <div class="heading-section text-start mb-0">
                          <span class="heading-subtitle rounded-pill border px-3 py-2 d-inline-flex wow fadeInUp" data-wow-delay=".1s">
                            <i class="ri-quill-pen-line"></i>
                            Our Blog & News
                          </span>
                          <h2 class="heading-title mt-4 split-title">
                            Explore <span class="text-primary">Blog & Insights</span> from Deveon Inc
                          </h2>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <p>
                          At Deveon Inc, we share insights on software development, mobile apps, design, and digital growth to help businesses build smarter products.
                        </p>
                        @if($latestBlogs->isNotEmpty())
                        <a class="services-cta wow fadeInUp" data-wow-delay=".2s" href="{{ route('blog') }}">
                          <span>View All Blogs</span>
                          <span class="services-cta__icon"><i class="ri-arrow-right-up-line"></i></span>
                        </a>
                        @endif
                      </div>
                    </div>
                    <div class="row gy-4">
                      @forelse($latestBlogs as $blog)
                      <div class="col-lg-4 col-md-6">
                        <article class="blog-card wow fadeInUp" data-wow-delay=".{{ $loop->iteration }}s">
                          <div class="blog-card__media">
                            <a href="{{ route('blog.detail', $blog->slug) }}" class="blog-card__media-link">
                              <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('FrontendAssets/images/blog/blog1.png') }}" alt="{{ $blog->title }}" loading="lazy">
                            </a>
                            <a href="{{ route('blog', ['category' => $blog->category]) }}" class="blog-card__category">
                              {{ $blog->category ?: 'News' }}
                            </a>
                          </div>
                          <div class="blog-card__body">
                            <span class="blog-card__date">
                              <i class="ri-calendar-line"></i>
                              <time datetime="{{ optional($blog->created_at)->toDateString() }}">
                                {{ optional($blog->created_at)->format('M d, Y') }}
                              </time>
                            </span>
                            <h3 class="blog-card__title">
                              <a href="{{ route('blog.detail', $blog->slug) }}">
                                {{ $blog->title }}
                              </a>
                            </h3>
                            <p class="blog-card__excerpt">
                              {{ \Illuminate\Support\Str::limit(strip_tags($blog->content ?? ''), 100) }}
                            </p>
                            <a class="blog-card__link" href="{{ route('blog.detail', $blog->slug) }}">
                              Read Article <i class="ri-arrow-right-up-line"></i>
                            </a>
                          </div>
                        </article>
                      </div>
                      @empty
                        <div class="col-12 text-center"><p>No blog posts are available yet.</p></div>
                      @endforelse
                    </div>
                  </div>
                </section>


@endsection

@section('script')
<script>
  (function () {
    var cards = document.querySelectorAll('.home-portfolio-section [data-tilt]');
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
