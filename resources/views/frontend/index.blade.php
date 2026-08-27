@extends('layouts.frontend.master')

@section('css')
<style>
  .home-blog-section .post-card .post-overlay-content {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }

  .home-blog-section .post-card .post-meta {
    position: relative !important;
    inset: auto !important;
    display: block;
    margin-bottom: 1rem;
  }

  .home-blog-section .post-card .post-category {
    margin-bottom: 0;
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
                              <a href="about.html" class="btn btn-white-bg landing-custom-button btn-anim">
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
                                <a href="about.html" class="btn btn-primary-gradient landing-custom-button btn-anim">
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

             <section class="section">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-xl-6">
                        <div class="heading-section text-center">
                          <span class="heading-subtitle mx-auto justify-content-center border-0 text-gradient wow fadeInUp" data-wow-delay=".3s">
                            <i class="ri-checkbox-blank-circle-fill">
                            </i>
                            Service We Offer
                          </span>
                          <h2 class="heading-title  split-title">
                            End-to-End Digital Solutions For Every Idea
                          </h2>
                        </div>
                      </div>
                    </div>
                    <div class="row gy-4 mb-5 rightSwipeWrap">
                      <div class="col-xl-4">
                        <div class="service-card variant2 right-swipe">
                          <div class="service-card-sub">
                            <div class="service-card-icon">
                              <svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M512 301.2m-10 0a10 10 0 1 0 20 0 10 10 0 1 0-20 0Z" fill="var(--primary-color)" />
                                <path d="M400.3 744.5c2.1-0.7 4.1-1.4 6.2-2-2 0.6-4.1 1.3-6.2 2z m0 0c2.1-0.7 4.1-1.4 6.2-2-2 0.6-4.1 1.3-6.2 2z" fill="rgb(var(--dark-rgb))" />
                                <path d="M511.8 256.6c24.4 0 44.2 19.8 44.2 44.2S536.2 345 511.8 345s-44.2-19.8-44.2-44.2 19.9-44.2 44.2-44.2m0-20c-35.5 0-64.2 28.7-64.2 64.2s28.7 64.2 64.2 64.2 64.2-28.7 64.2-64.2-28.7-64.2-64.2-64.2z" fill="var(--primary-color)" />
                                <path d="M730.7 529.5c0.4-8.7 0.6-17.4 0.6-26.2 0-179.6-86.1-339.1-219.3-439.5-133.1 100.4-219.2 259.9-219.2 439.5 0 8.8 0.2 17.5 0.6 26.1-56 56-90.6 133.3-90.6 218.7 0 61.7 18 119.1 49.1 167.3 30.3-49.8 74.7-90.1 127.7-115.3 39-18.6 82.7-29 128.8-29 48.3 0 93.9 11.4 134.3 31.7 52.5 26.3 96.3 67.7 125.6 118.4 33.4-49.4 52.9-108.9 52.9-173.1 0-85.4-34.6-162.6-90.5-218.6zM351.1 383.4c9.2-37.9 22.9-74.7 40.6-109.5a502.1 502.1 0 0 1 63.6-95.9c17.4-20.6 36.4-39.9 56.8-57.5 20.4 17.6 39.4 36.9 56.8 57.5 24.8 29.5 46.2 61.8 63.6 95.9 17.7 34.8 31.4 71.6 40.6 109.5 8.7 35.8 13.5 72.7 14.2 109.9C637.4 459 577 438.9 512 438.9c-65 0-125.3 20.1-175.1 54.4 0.7-37.2 5.5-74.1 14.2-109.9z m-90.6 449.2c-9.1-27-13.7-55.5-13.7-84.4 0-35.8 7-70.6 20.8-103.2 8.4-19.8 19-38.4 31.9-55.5 9.7 61.5 29.5 119.7 57.8 172.6-36.4 17.8-69 41.6-96.8 70.5z m364.2-85.3c-0.7-0.3-1.5-0.5-2.2-0.8-0.4-0.2-0.9-0.3-1.3-0.5-0.6-0.2-1.3-0.5-1.9-0.7-0.8-0.3-1.5-0.5-2.3-0.8-0.8-0.3-1.5-0.5-2.3-0.7l-0.9-0.3c-1-0.3-2.1-0.7-3.1-1-1.2-0.4-2.4-0.7-3.5-1.1l-3-0.9c-0.2-0.1-0.4-0.1-0.7-0.2-1.1-0.3-2.3-0.7-3.4-1-1.2-0.3-2.4-0.6-3.5-0.9l-3.6-0.9-3.6-0.9c-1-0.3-2.1-0.5-3.1-0.7-1.2-0.3-2.4-0.5-3.6-0.8-1.3-0.3-2.5-0.6-3.8-0.8h-0.3c-0.9-0.2-1.9-0.4-2.8-0.6-0.4-0.1-0.7-0.1-1.1-0.2-1.1-0.2-2.2-0.4-3.4-0.6-1.2-0.2-2.4-0.4-3.6-0.7l-5.4-0.9c-0.9-0.1-1.9-0.3-2.8-0.4-0.8-0.1-1.6-0.3-2.5-0.4-2.6-0.4-5.1-0.7-7.7-1-1.2-0.1-2.3-0.3-3.5-0.4h-0.4c-0.9-0.1-1.8-0.2-2.8-0.3-1.1-0.1-2.1-0.2-3.2-0.3-1.7-0.2-3.4-0.3-5.1-0.4-0.8-0.1-1.5-0.1-2.3-0.2-0.9-0.1-1.9-0.1-2.8-0.2-0.4 0-0.8 0-1.2-0.1-1.1-0.1-2.1-0.1-3.2-0.2-0.5 0-1-0.1-1.5-0.1-1.3-0.1-2.6-0.1-3.9-0.1-0.8 0-1.5-0.1-2.3-0.1-1.2 0-2.4 0-3.5-0.1h-13.9c-2.3 0-4.6 0.1-6.9 0.2-0.9 0-1.9 0.1-2.8 0.1-0.8 0-1.5 0.1-2.3 0.1-1.4 0.1-2.8 0.2-4.1 0.3-1.4 0.1-2.7 0.2-4.1 0.3-1.4 0.1-2.7 0.2-4.1 0.4-0.6 0-1.2 0.1-1.8 0.2l-7.8 0.9c-1.1 0.1-2.1 0.3-3.2 0.4-1 0.1-2.1 0.3-3.1 0.4-3.2 0.5-6.4 0.9-9.5 1.5-0.7 0.1-1.4 0.2-2.1 0.4-0.9 0.1-1.7 0.3-2.6 0.5-1.1 0.2-2.3 0.4-3.4 0.6-0.9 0.2-1.7 0.3-2.6 0.5-0.4 0.1-0.8 0.1-1.1 0.2-0.7 0.1-1.4 0.3-2.1 0.4-1.2 0.3-2.4 0.5-3.6 0.8-1.2 0.3-2.4 0.5-3.6 0.8-0.2 0-0.4 0.1-0.6 0.1-0.5 0.1-1 0.2-1.5 0.4-1.1 0.3-2.3 0.6-3.5 0.9-1.3 0.3-2.5 0.6-3.8 1-0.4 0.1-0.9 0.2-1.4 0.4-1.3 0.4-2.7 0.7-4 1.1-1.5 0.4-3 0.9-4.6 1.3-1 0.3-2.1 0.6-3.1 1-2.1 0.6-4.1 1.3-6.2 2-0.7 0.2-1.4 0.5-2.1 0.7-15-27.5-27.4-56.4-37-86.2-11.7-36.1-19.2-73.6-22.5-111.6-0.6-6.7-1-13.3-1.3-20-0.1-1.2-0.1-2.4-0.1-3.6-0.1-1.2-0.1-2.4-0.1-3.6 0-1.2-0.1-2.4-0.1-3.6 0-1.2-0.1-2.4-0.1-3.7 18.8-14 39.2-25.8 61-35 36.1-15.3 74.5-23 114.1-23 39.6 0 78 7.8 114.1 23 21.8 9.2 42.2 20.9 61 35v0.1c0 1 0 1.9-0.1 2.9 0 1.4-0.1 2.8-0.1 4.3 0 0.7 0 1.3-0.1 2-0.1 1.8-0.1 3.5-0.2 5.3-0.3 6.7-0.8 13.3-1.3 20-3.3 38.5-11 76.5-23 113-9.7 30.3-22.3 59.4-37.6 87.1z m136.8 90.9a342.27 342.27 0 0 0-96.3-73.2c29.1-53.7 49.5-112.8 59.4-175.5 12.8 17.1 23.4 35.6 31.8 55.5 13.8 32.7 20.8 67.4 20.8 103.2 0 31-5.3 61.3-15.7 90z" fill="rgb(var(--dark-rgb))" />
                                <path d="M512 819.3c8.7 0 24.7 22.9 24.7 60.4s-16 60.4-24.7 60.4-24.7-22.9-24.7-60.4 16-60.4 24.7-60.4m0-20c-24.7 0-44.7 36-44.7 80.4 0 44.4 20 80.4 44.7 80.4s44.7-36 44.7-80.4c0-44.4-20-80.4-44.7-80.4z" fill="var(--primary-color)" />
                              </svg>
                            </div>
                            <div class="service-card-content">
                              <h3 class="service-card-title">
                                <a href="{{ route('service.detail', 'software-development') }}">
                                  Software Development
                                </a>
                              </h3>
                              <p class="service-card-description">
                                Custom business software and portal solutions designed for scalability and reliability, built around the way your team actually works.
                              </p>
                              <div class="service-card__btn">
                                <a class="btn-anim d-flex align-items-center text-gradient gap-1 btn-double-effect" href="{{ route('service.detail', 'software-development') }}">
                                  <span class="btn__text">
                                    Read More
                                  </span>
                                  <span class="btn__icon">
                                    <i class="ri-arrow-right-line">
                                    </i>
                                  </span>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-4">
                        <div class="service-card variant2 right-swipe">
                          <div class="service-card-sub">
                            <div class="service-card-icon">
                              <svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M393.3 768H392h1.3z" fill="#202020" />
                                <path d="M511.9 199.6C355.7 199.6 229 326.2 229 482.5c0 103.8 55.9 194.6 139.3 243.8v89.8c0 1.3 0 2.5 0.1 3.8 0.1 3.2 0.3 6.4 0.6 9.6 6.8 72.8 68.6 130.3 143.1 130.3 39.5 0 75.4-16.2 101.5-42.2 23-23 38.3-53.8 41.6-87.9 0.3-3.2 0.5-6.4 0.6-9.6 0-1.3 0.1-2.7 0.1-4v-90l0.6-0.3C739.4 676.5 795 586 795 482.5c-0.2-156.3-126.8-282.9-283.1-282.9zM391.9 768h1.3-1.3z m219.8 48.1c0 5.8-0.5 11.5-1.5 17-1.1 6.5-2.9 12.8-5.3 18.9-5 12.7-12.6 24.5-22.6 34.5-18.9 18.9-43.9 29.3-70.4 29.3-26.5 0-51.5-10.4-70.4-29.3-10-10-17.7-21.8-22.7-34.6-2.4-6.1-4.1-12.4-5.2-18.9-1-5.5-1.4-11.2-1.4-16.9v-8.8h199.4v8.8z m0-24.8H412.3v-47.7h199.4v47.7z m69.1-139.9c-7.8 7.8-15.9 14.9-24.5 21.4-13.7 10.4-28.4 19.3-44 26.5l-0.6 0.3v0.1H412.3c-15.4-7.1-29.9-15.7-43.4-25.8-9.1-6.8-17.7-14.3-25.9-22.5-22-22-39.2-47.5-51.2-75.9-12.5-29.4-18.8-60.7-18.8-93s6.3-63.5 18.8-93c12-28.4 29.3-54 51.2-76 22-22 47.5-39.2 76-51.2 29.4-12.4 60.7-18.7 93-18.7s63.6 6.3 93 18.7c28.4 12 54 29.3 76 51.2 22 22 39.2 47.5 51.2 76 12.4 29.4 18.8 60.7 18.8 93s-6.3 63.5-18.8 93c-12.2 28.4-29.4 53.9-51.4 75.9z" fill="rgb(var(--dark-rgb))" />
                                <path d="M391.9 768h1.3-1.3z" fill="#343535" />
                                <path d="M511.9 432.3c-39.7 0-72 32.3-72 72 0 37.3 28.6 68.1 65 71.7v123.7h14V576c36.4-3.5 65-34.3 65-71.7 0-39.7-32.3-72-72-72z m0 128c-30.9 0-56-25.1-56-56s25.1-56 56-56 56 25.1 56 56-25.1 56-56 56z" fill="var(--primary-color)" />
                                <path d="M512 103.6m-39.4 0a39.4 39.4 0 1 0 78.8 0 39.4 39.4 0 1 0-78.8 0Z" fill="var(--primary-color)" />
                                <path d="M244.2 214.5m-39.4 0a39.4 39.4 0 1 0 78.8 0 39.4 39.4 0 1 0-78.8 0Z" fill="var(--primary-color)" />
                                <path d="M133.3 482.2m-39.4 0a39.4 39.4 0 1 0 78.8 0 39.4 39.4 0 1 0-78.8 0Z" fill="var(--primary-color)" />
                                <path d="M890.7 482.2m-39.4 0a39.4 39.4 0 1 0 78.8 0 39.4 39.4 0 1 0-78.8 0Z" fill="var(--primary-color)" />
                                <path d="M779.8 214.5m-39.4 0a39.4 39.4 0 1 0 78.8 0 39.4 39.4 0 1 0-78.8 0Z" fill="var(--primary-color)" />
                              </svg>
                            </div>
                            <div class="service-card-content">
                              <h3 class="service-card-title">
                                <a href="{{ route('service.detail', 'ui-ux-design') }}">
                                  UI/UX Design
                                </a>
                              </h3>
                              <p class="service-card-description">
                                Deliver seamless and enjoyable digital experiences. Our designs prioritize clarity, ease of use, and attractive interfaces for both web and mobile platforms.
                              </p>
                              <div class="service-card__btn">
                                <a class="btn-anim d-flex align-items-center gap-1 text-gradient btn-double-effect" href="{{ route('service.detail', 'ui-ux-design') }}">
                                  <span class="btn__text">
                                    Read More
                                  </span>
                                  <span class="btn__icon">
                                    <i class="ri-arrow-right-line">
                                    </i>
                                  </span>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-4">
                        <div class="service-card variant2 right-swipe">
                          <div class="service-card-sub">
                            <div class="service-card-icon">
                              <svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M511.3 676.9m-10 0a10 10 0 1 0 20 0 10 10 0 1 0-20 0Z" fill="var(--primary-color)" />
                                <path d="M960 756V138.5H64V756h320.1v85.5H256.2v44h511.9v-44h-128V756H960zM108 182.5h808v427.1H108V182.5z m488.1 659h-168V756h168v85.5zM108 712v-82.5h808V712H108z" fill="rgb(var(--dark-rgb))" />
                                <path d="M167.536 327.703l90.72-90.721 14.143 14.142-90.721 90.72zM172.959 423.469l181.159-181.16 14.142 14.143L187.1 437.61z" fill="var(--primary-color)" />
                              </svg>
                            </div>
                            <div class="service-card-content">
                              <h3 class="service-card-title">
                                <a href="{{ route('service.detail', 'mobile-app-development') }}">
                                  Mobile App Development
                                </a>
                              </h3>
                              <p class="service-card-description">
                                Native and cross-platform app experiences with smooth performance and clean UX. We turn ideas into high-performing mobile apps tailored to your users’ needs.
                              </p>
                              <div class="service-card__btn">
                                <a class="btn-anim d-flex align-items-center gap-1 text-gradient btn-double-effect" href="{{ route('service.detail', 'mobile-app-development') }}">
                                  <span class="btn__text">
                                    Read More
                                  </span>
                                  <span class="btn__icon">
                                    <i class="ri-arrow-right-line">
                                    </i>
                                  </span>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-4">
                        <div class="service-card variant2 right-swipe">
                          <div class="service-card-sub">
                            <div class="service-card-icon">
                              <svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M960.1 258.4H245.8l-36.1-169H63.9v44h110.2l26.7 125 100.3 469.9 530 0.4v-44l-494.4-0.3-22.6-105.9H832l128.1-320.1z m-65 44L855.6 401H276.3l-21.1-98.6h639.9zM304.8 534.5L279.7 417h569.5l-47 117.5H304.8z" fill="rgb(var(--dark-rgb))" />
                                <path d="M375.6 810.6c28.7 0 52 23.3 52 52s-23.3 52-52 52-52-23.3-52-52 23.3-52 52-52m0-20c-39.7 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.3-72-72-72zM732 810.6c28.7 0 52 23.3 52 52s-23.3 52-52 52-52-23.3-52-52 23.3-52 52-52m0-20c-39.7 0-72 32.2-72 72s32.2 72 72 72c39.7 0 72-32.2 72-72s-32.3-72-72-72zM447.5 302.4h16v232.1h-16zM652 302.4h16v232.1h-16z" fill="var(--primary-color)" />
                                <path d="M276.3 401l3.4 16-3.4-16z" fill="#343535" />
                              </svg>
                            </div>
                            <div class="service-card-content">
                              <h3 class="service-card-title">
                                <a href="{{ route('service.detail', 'web-development') }}">
                                  Website Development
                                </a>
                              </h3>
                              <p class="service-card-description">
                                Modern, responsive, and conversion-focused websites tailored to your business goals — from marketing sites to complex web platforms and e-commerce stores.
                              </p>
                              <div class="service-card__btn">
                                <a class="btn-anim d-flex align-items-center gap-1 text-gradient btn-double-effect" href="{{ route('service.detail', 'web-development') }}">
                                  <span class="btn__text">
                                    Read More
                                  </span>
                                  <span class="btn__icon">
                                    <i class="ri-arrow-right-line">
                                    </i>
                                  </span>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-4">
                        <div class="service-card variant2 right-swipe">
                          <div class="service-card-sub">
                            <div class="service-card-icon">
                              <svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M844.1 211.4c-3.6-4-7.3-7.9-11-11.7-53.8-55.4-121.9-96.9-198.2-118.7-15.1-4.3-30.5-7.8-46.2-10.5-25-4.3-50.6-6.5-76.7-6.5-126 0-239.9 52-321.3 135.8-3.7 3.8-7.4 7.7-11 11.7C107.8 290.9 64 396.4 64 512s43.8 220.9 115.6 300.4c3.6 4 7.2 7.9 11 11.7 53.9 55.5 122.1 97.1 198.6 118.9 15.1 4.3 30.5 7.8 46.2 10.5 24.9 4.3 50.5 6.5 76.6 6.5s51.7-2.2 76.7-6.5c15.7-2.7 31.1-6.2 46.2-10.5 76.5-21.7 144.6-63.3 198.5-118.8 3.7-3.9 7.4-7.7 11-11.7C916.2 733 960 627.6 960 512c0-115.7-43.9-221.1-115.9-300.6z m71.8 308.8c-1 51.7-11.6 101.8-31.6 149.1-17.4 41.2-41.3 78.8-71.1 112-3.5 4-7.2 7.9-10.9 11.7-1.5 1.6-3.1 3.1-4.6 4.7-37.1 37.1-80.3 66.3-128.4 86.6-35.8 15.1-73.1 24.9-111.6 29.2-12.5 1.4-25 2.2-37.7 2.4-2.6 0.1-5.3 0.1-8 0.1s-5.3 0-8-0.1c-12.6-0.2-25.2-1-37.7-2.4-38.4-4.3-75.8-14.1-111.6-29.2-48.1-20.4-91.3-49.5-128.4-86.6-1.6-1.6-3.2-3.2-4.7-4.8-3.7-3.8-7.4-7.8-10.9-11.7-29.8-33.2-53.6-70.8-71-111.9-20-47.3-30.6-97.4-31.6-149.1h109.3c0-2.7-0.1-5.4-0.1-8.2 0-2.6 0-5.2 0.1-7.8H108.1c1-51.8 11.6-102 31.7-149.4 17.4-41.2 41.3-78.9 71.2-112.1 3.5-4 7.2-7.9 10.9-11.7 1.5-1.5 3-3.1 4.5-4.6 37.1-37.1 80.3-66.3 128.4-86.6 35.8-15.1 73.1-24.9 111.6-29.2 12.5-1.4 25-2.2 37.7-2.5 2.7-0.1 5.3-0.1 8-0.1s5.3 0 8 0.1c12.7 0.2 25.2 1.1 37.7 2.5 38.4 4.3 75.8 14.1 111.5 29.2 48.1 20.3 91.3 49.5 128.4 86.6 1.5 1.5 3 3 4.4 4.5 3.7 3.8 7.4 7.7 10.9 11.7 29.9 33.3 53.8 70.9 71.3 112.2 20 47.4 30.7 97.6 31.6 149.4H806.6c0 2.6 0.1 5.2 0.1 7.8 0 2.7 0 5.4-0.1 8.2h109.3z" fill="rgb(var(--dark-rgb))" />
                                <path d="M790.7 512c0 2.7 0 5.4-0.1 8.2H520v144.7c-2.7-0.1-5.4-0.1-8.1-0.1-2.6 0-5.3 0-7.9 0.1V520.2H233.4c-0.1-2.7-0.1-5.4-0.1-8.2 0-2.6 0-5.2 0.1-7.8H504V358.8c2.6 0 5.3 0.1 7.9 0.1 2.7 0 5.4 0 8.1-0.1v145.4h270.6c0 2.6 0.1 5.2 0.1 7.8zM520 111.1v231.6c-2.7 0.1-5.4 0.1-8.1 0.1-2.6 0-5.3 0-7.9-0.1V111.1c2.7-1.1 5.3-2.1 8-3.1 2.7 1 5.3 2.1 8 3.1zM512 916zM520 680.9v232c-2.7 1.1-5.3 2.1-8 3.1-2.7-1-5.3-2.1-8-3.1v-232c2.6-0.1 5.3-0.1 7.9-0.1 2.7 0 5.4 0 8.1 0.1z" fill="rgb(var(--dark-rgb))" />
                                <path d="M512 916zM512 916zM748.7 732.5c35.6-62.9 56.5-135.2 57.8-212.3 0-2.7 0.1-5.4 0.1-8.2 0-2.6 0-5.2-0.1-7.8-1.3-77.3-22.2-149.9-58-212.9 23-14.3 44.5-30.6 64.4-48.7-3.6-4-7.2-7.9-10.9-11.7-19.2 17.5-39.8 33.1-61.7 46.7-43.9-71.4-107.3-129.5-182.8-167-12.5-1.4-25-2.2-37.7-2.5-2.7-0.1-5.3-0.1-8-0.1 2.7 1 5.3 2.1 8 3.1 2.3 0.9 4.5 1.9 6.8 2.8 51.4 21.8 97.6 52.9 137.3 92.6 24.1 24.1 45 50.6 62.7 79.2-15 8.6-30.6 16.4-46.7 23.2-50.8 21.5-104.6 32.9-160 33.9-2.7 0.1-5.4 0.1-8.1 0.1-2.6 0-5.3 0-7.9-0.1-55.5-1-109.4-12.4-160.3-33.9-16-6.8-31.6-14.5-46.6-23.1 17.6-28.6 38.6-55.2 62.7-79.3 39.7-39.7 85.9-70.8 137.3-92.6 2.3-0.9 4.5-1.9 6.8-2.8 2.7-1.1 5.3-2.1 8-3.1-2.7 0-5.3 0-8 0.1-12.7 0.2-25.2 1.1-37.7 2.5-75.5 37.5-138.9 95.6-182.8 167.1-21.9-13.6-42.5-29.2-61.7-46.7-3.7 3.8-7.4 7.8-10.9 11.7 19.9 18.1 41.5 34.4 64.5 48.7-35.7 63-56.6 135.5-57.9 212.8 0 2.6-0.1 5.2-0.1 7.8 0 2.7 0 5.4 0.1 8.2 1.4 77 22.2 149.3 57.8 212.2-23 14.3-44.6 30.7-64.5 48.8 3.5 4 7.2 7.9 10.9 11.7 19.2-17.5 39.8-33.1 61.7-46.8 43.9 71.6 107.4 129.8 183 167.4 12.5 1.4 25 2.2 37.7 2.4 2.7 0.1 5.3 0.1 8 0.1-2.7-1-5.3-2.1-8-3.1-2.3-0.9-4.5-1.9-6.8-2.8-51.4-21.8-97.6-52.9-137.3-92.6-24.2-24.2-45.2-50.8-62.8-79.5 15-8.6 30.6-16.4 46.7-23.2 50.8-21.5 104.7-32.9 160.3-33.9 2.6-0.1 5.3-0.1 7.9-0.1 2.7 0 5.4 0 8.1 0.1 55.5 1 109.3 12.4 160 33.9 16.2 6.8 31.8 14.6 46.9 23.3-17.6 28.7-38.6 55.3-62.8 79.5-39.7 39.7-85.9 70.8-137.3 92.6-2.3 1-4.5 1.9-6.8 2.8-2.7 1.1-5.3 2.1-8 3.1 2.7 0 5.3 0 8-0.1 12.7-0.2 25.2-1 37.7-2.4 75.6-37.5 139-95.7 182.9-167.3 21.8 13.6 42.5 29.3 61.7 46.8 3.7-3.8 7.3-7.7 10.9-11.7-19.9-18.3-41.5-34.6-64.5-48.9zM520 664.9c-2.7-0.1-5.4-0.1-8.1-0.1-2.6 0-5.3 0-7.9 0.1-78.2 1.4-151.5 22.8-215.1 59.3-8-14.2-15.2-28.9-21.6-44-21.5-50.8-32.9-104.5-33.9-160-0.1-2.7-0.1-5.4-0.1-8.2 0-2.6 0-5.2 0.1-7.8 1-55.6 12.4-109.5 33.9-160.3 6.4-15.2 13.7-30 21.8-44.3 63.5 36.5 136.8 57.9 214.9 59.2 2.6 0 5.3 0.1 7.9 0.1 2.7 0 5.4 0 8.1-0.1 78.1-1.4 151.4-22.8 214.9-59.3 8.1 14.3 15.4 29.1 21.8 44.4 21.5 50.9 32.9 104.8 33.9 160.3 0 2.6 0.1 5.2 0.1 7.8 0 2.7 0 5.4-0.1 8.2-1 55.4-12.4 109.2-33.9 160-6.4 15.2-13.6 29.9-21.7 44.1-63.5-36.6-136.8-58-215-59.4z" fill="var(--primary-color)" />
                              </svg>
                            </div>
                            <div class="service-card-content">
                              <h3 class="service-card-title">
                                <a href="{{ route('service.detail', 'seo-marketing') }}">
                                  SEO & Marketing
                                </a>
                              </h3>
                              <p class="service-card-description">
                                Search visibility, content strategy, and growth campaigns that drive quality traffic and turn visitors into customers.
                              </p>
                              <div class="service-card__btn">
                                <a class="btn-anim d-flex align-items-center gap-1 text-gradient btn-double-effect" href="{{ route('service.detail', 'seo-marketing') }}">
                                  <span class="btn__text">
                                    Read More
                                  </span>
                                  <span class="btn__icon">
                                    <i class="ri-arrow-right-line">
                                    </i>
                                  </span>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-4">
                        <div class="service-card variant2 right-swipe">
                          <div class="service-card-sub">
                            <div class="service-card-icon">
                              <svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M828.5 180.1h-9.9v-54.7h23.5v-44H182v44h23v54.7h-9.5C123.2 180.1 64 239.2 64 311.5v0.1c0 72.3 59.2 131.5 131.5 131.5h9.6c0 1.3 0.1 2.5 0.1 3.7 0.5 17.7 2.7 35.4 6.2 52.5 17.8 85.7 71.8 160 148.3 204 4.8 2.8 9.8 5.4 14.7 7.9 15.3 7.7 31.2 14.1 47.4 19.2 3.4 1 6.8 2 10.2 2.9v165.2H250.4v44h511.9v-44H591.9V733.4c3.7-1 7.3-2.1 10.9-3.2 16.2-5.1 32.2-11.6 47.4-19.4 5-2.5 10-5.3 14.8-8.1 75.6-43.9 129.2-117.8 147-202.7 3.6-17.2 5.8-34.9 6.3-52.4 0.1-1.5 0.1-3 0.1-4.5h10c72.3 0 131.5-59.2 131.5-131.5v-0.1c0.1-72.3-59.1-131.4-131.4-131.4zM205 399.2h-9.5c-23.2 0-45.1-9.1-61.7-25.7s-25.7-38.5-25.7-61.7v-0.1c0-23.2 9.1-45.2 25.7-61.7 16.6-16.6 38.5-25.7 61.7-25.7h9.5v174.9z m370.9 499.4h-128V737.3c20.9 4.5 42.3 6.8 63.9 6.8 21.7 0 43.1-2.3 64.1-6.8v161.3z m198.7-461.4c0 2.9 0 5.9-0.2 8.9-0.5 15-2.3 30.1-5.4 44.9-15.3 72.7-61.2 136-126.1 173.7-4.1 2.4-8.4 4.7-12.7 6.9-13 6.6-26.7 12.2-40.6 16.6-25.2 7.9-51.4 11.9-77.9 11.9-26.2 0-52.2-3.9-77.1-11.6-13.9-4.3-27.5-9.8-40.6-16.4-4.2-2.1-8.5-4.4-12.6-6.8-65.4-37.8-111.7-101.5-126.9-174.8-3.1-14.7-4.9-29.8-5.3-45-0.1-2.7-0.1-5.5-0.1-8.2v-312h525.6v311.9zM916 311.7c0 23.2-9.1 45.2-25.7 61.7-16.6 16.6-38.5 25.7-61.7 25.7h-9.9v-175h9.9c23.2 0 45.1 9.1 61.7 25.7s25.7 38.5 25.7 61.7v0.2z" fill="rgb(var(--dark-rgb))" />
                                <path d="M317.428 274.917l70.145-70.144 14.142 14.142-70.145 70.144zM316.055 351.98L456.13 211.904l14.142 14.142-140.076 140.076zM555.4 659.6l-4.8-19.4c0.3-0.1 26.5-6.8 55.4-23.5 37.8-21.9 62-49.7 72-82.7l19.1 5.8c-11.4 37.6-39.6 70.3-81.6 94.5-31.2 18-58.9 25-60.1 25.3z" fill="var(--primary-color)" />
                              </svg>
                            </div>
                            <div class="service-card-content">
                              <h3 class="service-card-title">
                                <a href="{{ route('service.detail', 'ai-ml') }}">
                                  AI/ML
                                </a>
                              </h3>
                              <p class="service-card-description">
                                We build intelligent features — from automation and predictive models to AI-powered integrations — that give your product a competitive edge.
                              </p>
                              <div class="service-card__btn">
                                <a class="btn-anim d-flex align-items-center gap-1 text-gradient btn-double-effect" href="{{ route('service.detail', 'ai-ml') }}">
                                  <span class="btn__text">
                                    Read More
                                  </span>
                                  <span class="btn__icon">
                                    <i class="ri-arrow-right-line">
                                    </i>
                                  </span>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="text-center">
                      <a class="btn btn-primary-gradient landing-custom-button me-3 mb-0 mt-2" href="{{ route('service') }}" style="overflow: hidden;">
                        See All Services
                        <i class="ri-arrow-right-line">
                        </i>
                      </a>
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
                              <a href="services-01.html" class="btn btn-black-bg landing-custom-button btn-anim">
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
              <section class="section">
                <div class="container">
                  <div class="d-flex flex-wrap gap-2 mb-5 align-items-center justify-content-between">
                    <div class="heading-section mb-0 text-start">
                      <span class="heading-subtitle rounded-pill wow fadeInUp" data-wow-delay=".3s">
                        <i class="ri-circle-fill">
                        </i>
                        Our Portfolio
                      </span>
                      <h2 class="heading-title mt-4 text-animated-slider">
                        Building Digital Products
                        <br>
                        That Drive Results
                      </h2>
                    </div>
                    <div class="wow fadeInUp mb-3 mb-sm-0" data-wow-delay=".6s">
                      <div class="slider-navigation" data-wow-delay=".7s">
                        <div class="slider-prev">
                          <span>
                            <i class="ri-arrow-left-s-line">
                            </i>
                          </span>
                        </div>
                        <div class="slider-next">
                          <span>
                            <i class="ri-arrow-right-s-line">
                            </i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper portpolio04-swiper">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="project-card01 mb-50">
                          <a href="portfolio-details.html" class="project-card01__media rounded-24">
                            <div class="project-card01__thumb">
                              <img class="project-card01__img" src="{{ asset('FrontendAssets/images/projects/18.png')}}" alt="">
                            </div>
                          </a>
                          <div class="project-card01__content01">
                            <span class="project-card01__meta mb-2">
                              <span class="date">
                                14 Feb, 2026
                              </span>
                              SaaS Platform
                            </span>
                            <h3 class="project-card01__title">
                              <a class="link-underline-dark" href="portfolio-details.html">
                                Scaling a SaaS Platform for Growth
                              </a>
                            </h3>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="project-card01 mb-50">
                          <a href="portfolio-details.html" class="project-card01__media rounded-24">
                            <div class="project-card01__thumb">
                              <img class="project-card01__img" src="{{ asset('FrontendAssets/images/projects/19.png')}}" alt="">
                            </div>
                          </a>
                          <div class="project-card01__content01">
                            <span class="project-card01__meta mb-2">
                              <span class="date">
                                05 Jan, 2026
                              </span>
                              Mobile App
                            </span>
                            <h3 class="project-card01__title">
                              <a class="link-underline-dark" href="portfolio-details.html">
                                Mobile App Redesign & Launch
                              </a>
                            </h3>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="project-card01 mb-50">
                          <a href="portfolio-details.html" class="project-card01__media rounded-24">
                            <div class="project-card01__thumb">
                              <img class="project-card01__img" src="{{ asset('FrontendAssets/images/projects/20.png')}}" alt="">
                            </div>
                          </a>
                          <div class="project-card01__content01">
                            <span class="project-card01__meta">
                              <span class="date">
                                12 July, 2026
                              </span>
                              E-Commerce
                            </span>
                            <h3 class="project-card01__title mt-2">
                              <a class="link-underline-dark" href="portfolio-details.html">
                                E-Commerce Platform Development
                              </a>
                            </h3>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="project-card01 mb-50">
                          <a href="portfolio-details.html" class="project-card01__media rounded-24">
                            <div class="project-card01__thumb">
                              <img class="project-card01__img" src="{{ asset('FrontendAssets/images/projects/21.png')}}" alt="">
                            </div>
                          </a>
                          <div class="project-card01__content01">
                            <span class="project-card01__meta">
                              <span class="date">
                                23 Aug, 2026
                              </span>
                              Enterprise Software
                            </span>
                            <h3 class="project-card01__title mt-2">
                              <a class="link-underline-dark" href="portfolio-details.html">
                                Modernizing a Legacy Enterprise System
                              </a>
                            </h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>




                  <section class="section proccess-section">
                  <div class="container position-relative">
                    <div class="row justify-content-center">
                      <div class="col-xl-6">
                        <div class="heading-section text-center">
                          <span class="heading-subtitle justify-content-center rounded-pill text-gradient-1">
                            // Our Approach
                          </span>
                          <h2 class="heading-title mb-4 text-animated-slider">
                            How We Deliver IT Solutions
                          </h2>
                          <p class="op-7">
                            From initial concept to final launch, we manage every project with precision, ensuring each solution delivers meaningful results and real impact.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="workflow-steps">
                        <div class="workflow-line-art">
                          <img src="{{ asset('FrontendAssets/images/shapes/61.png')}}" class="img-fluid" alt="Decorative line">
                        </div>
                        <article class="workflow-step">
                          <div class="workflow-step__badge">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 53 53" id="partnership">
                              <path d="M8.75 29.17a1 1 0 0 0 .7.32 1 1 0 0 0 .68-.27l.27-.25 2.75 2.93a2.9 2.9 0 0 0 .14 3.92 2.84 2.84 0 0 0 1.86.83 2.9 2.9 0 0 0 .85 1.86 2.86 2.86 0 0 0 1.86.83 2.9 2.9 0 0 0 .83 1.86 2.86 2.86 0 0 0 1.86.83 2.9 2.9 0 0 0 4.94 1.86l.35-.35.33.34a2.93 2.93 0 0 0 4.15 0 2.88 2.88 0 0 0 .85-1.88 2.9 2.9 0 0 0 1.9-.85 2.86 2.86 0 0 0 .84-1.89 2.93 2.93 0 0 0 1.9-.84 3 3 0 0 0 .84-1.9 2.91 2.91 0 0 0 2.75-2.92 2.9 2.9 0 0 0-.51-1.6l2.93-2.84.32.37a1 1 0 0 0 .75.34 1 1 0 0 0 .66-.25l6.61-5.81a1 1 0 0 0 .09-1.41L38.17 8.6a1 1 0 0 0-1.42-.09l-6.6 5.8a1 1 0 0 0-.34.69 1 1 0 0 0 .25.72l.52.6h-.38a11.62 11.62 0 0 0-5.39 2.13L23.35 17l.23-.21a1 1 0 0 0 .06-1.42l-6-6.44a1 1 0 0 0-.64-.34 1 1 0 0 0-.72.26L2.82 21.31a1 1 0 0 0 0 1.41Zm6 4 1.38-1.38a.9.9 0 0 1 1.54.63.9.9 0 0 1-.26.64L16 34.41a.9.9 0 0 1-1.27 0 .91.91 0 0 1 .01-1.28Zm2.42 3.33a.91.91 0 0 1 .27-.64l1.38-1.38a.89.89 0 0 1 1.28 0 .88.88 0 0 1 .26.63.9.9 0 0 1-.26.64l-1.4 1.35a.91.91 0 0 1-1.54-.64Zm2.69 2.69a.91.91 0 0 1 .27-.64l1.38-1.38a.89.89 0 0 1 1.28 0 .88.88 0 0 1 .26.63.9.9 0 0 1-.26.64l-1.39 1.39a.9.9 0 0 1-1.27 0 .91.91 0 0 1-.28-.68Zm3 3.33a.89.89 0 0 1 0-1.28l1.38-1.38a.89.89 0 0 1 1.28 0 .91.91 0 0 1 0 1.27l-.33.33-1.06 1.06a.9.9 0 0 1-1.32-.04Zm14.46-31.85 10.77 12.25L43 27.41 32.22 15.16Zm-6.88 7.68 1.33-.16a.9.9 0 0 0 .28-.08h.08l8.36 9.52-3 2.88-8.12-8.54a1 1 0 0 0-1.25-.16L26 23.16a4.86 4.86 0 0 1-4.42.36l4.19-3.25a9.55 9.55 0 0 1 4.67-1.92ZM23.2 19.7l-3.08 2.39a1.82 1.82 0 0 0-.71 1.65 1.85 1.85 0 0 0 1 1.48 6.9 6.9 0 0 0 6.59-.37l1.51-.94 8.25 8.68.33.33a.9.9 0 0 1 .27.66.91.91 0 0 1-.27.66.94.94 0 0 1-1.32 0 1 1 0 0 0-1.42 1.41.93.93 0 0 1-1.28 1.35 1 1 0 0 0-1.42 1.42.93.93 0 0 1 0 1.32 1 1 0 0 1-1.33 0 1 1 0 0 0-1.41 1.41.94.94 0 0 1-1.32 1.33l-.38-.38a2.89 2.89 0 0 0-.34-3.69 2.91 2.91 0 0 0-1.87-.84 2.87 2.87 0 0 0-2.7-2.69 2.79 2.79 0 0 0-2.68-2.66 2.89 2.89 0 0 0-.84-1.89 3 3 0 0 0-4.1 0l-.14.14-2.64-2.86 10-9.27ZM16.87 11l4.62 5L9.8 26.83l-.25.24-4.63-5Z">
                              </path>
                            </svg>
                          </div>
                          <div class="workflow-step__body">
                            <h3 class="workflow-step__title">
                              Business Analysis
                            </h3>
                            <p class="workflow-step__text">
                              We analyze business goals, user needs, and technical requirements to build a strong solution.
                            </p>
                          </div>
                        </article>
                        <article class="workflow-step">
                          <div class="workflow-step__badge">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 53 53" id="analytics1">
                              <path d="M47.57 7.68H29.14V4.07a1 1 0 0 0-1-1h-3.28a1 1 0 0 0-1 1v3.61H5.43a2.93 2.93 0 0 0 0 5.86h.48v22.62H4.57a1 1 0 0 0 0 2h19.29v9.77h-3.32a1 1 0 0 0 0 2h11.92a1 1 0 0 0 0-2h-3.32v-9.77h19.29a1 1 0 1 0 0-2h-1.34V13.54h.48a2.93 2.93 0 0 0 0-5.86ZM25.86 5.07h1.28v2.61h-1.28Zm1.28 42.86h-1.28v-9.77h1.28Zm18-11.77H7.91V13.54h37.18Zm2.48-24.62H5.43a.93.93 0 0 1 0-1.86h42.14a.93.93 0 0 1 0 1.86Z">
                              </path>
                              <path d="M17.64 34.32h20.24a1 1 0 0 0 0-2H18.64V17.09a1 1 0 0 0-2 0v16.23a1 1 0 0 0 1 1Z">
                              </path>
                              <path d="M20.84 23.65a25.17 25.17 0 0 1 7.61 1.2 26.41 26.41 0 0 1-7.8 2.78 1 1 0 0 0 .18 2h.19a27.79 27.79 0 0 0 9.75-3.83 19 19 0 0 1 3.92 2.45h-1.32a1 1 0 0 0 0 2h3.85a1 1 0 0 0 .75-.33 1 1 0 0 0 .25-.79l-.46-3.79a1 1 0 1 0-2 .24l.13 1.08a20.37 20.37 0 0 0-3.31-2.19 17.75 17.75 0 0 0 3.29-3.5l.13 1.12a1 1 0 0 0 1 .91h.11a1 1 0 0 0 .89-1.1l-.46-4.22a.85.85 0 0 0-.11-.34.59.59 0 0 1 0-.08l-.06-.09a1.36 1.36 0 0 0-.17-.17h-.06a.89.89 0 0 0-.29-.15h-.08a1.33 1.33 0 0 0-.28 0h-.16l-4.13.87a1 1 0 0 0 .41 2l2-.43a15.9 15.9 0 0 1-4.1 4.33 26.82 26.82 0 0 0-9.72-1.85 1 1 0 0 0 0 2zm-7.62-4.36h1.24a1 1 0 0 0 0-2h-1.24a1 1 0 1 0 0 2zm0 4.37h1.24a1 1 0 1 0 0-2h-1.24a1 1 0 0 0 0 2zm0 4.34h1.24a1 1 0 0 0 0-2h-1.24a1 1 0 1 0 0 2zm0 4.42h1.24a1 1 0 0 0 0-2h-1.24a1 1 0 1 0 0 2z">
                              </path>
                            </svg>
                          </div>
                          <div class="workflow-step__body">
                            <h3 class="workflow-step__title">
                              System Design
                            </h3>
                            <p class="workflow-step__text">
                              Our team designs scalable system architectures and intuitive interfaces to ensure performance.
                            </p>
                          </div>
                        </article>
                        <article class="workflow-step">
                          <div class="workflow-step__badge">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 53 53" id="protection">
                              <path d="M47 8.57C34.27 9 27.24 2.82 27.17 2.76a1 1 0 0 0-1.34 0C25.76 2.82 18.75 9 6 8.57a1 1 0 0 0-1 .81c-.07.34-6.18 33.89 21.26 41.09a1.06 1.06 0 0 0 .5 0C54.19 43.27 48.08 9.72 48 9.38a1 1 0 0 0-1-.81ZM26.5 48.46C3.17 42.15 6 15.73 6.81 10.59c11 .11 17.63-4.24 19.69-5.8 2.06 1.56 8.76 5.92 19.68 5.8.72 5.05 3.36 31.63-19.68 37.87Z">
                              </path>
                              <path d="M43.72 12.37A34.67 34.67 0 0 1 27 7.36a1 1 0 0 0-1.06 0 34.67 34.67 0 0 1-16.69 5 1 1 0 0 0-.95.9c-.76 8.14-.56 27.67 17.88 33.21a1.07 1.07 0 0 0 .58 0C45.2 40.93 45.4 21.4 44.64 13.26a1 1 0 0 0-.92-.89ZM26.5 44.47c-16.14-5-16.86-22.13-16.25-30.16A36.7 36.7 0 0 0 26.5 9.38a36.57 36.57 0 0 0 16.25 4.93c.61 8.03-.11 25.12-16.25 30.16Z">
                              </path>
                              <path d="m31.62 22.41-7.44 7.43-2.8-2.84A1 1 0 0 0 20 27a1 1 0 0 0 0 1.42l3.5 3.5a1 1 0 0 0 .71.29 1 1 0 0 0 .71-.29l8.08-8.1a1 1 0 0 0 0-1.41 1 1 0 0 0-1.38 0Z">
                              </path>
                            </svg>
                          </div>
                          <div class="workflow-step__body">
                            <h3 class="workflow-step__title">
                              Testing & Validation
                            </h3>
                            <p class="workflow-step__text">
                              We perform rigorous testing across functionality, performance, and security to deliver reliable.
                            </p>
                          </div>
                        </article>
                        <article class="workflow-step">
                          <div class="workflow-step__badge">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 53 53" id="analytics">
                              <path d="M49.5 44.74h-3.12v-27a1 1 0 0 0-1-1h-6.05a1 1 0 0 0-1 1v27H34V23.3a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v21.44h-4.3V30.86a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v13.88h-3.29V11.07a1 1 0 0 0-2 0v34.67a1 1 0 0 0 1 1H49.39a1 1 0 0 0 0-2zm-9.17-26h4.05v26h-4.05zM28 24.3h4v20.44h-4zm-12.35 7.56h4v12.88h-4zM3.5 14.89h1.8a1 1 0 1 0 0-2H3.5a1 1 0 0 0 0 2zm0 5.99h1.8a1 1 0 1 0 0-2H3.5a1 1 0 0 0 0 2zm0 5.98h1.8a1 1 0 1 0 0-2H3.5a1 1 0 0 0 0 2zm0 5.99h1.8a1 1 0 0 0 0-2H3.5a1 1 0 0 0 0 2zm0 5.99h1.8a1 1 0 0 0 0-2H3.5a1 1 0 0 0 0 2zm0 5.99h1.8a1 1 0 0 0 0-2H3.5a1 1 0 0 0 0 2z">
                              </path>
                              <path d="M15.12 21.88a1 1 0 0 0-.79 1.18 1 1 0 0 0 1 .81h.19c.63-.13 14.58-3 24.32-13.52l-.07.93a1 1 0 0 0 .93 1.06h.07a1 1 0 0 0 1-.94L42 7.31a1 1 0 0 0-1.16-1.06l-4 .66a1 1 0 1 0 .32 2l1.44-.23C29.31 19 15.27 21.86 15.12 21.88Z">
                              </path>
                            </svg>
                          </div>
                          <div class="workflow-step__body">
                            <h3 class="workflow-step__title">
                              Delivery & Growth
                            </h3>
                            <p class="workflow-step__text">
                              We deploy, monitor, and continuously optimize your solution to ensure high performance, scalability.
                            </p>
                          </div>
                        </article>
                      </div>
                    </div>
                  </div>
                </section>

 <section class="section section-devider">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-xl-5">
                      <div class="heading-section mb-5 pb-4 text-center">
                        <span class="heading-subtitle rounded-pill wow fadeInUp" data-wow-delay=".3s">
                          Testimonials
                        </span>
                        <h2 class="heading-title mt-4 text-animated-slider">
                          What Our Partners Say About Us!
                        </h2>
                      </div>
                    </div>
                  </div>
                  <div class="swiper freelancer-testimonials-slider">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="testimonial-card">
                          <div class="testimonial-content">
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
                          <div class="testimonial-content">
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
                          <div class="testimonial-content">
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
                          <div class="testimonial-content">
                            <span class="testimonial-rating">
                              “Game Changer!”
                            </span>
                            <p class="testimonial-text">
                              Working with Deveon boosted our conversion rates tremendously. Their understanding of both engineering and growth is phenomenal.
                            </p>
                          </div>
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
                    <div class="row mb-5 justify-content-between">
                      <div class="col-xl-5">
                        <div class="heading-section mb-0 text-start">
                          <span class="heading-subtitle justify-content-start rounded-pill wow fadeInUp" data-wow-delay=".3s">
                            <svg fill="var(--primary-color)" width="18" height="22" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                              <path d="M20.093 18.177c0 2.26-1.833 4.093-4.093 4.093s-4.093-1.833-4.093-4.093c0-5.459 8.187-5.459 8.187 0zM16 2.473c7.145 0.057 15.271 5.095 16 14.589h-9.677c0 0-1.244-5.245-6.323-5.208-5.079 0.031-6.323 5.208-6.323 5.208h-9.677c0.469-9.328 8.459-14.647 16-14.589zM16.068 29.527c-5.328 0.015-10.308-4.005-12.349-10.235h5.959c0 0 1.281 5.187 6.359 5.151 5.084-0.031 6.292-5.151 6.292-5.151h5.953c-1.328 6.588-6.885 10.219-12.213 10.235z"/>
                            </svg>
                            Our Blog & News
                          </span>
                          <h2 class="heading-title split-title">
                            Explore Blog & Insights from Deveon Inc
                          </h2>
                        </div>
                      </div>
                      <div class="col-xl-5 my-auto">
                        <p class="mb-0">
                          At Deveon Inc, we share insights on software development, mobile apps, design, and digital growth to help businesses build smarter products.
                        </p>
                      </div>
                    </div>
                    <div class="row gy-4">
                      @forelse($latestBlogs as $blog)
                      <div class="col-xl-4 col-md-6">
                        <div class="post-card post-card-overlay wow fadeInUp" data-wow-delay=".4s">
                          <div class="post-media clip-anim">
                            <a href="{{ route('blog.detail', $blog->slug) }}">
                              <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('FrontendAssets/images/blog/blog1.png') }}" alt="{{ $blog->title }}" class="anim-img" data-animate="true">
                            </a>
                          </div>
                          <div class="post-overlay-content">
                            <div class="post-meta">
                              <span class="post-category">
                                <a href="{{ route('blog', ['category' => $blog->category]) }}">
                                  {{ $blog->category ?: 'News' }}
                                </a>
                              </span>
                            </div>
                            <h3 class="post-title mb-3">
                              <a href="{{ route('blog.detail', $blog->slug) }}">
                                {{ $blog->title }}
                              </a>
                            </h3>
                            <span class="posted-on">
                              <time class="entry-date published ps-0 updated" datetime="{{ optional($blog->created_at)->toDateString() }}">
                                {{ optional($blog->created_at)->format('F d, Y') }}
                              </time>
                            </span>
                          </div>
                        </div>
                      </div>
                      @empty
                        <div class="col-12 text-center"><p>No blog posts are available yet.</p></div>
                      @endforelse
                    </div>
                    @if($latestBlogs->isNotEmpty())
                    <div class="text-center mt-5">
                      <a class="header-button d-inline-flex" href="{{ route('blog') }}">
                        <span>View All Blogs</span>
                        <span class="resume-icon"><i class="ri-arrow-right-line"></i></span>
                      </a>
                    </div>
                    @endif
                  </div>
                </section>


@endsection

@section('script')

@endsection
