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
      aspect-ratio: 16 / 10;   /* house ratio: source images are 1600x1000 */
      overflow: hidden;
      background: var(--gray-100);
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

  /* =====================================================================
     DEVEON HERO v2 — enterprise-grade dark split hero
     Left: message + proof.  Right: a CSS-3D product surface.
     Accent is used sparingly (one word, one button, live data) so the
     composition reads as calm and expensive rather than neon.
     ===================================================================== */
  .deveon-hero {
      --dv-lime: rgb(var(--primary-rgb));
      --dv-line: rgba(255, 255, 255, 0.08);
      --dv-text: rgba(255, 255, 255, 0.58);
      position: relative;
      overflow: hidden;
      isolation: isolate;
      padding: 140px 0 78px;
      background: #04050a;
  }

  .deveon-hero > .dv-bg {
      position: absolute;
      inset: 0;
      z-index: 0;
      pointer-events: none;
  }

  /* soft directional light behind the product surface */
  .dv-bg::before {
      content: "";
      position: absolute;
      inset-block-start: -18%;
      inset-inline-end: -12%;
      width: 68rem;
      height: 68rem;
      border-radius: 50%;
      background:
          radial-gradient(50% 50% at 50% 50%, rgba(var(--primary-rgb), 0.13), transparent 62%),
          radial-gradient(38% 38% at 46% 46%, rgba(150, 210, 255, 0.05), transparent 70%);
      filter: blur(20px);
  }

  /* cool counter-light bottom left, keeps the frame from going flat */
  .dv-bg::after {
      content: "";
      position: absolute;
      inset-block-end: -30%;
      inset-inline-start: -20%;
      width: 52rem;
      height: 52rem;
      border-radius: 50%;
      background: radial-gradient(50% 50% at 50% 50%, rgba(120, 160, 255, 0.07), transparent 65%);
      filter: blur(24px);
  }

  .dv-bg__grid {
      position: absolute;
      inset: 0;
      opacity: 0.55;
      background-image:
          linear-gradient(rgba(255, 255, 255, 0.035) 1px, transparent 1px),
          linear-gradient(90deg, rgba(255, 255, 255, 0.035) 1px, transparent 1px);
      background-size: 64px 64px;
      -webkit-mask-image: radial-gradient(78% 82% at 60% 42%, #000 0%, transparent 74%);
      mask-image: radial-gradient(78% 82% at 60% 42%, #000 0%, transparent 74%);
  }

  /* fine film grain — the detail that separates "web page" from "product shot" */
  .dv-bg__noise {
      position: absolute;
      inset: 0;
      opacity: 0.035;
      mix-blend-mode: overlay;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3'/%3E%3C/filter%3E%3Crect width='140' height='140' filter='url(%23n)'/%3E%3C/svg%3E");
  }

  .dv-bg__arc {
      position: absolute;
      inset-block-start: 8%;
      inset-inline-start: -26%;
      width: 108rem;
      height: 76rem;
      border-radius: 50%;
      border: 1px solid transparent;
      border-block-start-color: rgba(var(--primary-rgb), 0.28);
      border-inline-end-color: rgba(var(--primary-rgb), 0.1);
      transform: rotate(-8deg);
  }

  /* hairline at the very top + fade into whatever section follows */
  .dv-bg__edge {
      position: absolute;
      inset-inline: 0;
      inset-block-start: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(var(--primary-rgb), 0.35), transparent);
  }

  .deveon-hero .container {
      position: relative;
      z-index: 2;
  }

  /* =====================================================================
     LEFT — message
     ===================================================================== */
  .dv-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 7px 16px 7px 9px;
      margin-bottom: 28px;
      border-radius: 999px;
      border: 1px solid var(--dv-line);
      background: rgba(255, 255, 255, 0.035);
      backdrop-filter: blur(6px);
      font-size: 0.7rem;
      font-weight: 600;
      letter-spacing: 0.11em;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.72);
      white-space: nowrap;
  }

  .dv-eyebrow__pulse {
      position: relative;
      display: inline-flex;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: rgba(var(--primary-rgb), 0.14);
      flex: 0 0 auto;
  }

  .dv-eyebrow__pulse::before,
  .dv-eyebrow__pulse::after {
      content: "";
      position: absolute;
      inset: 50%;
      width: 6px;
      height: 6px;
      margin: -3px 0 0 -3px;
      border-radius: 50%;
      background: var(--dv-lime);
  }

  .dv-eyebrow__pulse::after {
      animation: dvPing 2.4s cubic-bezier(0, 0, 0.2, 1) infinite;
  }

  @keyframes dvPing {
      0%   { transform: scale(1); opacity: 0.6; }
      70%  { transform: scale(3.2); opacity: 0; }
      100% { transform: scale(3.2); opacity: 0; }
  }

  .dv-eyebrow em {
      font-style: normal;
      color: rgba(255, 255, 255, 0.28);
      padding: 0 2px;
  }

  .dv-hero__title {
      font-size: clamp(2.3rem, 3.55vw, 3.6rem);
      font-weight: 700;
      line-height: 1.04;
      letter-spacing: -0.033em;
      color: #fff;
      margin-bottom: 24px;
      text-wrap: balance;
  }

  .dv-hero__title .dv-accent {
      background: linear-gradient(96deg, rgb(var(--primary-rgb)) 0%, #e6ff7a 55%, rgb(var(--primary-rgb)) 100%);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      color: var(--dv-lime);
  }

  .dv-hero__sub {
      max-width: 31rem;
      font-size: 1.02rem;
      line-height: 1.72;
      color: var(--dv-text);
      margin-bottom: 30px;
  }

  /* ---------- Buttons ---------- */
  .dv-hero__cta {
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      gap: 14px;
      margin-bottom: 32px;
  }

  .dv-btn {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      padding: 13px 14px 13px 24px;
      border-radius: 999px;
      font-size: 0.8rem;
      font-weight: 700;
      letter-spacing: 0.055em;
      text-decoration: none;
      white-space: nowrap;
      transition: transform 0.35s cubic-bezier(0.2, 0.8, 0.2, 1),
                  box-shadow 0.35s ease, background 0.35s ease,
                  border-color 0.35s ease, color 0.35s ease;
  }

  .dv-btn__icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 28px;
      height: 28px;
      border-radius: 50%;
      font-size: 0.95rem;
      transition: transform 0.35s cubic-bezier(0.2, 0.8, 0.2, 1), background 0.35s ease;
  }

  .dv-btn--primary {
      position: relative;
      color: #0a0e04;
      background: linear-gradient(180deg, #d8ff4b 0%, rgb(var(--primary-rgb)) 55%, #9dc700 100%);
      box-shadow:
          0 1px 0 rgba(255, 255, 255, 0.55) inset,
          0 14px 34px -16px rgba(var(--primary-rgb), 0.85);
  }

  .dv-btn--primary .dv-btn__icon {
      background: rgba(10, 14, 4, 0.16);
  }

  .dv-btn--primary:hover {
      color: #0a0e04;
      transform: translateY(-2px);
      box-shadow:
          0 1px 0 rgba(255, 255, 255, 0.6) inset,
          0 22px 46px -18px rgba(var(--primary-rgb), 0.95);
  }

  .dv-btn--primary:hover .dv-btn__icon {
      transform: translate(2px, -2px);
  }

  .dv-btn--ghost {
      color: rgba(255, 255, 255, 0.88);
      border: 1px solid var(--dv-line);
      background: rgba(255, 255, 255, 0.03);
      backdrop-filter: blur(6px);
  }

  .dv-btn--ghost .dv-btn__icon {
      background: rgba(255, 255, 255, 0.07);
  }

  .dv-btn--ghost:hover {
      color: #fff;
      border-color: rgba(var(--primary-rgb), 0.45);
      background: rgba(var(--primary-rgb), 0.07);
  }

  .dv-btn--ghost:hover .dv-btn__icon {
      transform: translateX(3px);
      background: rgba(var(--primary-rgb), 0.2);
  }

  /* ---------- Proof strip ---------- */
  .dv-proof {
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px 30px;
      padding-top: 26px;
      border-top: 1px solid var(--dv-line);
  }

  .dv-proof__group {
      display: flex;
      align-items: center;
      gap: 15px;
  }

  .dv-proof__avatars {
      display: flex;
      padding: 0;
      margin: 0;
      list-style: none;
  }

  .dv-proof__avatars li {
      width: 46px;
      height: 46px;
      border-radius: 50%;
      overflow: hidden;
      border: 2px solid #0c0e12;
      margin-inline-start: -14px;
      background: #14171d;
      box-shadow: 0 6px 16px -8px rgba(0, 0, 0, 0.9);
  }

  .dv-proof__avatars li:first-child { margin-inline-start: 0; }

  .dv-proof__avatars img {
      width: 100%;
      height: 100%;
      object-fit: cover;
  }

  .dv-proof__stars {
      display: flex;
      gap: 3px;
      padding: 0;
      margin: 0 0 5px;
      list-style: none;
      color: var(--dv-lime);
      font-size: 0.9rem;
      line-height: 1;
  }

  .dv-proof__meta {
      font-size: 0.92rem;
      line-height: 1.3;
      color: rgba(255, 255, 255, 0.5);
      white-space: nowrap;
  }

  .dv-proof__meta b {
      color: #fff;
      font-weight: 700;
      font-size: 1rem;
  }

  .dv-proof__sep {
      width: 1px;
      height: 46px;
      background: rgba(255, 255, 255, 0.14);
  }

  .dv-proof__stat {
      line-height: 1.2;
  }

  /* The odometer plugin generates its OWN <span> elements inside this box
     (.odometer-digit, .odometer-value, ...). The caption rule below therefore
     has to be a direct-child selector (.dv-proof__stat > span) or it captures
     those generated spans, shrinking the number and blocking out the suffix. */
  .dv-proof__num {
      display: block;
      font-size: 1.85rem;
      font-weight: 700;
      color: #fff;
      letter-spacing: -0.025em;
      line-height: 1;
      white-space: nowrap;
  }

  .dv-proof__num .odometer {
      display: inline-block;
      vertical-align: middle;
      font-size: 1.85rem;
      font-weight: inherit;
      letter-spacing: inherit;
      color: inherit;
  }

  .dv-proof__num .suffix {
      display: inline-block;
      vertical-align: baseline;
      font-size: 1.5rem;
      line-height: 1;
      color: var(--dv-lime);
      margin-inline-start: 2px;
  }

  .dv-proof__stat > span {
      display: block;
      font-size: 0.9rem;
      color: rgba(255, 255, 255, 0.5);
      margin-top: 8px;
  }

  /* =====================================================================
     RIGHT — CSS-3D product surface
     ===================================================================== */
  .dv-scene {
      position: relative;
      z-index: 2;
      perspective: 2000px;
      perspective-origin: 62% 45%;
  }

  .dv-scene__halo {
      position: absolute;
      inset: -14% -10% -20%;
      border-radius: 50%;
      background: radial-gradient(50% 50% at 52% 48%, rgba(var(--primary-rgb), 0.1), transparent 68%);
      filter: blur(28px);
      pointer-events: none;
  }

  .dv-scene__ring {
      position: absolute;
      inset-block-start: 2%;
      inset-inline-start: -8%;
      width: 120%;
      height: 104%;
      border-radius: 50%;
      border: 1px solid transparent;
      border-block-end-color: rgba(var(--primary-rgb), 0.5);
      border-inline-start-color: rgba(var(--primary-rgb), 0.12);
      transform: rotate(15deg);
      filter: drop-shadow(0 0 10px rgba(var(--primary-rgb), 0.4));
      pointer-events: none;
  }

  .dv-stage {
      position: relative;
      transform-style: preserve-3d;
      transform: rotateY(-15deg) rotateX(6deg) rotateZ(-1deg);
      animation: dvFloat 9s ease-in-out infinite;
  }

  @keyframes dvFloat {
      0%, 100% { transform: rotateY(-15deg) rotateX(6deg) rotateZ(-1deg) translateY(0); }
      50%      { transform: rotateY(-15deg) rotateX(6deg) rotateZ(-1deg) translateY(-12px); }
  }

  @media (prefers-reduced-motion: reduce) {
      .dv-stage { animation: none; }
      .dv-eyebrow__pulse::after { animation: none; }
  }

  /* stacked glass panels receding behind the main surface */
  .dv-ghost {
      position: absolute;
      inset-block-start: 5%;
      inset-inline-end: -5%;
      width: 76%;
      height: 86%;
      border-radius: 16px;
      border: 1px solid rgba(255, 255, 255, 0.08);
      background: linear-gradient(160deg, rgba(255, 255, 255, 0.045), rgba(255, 255, 255, 0.004));
  }

  .dv-ghost--1 { transform: translate3d(10%, -6%, -80px);  opacity: 0.5; }
  .dv-ghost--2 { transform: translate3d(19%, -12%, -160px); opacity: 0.26; }

  /* ---------- Device shell ---------- */
  .dv-device {
      position: relative;
      border-radius: 16px;
      padding: 1px;
      background: linear-gradient(150deg, rgba(255, 255, 255, 0.28), rgba(255, 255, 255, 0.05) 38%, rgba(255, 255, 255, 0.02) 70%, rgba(var(--primary-rgb), 0.22));
      box-shadow:
          0 60px 100px -46px rgba(0, 0, 0, 0.95),
          0 24px 50px -30px rgba(0, 0, 0, 0.85),
          0 0 90px -40px rgba(var(--primary-rgb), 0.4);
  }

  .dv-device__body {
      border-radius: 15px;
      overflow: hidden;
      background: #0a0b0f;
  }

  /* glass sheen over the screen */
  .dv-device::after {
      content: "";
      position: absolute;
      inset: 1px;
      border-radius: 15px;
      pointer-events: none;
      background: linear-gradient(122deg, rgba(255, 255, 255, 0.09) 0%, rgba(255, 255, 255, 0.02) 22%, transparent 44%);
  }

  /* ---------- App chrome ---------- */
  .dv-chrome {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 7px 12px;
      background: linear-gradient(180deg, #16181e, #101116);
      border-block-end: 1px solid rgba(255, 255, 255, 0.07);
  }

  .dv-chrome__dots {
      display: inline-flex;
      gap: 5px;
      flex: 0 0 auto;
  }

  .dv-chrome__dots i {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.16);
  }

  .dv-chrome__dots i:first-child { background: rgba(var(--primary-rgb), 0.85); }

  .dv-chrome__search {
      flex: 1 1 auto;
      display: flex;
      align-items: center;
      gap: 6px;
      max-width: 15rem;
      padding: 4px 10px;
      border-radius: 999px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.06);
      font-size: 8px;
      color: rgba(255, 255, 255, 0.32);
  }

  .dv-chrome__right {
      margin-inline-start: auto;
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 7.5px;
  }

  .dv-pill {
      display: inline-flex;
      align-items: center;
      gap: 4px;
      padding: 3px 8px;
      border-radius: 999px;
      border: 1px solid rgba(var(--primary-rgb), 0.28);
      background: rgba(var(--primary-rgb), 0.1);
      color: rgb(var(--primary-rgb));
      font-weight: 700;
      letter-spacing: 0.06em;
  }

  .dv-pill i {
      width: 4px;
      height: 4px;
      border-radius: 50%;
      background: currentColor;
  }

  .dv-chrome__avatar {
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background: linear-gradient(140deg, #3a4150, #1d2028);
      border: 1px solid rgba(255, 255, 255, 0.12);
  }

  /* ---------- Dashboard ---------- */
  .dv-ui {
      display: grid;
      grid-template-columns: 8.8rem 1fr;
      font-size: 10px;
      min-height: 19.5rem;
      color: rgba(255, 255, 255, 0.72);
  }

  .dv-ui__side {
      padding: 11px 9px;
      background: #08090c;
      border-inline-end: 1px solid rgba(255, 255, 255, 0.06);
      display: flex;
      flex-direction: column;
  }

  .dv-ui__brand {
      display: flex;
      align-items: center;
      gap: 7px;
      padding: 0 7px 15px;
  }

  .dv-ui__brand img { width: 14px; height: auto; }

  .dv-ui__brand b {
      font-size: 11px;
      font-weight: 700;
      color: #fff;
      letter-spacing: -0.01em;
  }

  .dv-ui__label {
      font-size: 6.5px;
      letter-spacing: 0.16em;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.24);
      padding: 0 7px 7px;
  }

  .dv-ui__nav {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      gap: 1px;
  }

  .dv-ui__nav li {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 6px 7px;
      border-radius: 6px;
      color: rgba(255, 255, 255, 0.42);
      font-size: 9px;
  }

  .dv-ui__nav li i { font-size: 10px; opacity: 0.8; }

  .dv-ui__nav li.is-active {
      background: linear-gradient(90deg, rgba(var(--primary-rgb), 0.14), rgba(var(--primary-rgb), 0.02));
      color: #fff;
      box-shadow: inset 2px 0 0 rgb(var(--primary-rgb));
  }

  .dv-ui__nav li.is-active i { color: var(--dv-lime); opacity: 1; }

  .dv-ui__foot {
      margin-block-start: auto;
      padding: 8px;
      border-radius: 8px;
      border: 1px solid rgba(255, 255, 255, 0.07);
      background: rgba(255, 255, 255, 0.025);
      font-size: 7px;
      color: rgba(255, 255, 255, 0.4);
  }

  .dv-ui__foot b {
      display: block;
      font-size: 8px;
      color: #fff;
      margin-bottom: 4px;
      font-weight: 600;
  }

  .dv-uptime {
      display: flex;
      gap: 1.5px;
      margin-top: 5px;
      height: 12px;
      align-items: flex-end;
  }

  .dv-uptime i {
      flex: 1;
      height: 100%;
      border-radius: 1px;
      background: rgba(var(--primary-rgb), 0.75);
  }

  .dv-uptime i:nth-child(3),
  .dv-uptime i:nth-child(9) { background: rgba(255, 255, 255, 0.18); height: 62%; }

  .dv-ui__main {
      padding: 11px;
      background: #0a0c10;
      display: grid;
      gap: 7px;
      align-content: start;
  }

  .dv-ui__head {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 10px;
  }

  .dv-ui__head h4 {
      margin: 0 0 2px;
      font-size: 13px;
      font-weight: 700;
      color: #fff;
      letter-spacing: -0.01em;
  }

  .dv-ui__head p {
      margin: 0;
      font-size: 7.5px;
      color: rgba(255, 255, 255, 0.34);
  }

  .dv-seg {
      display: inline-flex;
      padding: 2px;
      border-radius: 6px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.06);
      font-size: 7px;
      flex: 0 0 auto;
  }

  .dv-seg span {
      padding: 3px 7px;
      border-radius: 4px;
      color: rgba(255, 255, 255, 0.4);
  }

  .dv-seg span.is-on {
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
  }

  .dv-card {
      border-radius: 8px;
      border: 1px solid rgba(255, 255, 255, 0.07);
      background: linear-gradient(168deg, rgba(255, 255, 255, 0.045), rgba(255, 255, 255, 0.014));
      padding: 9px 10px;
  }

  .dv-ui__stats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 7px;
  }

  .dv-stat__label {
      font-size: 7px;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.36);
      margin-bottom: 5px;
  }

  .dv-stat__value {
      font-size: 14px;
      font-weight: 700;
      color: #fff;
      letter-spacing: -0.02em;
      line-height: 1.1;
  }

  .dv-stat__row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 6px;
      margin-top: 5px;
  }

  .dv-delta {
      font-size: 7.5px;
      font-weight: 700;
      color: var(--dv-lime);
      display: inline-flex;
      align-items: center;
      gap: 2px;
  }

  .dv-spark { width: 34px; height: 12px; display: block; }

  .dv-ui__row {
      display: grid;
      grid-template-columns: 1.6fr 1fr;
      gap: 7px;
  }

  .dv-card__head {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
      margin-bottom: 7px;
  }

  .dv-card__head b {
      font-size: 9.5px;
      font-weight: 600;
      color: #fff;
  }

  .dv-chip {
      font-size: 7px;
      padding: 2px 7px;
      border-radius: 999px;
      border: 1px solid rgba(255, 255, 255, 0.1);
      color: rgba(255, 255, 255, 0.45);
      white-space: nowrap;
  }

  .dv-chart { display: block; width: 100%; height: 50px; }

  .dv-axis {
      display: flex;
      justify-content: space-between;
      font-size: 6.5px;
      color: rgba(255, 255, 255, 0.26);
      margin-top: 5px;
  }

  .dv-donut__wrap {
      display: flex;
      align-items: center;
      gap: 10px;
  }

  .dv-donut {
      position: relative;
      flex: 0 0 auto;
      width: 54px;
      height: 54px;
      border-radius: 50%;
      background: conic-gradient(rgb(var(--primary-rgb)) 0 68%, rgba(255, 255, 255, 0.3) 68% 88%, rgba(255, 255, 255, 0.11) 88% 100%);
      -webkit-mask: radial-gradient(circle, transparent 58%, #000 59%);
      mask: radial-gradient(circle, transparent 58%, #000 59%);
  }

  .dv-donut__mid {
      position: absolute;
      inset: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 10px;
      font-weight: 700;
      color: #fff;
  }

  .dv-legend {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      gap: 5px;
      font-size: 7.5px;
      color: rgba(255, 255, 255, 0.55);
      flex: 1 1 auto;
  }

  .dv-legend li { display: flex; align-items: center; gap: 5px; }

  .dv-legend em {
      width: 5px; height: 5px; border-radius: 1.5px;
      background: var(--dv-lime); flex: 0 0 auto;
  }

  .dv-legend li:nth-child(2) em { background: rgba(255, 255, 255, 0.32); }
  .dv-legend li:nth-child(3) em { background: rgba(255, 255, 255, 0.13); }

  .dv-legend span {
      margin-inline-start: auto;
      color: rgba(255, 255, 255, 0.85);
      font-weight: 600;
  }

  .dv-table { display: grid; gap: 0; }

  .dv-table__row {
      display: grid;
      grid-template-columns: 1.6fr 0.9fr 1fr 0.55fr;
      align-items: center;
      gap: 7px;
      padding: 4px 0;
      font-size: 7.5px;
      color: rgba(255, 255, 255, 0.5);
      border-block-end: 1px solid rgba(255, 255, 255, 0.045);
  }

  .dv-table__row:last-child { border-block-end: 0; padding-bottom: 0; }

  .dv-table__row.is-head {
      font-size: 6.5px;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.28);
      padding-top: 0;
  }

  .dv-table__row b { font-weight: 600; color: rgba(255, 255, 255, 0.9); }

  .dv-dot { display: inline-flex; align-items: center; gap: 4px; }

  .dv-dot::before {
      content: "";
      width: 4px; height: 4px; border-radius: 50%;
      background: var(--dv-lime);
      box-shadow: 0 0 6px rgba(var(--primary-rgb), 0.8);
  }

  .dv-dot--muted::before { background: rgba(255, 255, 255, 0.28); box-shadow: none; }

  .dv-bar {
      position: relative;
      height: 3px;
      border-radius: 999px;
      background: rgba(255, 255, 255, 0.09);
      overflow: hidden;
  }

  .dv-bar i {
      position: absolute;
      inset: 0;
      inset-inline-end: auto;
      border-radius: 999px;
      background: linear-gradient(90deg, rgba(var(--primary-rgb), 0.5), rgb(var(--primary-rgb)));
  }

  /* ---------- Phone ---------- */
  .dv-phone {
      position: absolute;
      inset-block-end: -14%;
      inset-inline-end: -2%;
      width: 20%;
      min-width: 8.4rem;
      padding: 1px;
      border-radius: 16px;
      background: linear-gradient(150deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05) 45%, rgba(var(--primary-rgb), 0.2));
      transform: translateZ(110px);
      box-shadow: 0 46px 76px -36px rgba(0, 0, 0, 0.95), 0 0 60px -26px rgba(var(--primary-rgb), 0.45);
  }

  .dv-phone__screen {
      border-radius: 15px;
      overflow: hidden;
      background: #0a0c10;
      padding: 10px 9px 9px;
      display: grid;
      gap: 7px;
      font-size: 8px;
      color: rgba(255, 255, 255, 0.6);
  }

  .dv-phone__notch {
      width: 26%;
      height: 3px;
      border-radius: 999px;
      background: rgba(255, 255, 255, 0.16);
      margin: 0 auto 1px;
  }

  .dv-phone__head {
      display: flex;
      align-items: center;
      justify-content: space-between;
  }

  .dv-phone__head b { font-size: 9.5px; font-weight: 700; color: #fff; }

  .dv-phone__kpi { display: grid; gap: 2px; }

  .dv-phone__kpi span {
      font-size: 6.5px;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.34);
  }

  .dv-phone__kpi div {
      display: flex;
      align-items: baseline;
      justify-content: space-between;
  }

  .dv-phone__kpi b { font-size: 11px; color: #fff; letter-spacing: -0.02em; }

  .dv-phone__bars {
      display: flex;
      align-items: flex-end;
      gap: 3px;
      height: 40px;
      margin-top: 2px;
  }

  .dv-phone__bars i {
      flex: 1;
      border-radius: 2px 2px 0 0;
      background: linear-gradient(180deg, rgb(var(--primary-rgb)), rgba(var(--primary-rgb), 0.18));
  }

  /* ---------- Reflection under the device ---------- */
  .dv-reflect {
      position: absolute;
      inset-inline: 8%;
      inset-block-end: -16%;
      height: 22%;
      background: linear-gradient(180deg, rgba(var(--primary-rgb), 0.16), transparent 72%);
      filter: blur(22px);
      transform: translateZ(-40px);
      pointer-events: none;
  }

  /* ---------- Rotating brand badge ---------- */
  .dv-badge {
      position: absolute;
      inset-block-end: -13%;
      inset-inline-start: -11%;
      z-index: 4;
      width: 9.2rem;
      height: 9.2rem;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(8, 10, 14, 0.62);
      border: 1px solid rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(14px);
      box-shadow: 0 34px 64px -30px rgba(0, 0, 0, 0.95), 0 0 0 1px rgba(255, 255, 255, 0.03) inset;
  }

  .dv-badge .rotating-text { animation: rotate2 14s linear infinite; display: flex; }

  .dv-badge .rotating-text svg {
      width: 124px;
      height: auto;
      overflow: visible;
      word-spacing: 18px;
      opacity: 0.85;
  }

  .dv-badge__mark {
      position: absolute;
      width: 5.3rem;
      height: 5.3rem;
      border-radius: 50%;
      border: 1px solid rgba(255, 255, 255, 0.1);
      background: linear-gradient(155deg, rgba(255, 255, 255, 0.07), rgba(255, 255, 255, 0.015));
      display: flex;
      align-items: center;
      justify-content: center;
  }

  .dv-badge__mark img { width: 2.3rem; height: auto; }

  /* =====================================================================
     Responsive
     ===================================================================== */
  @media (max-width: 1399px) {
      .dv-badge { width: 8.6rem; height: 8.6rem; inset-inline-start: -4%; }
      .dv-badge .rotating-text svg { width: 108px; }
      .dv-badge__mark { width: 4.6rem; height: 4.6rem; }
      .dv-badge__mark img { width: 2rem; }
  }

  @media (max-width: 1199px) {
      .deveon-hero { padding: 144px 0 100px; }
      .dv-scene { margin-top: 68px; }
      .dv-stage, .dv-stage:hover { transform: rotateY(-10deg) rotateX(4deg); animation: none; }
      .dv-ui { grid-template-columns: 7.8rem 1fr; min-height: 20rem; }
  }

  @media (max-width: 991px) {
      .dv-ui { grid-template-columns: 1fr; }
      .dv-ui__side { display: none; }
      .dv-badge { width: 7.6rem; height: 7.6rem; inset-block-end: -4%; }
      .dv-badge .rotating-text svg { width: 96px; }
      .dv-badge__mark { width: 4.1rem; height: 4.1rem; }
      .dv-badge__mark img { width: 1.8rem; }
  }

  @media (max-width: 767px) {
      .deveon-hero { padding: 118px 0 76px; }
      .dv-hero__cta { margin-bottom: 34px; }
      .dv-proof { padding-top: 24px; gap: 14px 18px; }
      .dv-proof__sep { display: none; }
      .dv-stage { transform: none; }
      .dv-ghost, .dv-phone, .dv-scene__ring, .dv-reflect { display: none; }
      .dv-ui__row { grid-template-columns: 1fr; }
      .dv-badge { display: none; }
      .dv-chrome__search { max-width: none; }
  }

  @media (max-width: 575px) {
      .dv-ui__stats { grid-template-columns: 1fr 1fr; }
      .dv-ui__stats .dv-card:last-child { display: none; }
      .dv-eyebrow { font-size: 0.62rem; letter-spacing: 0.08em; white-space: normal; }
  }

 </style>
@endsection

@section('content')

     <div class="home02-spacer">
                </div>

 <!-- start: banner Section -->
                <section class="hero deveon-hero">
                  <div class="dv-bg">
                    <span class="dv-bg__grid"></span>
                    <span class="dv-bg__arc"></span>
                    <span class="dv-bg__noise"></span>
                    <span class="dv-bg__edge"></span>
                  </div>

                  <div class="container">
                    <div class="row align-items-center g-5">

                      <!-- ================= LEFT : message ================= -->
                      <div class="col-xl-5 col-lg-6">
                        <span class="dv-eyebrow wow fadeInUp" data-wow-delay=".1s">
                          <span class="dv-eyebrow__pulse"></span>
                          Software Development <em>/</em> AI <em>/</em> Digital Products
                        </span>

                        <h1 class="dv-hero__title wow fadeInUp" data-wow-delay=".15s">
                          We build software that <span class="dv-accent">moves business</span> forward.
                        </h1>

                        <p class="dv-hero__sub wow fadeInUp" data-wow-delay=".2s">
                          From strategy and product design to engineering and AI, we create
                          digital systems built to scale.
                        </p>

                        <div class="dv-hero__cta wow fadeInUp" data-wow-delay=".25s">
                          <a href="{{ route('contact') }}" class="dv-btn dv-btn--primary">
                            <span>Start a Project</span>
                            <span class="dv-btn__icon"><i class="ri-arrow-right-up-line"></i></span>
                          </a>
                          <a href="{{ route('portfolio') }}" class="dv-btn dv-btn--ghost">
                            <span>View Our Work</span>
                            <span class="dv-btn__icon"><i class="ri-arrow-right-line"></i></span>
                          </a>
                        </div>

                        <div class="dv-proof wow fadeInUp" data-wow-delay=".3s">
                          <div class="dv-proof__group">
                            <ul class="dv-proof__avatars">
                              <li><img src="{{ asset('FrontendAssets/images/profile/1.jpg') }}" alt="Client"></li>
                              <li><img src="{{ asset('FrontendAssets/images/profile/2.jpg') }}" alt="Client"></li>
                              <li><img src="{{ asset('FrontendAssets/images/profile/3.jpg') }}" alt="Client"></li>
                              <li><img src="{{ asset('FrontendAssets/images/profile/4.jpg') }}" alt="Client"></li>
                            </ul>
                            <div>
                              <ul class="dv-proof__stars">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                              </ul>
                              <div class="dv-proof__meta"><b>4.9/5</b> average client rating</div>
                            </div>
                          </div>

                          <span class="dv-proof__sep"></span>

                          <div class="dv-proof__stat">
                            <div class="dv-proof__num">
                              <span class="odometer" data-count="150"></span><span class="suffix">+</span>
                            </div>
                            <span>Happy clients</span>
                          </div>

                        </div>
                      </div>

                      <!-- ================= RIGHT : product surface ================= -->
                      <div class="col-xl-7 col-lg-6">
                        <div class="dv-scene wow fadeInUp" data-wow-delay=".2s">
                          <span class="dv-scene__halo"></span>
                          <span class="dv-scene__ring"></span>

                          <div class="dv-stage">
                            <span class="dv-ghost dv-ghost--1"></span>
                            <span class="dv-ghost dv-ghost--2"></span>
                            <span class="dv-reflect"></span>

                            <!-- ---- main device ---- -->
                            <div class="dv-device">
                              <div class="dv-device__body">

                                <!-- app chrome -->
                                <div class="dv-chrome">
                                  <span class="dv-chrome__dots"><i></i><i></i><i></i></span>
                                  <span class="dv-chrome__search">
                                    <i class="ri-search-line"></i> Search projects, clients, reports&hellip;
                                  </span>
                                  <span class="dv-chrome__right">
                                    <span class="dv-pill"><i></i> LIVE</span>
                                    <span class="dv-chrome__avatar"></span>
                                  </span>
                                </div>

                                <div class="dv-ui">

                                  <!-- sidebar -->
                                  <aside class="dv-ui__side">
                                    <div class="dv-ui__brand">
                                      <img src="{{ asset('FrontendAssets/images/brand/deveon-mark-lime.png') }}" alt="Deveon">
                                      <b>Deveon</b>
                                    </div>
                                    <div class="dv-ui__label">Workspace</div>
                                    <ul class="dv-ui__nav">
                                      <li class="is-active"><i class="ri-dashboard-3-line"></i> Overview</li>
                                      <li><i class="ri-line-chart-line"></i> Analytics</li>
                                      <li><i class="ri-folder-3-line"></i> Projects</li>
                                      <li><i class="ri-team-line"></i> Clients</li>
                                      <li><i class="ri-code-s-slash-line"></i> Deployments</li>
                                      <li><i class="ri-settings-3-line"></i> Settings</li>
                                    </ul>
                                  </aside>

                                  <!-- main -->
                                  <div class="dv-ui__main">

                                    <div class="dv-ui__head">
                                      <div>
                                        <h4>Overview</h4>
                                        <p>Performance across every active engagement.</p>
                                      </div>
                                      <span class="dv-seg">
                                        <span>7D</span><span class="is-on">30D</span><span>12M</span>
                                      </span>
                                    </div>

                                    <div class="dv-ui__stats">
                                      <div class="dv-card">
                                        <div class="dv-stat__label">Total Revenue</div>
                                        <div class="dv-stat__value">$98,540</div>
                                        <div class="dv-stat__row">
                                          <span class="dv-delta"><i class="ri-arrow-up-line"></i>12.5%</span>
                                          <svg class="dv-spark" viewBox="0 0 40 14" preserveAspectRatio="none" aria-hidden="true">
                                            <polyline points="1,11 8,8 15,10 22,5 29,7 38,2" fill="none"
                                              stroke="rgb(184,235,0)" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></polyline>
                                          </svg>
                                        </div>
                                      </div>
                                      <div class="dv-card">
                                        <div class="dv-stat__label">Active Users</div>
                                        <div class="dv-stat__value">12,846</div>
                                        <div class="dv-stat__row">
                                          <span class="dv-delta"><i class="ri-arrow-up-line"></i>8.2%</span>
                                          <svg class="dv-spark" viewBox="0 0 40 14" preserveAspectRatio="none" aria-hidden="true">
                                            <polyline points="1,9 8,11 15,6 22,8 29,4 38,3" fill="none"
                                              stroke="rgb(184,235,0)" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></polyline>
                                          </svg>
                                        </div>
                                      </div>
                                      <div class="dv-card">
                                        <div class="dv-stat__label">Conversion</div>
                                        <div class="dv-stat__value">4.32%</div>
                                        <div class="dv-stat__row">
                                          <span class="dv-delta"><i class="ri-arrow-up-line"></i>1.1%</span>
                                          <svg class="dv-spark" viewBox="0 0 40 14" preserveAspectRatio="none" aria-hidden="true">
                                            <polyline points="1,10 8,7 15,9 22,6 29,7 38,4" fill="none"
                                              stroke="rgb(184,235,0)" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></polyline>
                                          </svg>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="dv-ui__row">
                                      <!-- delivery velocity -->
                                      <div class="dv-card">
                                        <div class="dv-card__head">
                                          <b>Delivery velocity</b>
                                          <span class="dv-chip">Apr 2026</span>
                                        </div>
                                        <svg class="dv-chart" viewBox="0 0 260 66" preserveAspectRatio="none" aria-hidden="true">
                                          <defs>
                                            <linearGradient id="dvFill" x1="0" y1="0" x2="0" y2="1">
                                              <stop offset="0%" stop-color="rgb(184,235,0)" stop-opacity=".3"></stop>
                                              <stop offset="100%" stop-color="rgb(184,235,0)" stop-opacity="0"></stop>
                                            </linearGradient>
                                          </defs>
                                          <line x1="0" y1="16" x2="260" y2="16" stroke="rgba(255,255,255,.05)"></line>
                                          <line x1="0" y1="33" x2="260" y2="33" stroke="rgba(255,255,255,.05)"></line>
                                          <line x1="0" y1="50" x2="260" y2="50" stroke="rgba(255,255,255,.05)"></line>
                                          <path d="M4,50 L40,37 L76,44 L112,21 L148,30 L184,12 L220,24 L256,7 L256,66 L4,66 Z" fill="url(#dvFill)"></path>
                                          <polyline points="4,50 40,37 76,44 112,21 148,30 184,12 220,24 256,7"
                                                    fill="none" stroke="rgb(184,235,0)" stroke-width="1.8"
                                                    stroke-linecap="round" stroke-linejoin="round"></polyline>
                                          <circle cx="256" cy="7" r="3" fill="rgb(184,235,0)"></circle>
                                          <circle cx="256" cy="7" r="6" fill="rgb(184,235,0)" opacity=".2"></circle>
                                        </svg>
                                        <div class="dv-axis">
                                          <span>Apr 07</span><span>Apr 14</span><span>Apr 21</span><span>Apr 28</span>
                                        </div>
                                      </div>

                                      <!-- portfolio health -->
                                      <div class="dv-card">
                                        <div class="dv-card__head"><b>Portfolio health</b></div>
                                        <div class="dv-donut__wrap">
                                          <span class="dv-donut"><span class="dv-donut__mid">68%</span></span>
                                          <ul class="dv-legend">
                                            <li><em></em> Shipped <span>68%</span></li>
                                            <li><em></em> In build <span>20%</span></li>
                                            <li><em></em> Scoping <span>12%</span></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- active engagements -->
                                    <div class="dv-card">
                                      <div class="dv-card__head">
                                        <b>Active engagements</b>
                                        <span class="dv-chip">View all</span>
                                      </div>
                                      <div class="dv-table">
                                        <div class="dv-table__row is-head">
                                          <span>Project</span><span>Status</span><span>Progress</span><span>Updated</span>
                                        </div>
                                        <div class="dv-table__row">
                                          <b>MCM Textile ERP</b>
                                          <span class="dv-dot">In build</span>
                                          <span class="dv-bar"><i style="inset-inline-end:15%"></i></span>
                                          <span>2h</span>
                                        </div>
                                        <div class="dv-table__row">
                                          <b>POSEV Retail POS</b>
                                          <span class="dv-dot">Shipped</span>
                                          <span class="dv-bar"><i style="inset-inline-end:0"></i></span>
                                          <span>9h</span>
                                        </div>
                                        <div class="dv-table__row">
                                          <b>Insight Data Engine</b>
                                          <span class="dv-dot">In build</span>
                                          <span class="dv-bar"><i style="inset-inline-end:58%"></i></span>
                                          <span>1d</span>
                                        </div>
                                        <div class="dv-table__row">
                                          <b>Fielda Mobile v2.0</b>
                                          <span class="dv-dot dv-dot--muted">Scoping</span>
                                          <span class="dv-bar"><i style="inset-inline-end:80%"></i></span>
                                          <span>2d</span>
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- ---- companion phone ---- -->
                            <div class="dv-phone">
                              <div class="dv-phone__screen">
                                <span class="dv-phone__notch"></span>
                                <div class="dv-phone__head">
                                  <b>Overview</b>
                                  <span class="dv-pill"><i></i> LIVE</span>
                                </div>
                                <div class="dv-phone__kpi">
                                  <span>Revenue</span>
                                  <div><b>$98,540</b><em class="dv-delta" style="font-style:normal">+12.5%</em></div>
                                </div>
                                <div class="dv-phone__kpi">
                                  <span>Active users</span>
                                  <div><b>12,846</b><em class="dv-delta" style="font-style:normal">+8.2%</em></div>
                                </div>
                                <div class="dv-phone__bars">
                                  <i style="height:34%"></i><i style="height:58%"></i><i style="height:44%"></i>
                                  <i style="height:74%"></i><i style="height:52%"></i><i style="height:90%"></i>
                                  <i style="height:66%"></i>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- ---- rotating brand badge ---- -->
                          <div class="dv-badge d-lg-flex d-none">
                            <div class="rotating-text">
                              <svg width="200" height="200" viewBox="0 0 250 250">
                                <defs>
                                  <path id="circlePathUnique" d="M125,125 m-120,0 a120,120 0 1,1 240,0 a120,120 0 1,1 -240,0"></path>
                                </defs>
                                <text>
                                  <textPath href="#circlePathUnique" font-size="26" font-weight="500" fill="#fff" startOffset="0%">
                                    * DEVEON INC * SOFTWARE DEVELOPMENT * 5+ YEARS
                                  </textPath>
                                </text>
                              </svg>
                            </div>
                            <div class="dv-badge__mark">
                              <img src="{{ asset('FrontendAssets/images/brand/deveon-mark-white.png') }}" alt="Deveon">
                            </div>
                          </div>

                        </div>
                      </div>

                    </div>
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

@include('frontend.partials.testimonials')


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
                              <img src="{{ ($blog->image && file_exists(public_path('storage/' . $blog->image))) ? asset('storage/' . $blog->image) : asset('FrontendAssets/images/blog/blog1.png') }}" alt="{{ $blog->title }}" loading="lazy">
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
