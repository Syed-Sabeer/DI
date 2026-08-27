@extends('layouts.frontend.master')




@section('css')
<style>
    .founder-section .founder-photo-card {
        position: relative;
        max-width: 460px;
    }

    .founder-photo-frame {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid var(--border);
        box-shadow: 0 30px 60px -25px rgba(var(--dark-rgb), 0.25);
    }

    .founder-photo-frame img.founder-photo {
        width: 100%;
        aspect-ratio: 4/5;
        object-fit: cover;
        display: block;
    }

    .founder-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        min-width: 92px;
        padding: 14px 16px;
        border-radius: 16px;
        background: var(--custom-white);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.18);
    }

    .founder-badge__number-wrap {
        display: flex;
        align-items: baseline;
        gap: 2px;
        font-size: 1.9rem;
        font-weight: 700;
        line-height: 1;
        color: var(--primary-color);
    }

    .founder-badge__label {
        margin-top: 4px;
        font-size: 0.8rem;
        font-weight: 500;
        color: rgb(var(--dark-rgb));
        opacity: 0.7;
    }

    .founder-social {
        display: flex;
        gap: 12px;
        list-style: none;
        margin: 22px 0 0;
        padding: 0;
    }

    .founder-social a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 1px solid var(--border);
        color: rgb(var(--dark-rgb));
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .founder-social a:hover {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: #010103;
    }

    .founder-quote {
        position: relative;
        background: var(--gray-100);
        border-inline-start: 3px solid var(--primary-color);
        border-radius: 12px;
        padding: 22px 26px;
        margin-bottom: 22px;
    }

    .founder-quote p {
        margin: 0;
        font-size: 1.15rem;
        font-weight: 500;
        line-height: 1.6;
        color: rgb(var(--dark-rgb));
    }

    .founder-bio p {
        color: rgb(var(--dark-rgb));
    }

    .founder-stat {
        display: flex;
        align-items: center;
        gap: 14px;
        height: 100%;
        padding: 18px 20px;
        border-radius: 14px;
        border: 1px solid var(--border);
        background: var(--gray-100);
    }

    .founder-stat i {
        flex-shrink: 0;
        font-size: 1.6rem;
        color: var(--primary-color);
    }

    .founder-stat h3 {
        margin: 0;
        font-size: 1.3rem;
        font-weight: 700;
        color: rgb(var(--dark-rgb));
    }

    .founder-stat p {
        margin: 0;
        font-size: 0.85rem;
        opacity: 0.7;
    }

    .founder-signature {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-top: 28px;
        padding-top: 22px;
        border-top: 1px solid var(--border);
    }

    .founder-signature h4 {
        margin: 0 0 2px;
        font-weight: 700;
        color: rgb(var(--dark-rgb));
    }

    .founder-signature span {
        font-size: 0.9rem;
        opacity: 0.7;
    }

    @media (max-width: 575px) {
        .founder-badge {
            top: 14px;
            right: 14px;
            padding: 10px 14px;
        }

        .founder-badge__number-wrap {
            font-size: 1.4rem;
        }
    }

    /*
        --primary-color is a bright lime green that has very low contrast on
        white/light backgrounds (it only "pops" against dark ones). Rather than
        changing the color itself, give it a soft dark edge so it reads clearly
        on light backgrounds too, the way the dark backdrop does for it elsewhere.
    */
    [data-theme-mode="light"] .heading-title .text-primary,
    [data-theme-mode="light"] .founder-badge__number-wrap,
    [data-theme-mode="light"] .founder-stat i {
        text-shadow: 0 0 1px rgba(17, 17, 17, 0.45), 0 1px 3px rgba(17, 17, 17, 0.3);
    }
</style>
@endsection

@section('content')


<div class="section-spacer"></div> <!-- Hero -->
                        <section class="hero pages-banner overflow-hidden">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="hero-banner-content text-center">
                                            <h1 class="hero__title text-dark text-center text-animated-slider"> About Us </h1>
                                            <div class="glow-border-container">
                                                <ul class="pagebreadcrumb-list">
                                                    <li class="pagebreadcrumb-item"> <a href="javascript:void(0);">Pages</a> </li>
                                                    <li> <i class="ri-expand-horizontal-s-fill"></i> </li>
                                                    <li class="active"> About Us </li>
                                                </ul>
                                                <div class="glow-border-card">
                                                    <div class="glow-border-inner"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-image-shape"> <img src="{{ asset('FrontendAssets/images/shapes/33.png')}}" alt="" class="banner-light"> <img src="{{ asset('FrontendAssets/images/shapes/7.png')}}" alt="" class="banner-dark d-none"> </div>
                        </section> <!-- /Hero -->
                        <div class="section aboutme-section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="chooseus-side-image-container"> <img src="{{ asset('FrontendAssets/images/shapes/45.png')}}" alt="" class="img-fluid"> <a href="javascript:void(0);" class="choose-play-btn"><i class="ri-play-mini-fill"></i></a> </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="heading-section text-start"> <span class="heading-subtitle rounded-pill border px-3 py-2 d-inline-flex wow fadeInUp mt-4 mt-sm-0" data-wow-delay=".3s"> About Our Agency </span>
                                            <h2 class="heading-title mt-4 text-animated-slider custom-about-title"> Highly Tailored <span class="text-primary">IT Solutions</span> Design Management &Services </h2>
                                            <p> when an unknown printer took a galley of type and scrambled it to make a type specimen has survived not only five centuries, but also the leap into electronic areayt typesetting emaining essentially. </p>
                                        </div>
                                        <div class="profile-content gap-0">
                                            <div class="counter-box">
                                                <div class="profile-experince-number"> <span class="odometer metricCard__number mb-2" data-count="15"></span> <span class="suffix">+</span> </div>
                                                <p class="profile-experince-label">years of experience</p>
                                            </div>
                                            <div>
                                                <ul class="about-feature-list">
                                                    <li class="feature-list-item"> <span> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                                <path d="M19.9428 7.33556C20.2803 8.59518 19.0204 9.94926 18.8596 11.1655C18.6928 12.4268 19.54 14.0595 18.9147 15.1464C18.2894 16.2334 16.4484 16.3141 15.4396 17.0893C14.4672 17.8391 13.9233 19.6055 12.6643 19.9429C11.4054 20.2802 10.051 19.0196 8.83403 18.8591C7.57279 18.6923 5.94002 19.5394 4.85305 18.9141C3.76609 18.2888 3.68532 16.4479 2.91085 15.4389C2.16092 14.4667 0.394673 13.9234 0.0571579 12.6638C-0.28037 11.4042 0.980371 10.0505 1.14109 8.83424C1.30729 7.5732 0.460077 5.94048 1.08543 4.85354C1.71078 3.7666 3.55172 3.68584 4.56057 2.91073C5.53348 2.16065 6.0768 0.394446 7.33579 0.057115C8.59479 -0.280228 9.94981 0.980128 11.1661 1.14084C12.4274 1.30769 14.0601 0.4605 15.1471 1.08584C16.2341 1.71117 16.3148 3.55206 17.0899 4.56089C17.8364 5.53056 19.6046 6.07334 19.9428 7.33556Z" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" stroke="#111111" stroke-width="1.36364" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg> </span> <span class="feature-text"> Close Deals Faster With View </span> </li>
                                                    <li class="feature-list-item"> <span> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                                <path d="M19.9428 7.33556C20.2803 8.59518 19.0204 9.94926 18.8596 11.1655C18.6928 12.4268 19.54 14.0595 18.9147 15.1464C18.2894 16.2334 16.4484 16.3141 15.4396 17.0893C14.4672 17.8391 13.9233 19.6055 12.6643 19.9429C11.4054 20.2802 10.051 19.0196 8.83403 18.8591C7.57279 18.6923 5.94002 19.5394 4.85305 18.9141C3.76609 18.2888 3.68532 16.4479 2.91085 15.4389C2.16092 14.4667 0.394673 13.9234 0.0571579 12.6638C-0.28037 11.4042 0.980371 10.0505 1.14109 8.83424C1.30729 7.5732 0.460077 5.94048 1.08543 4.85354C1.71078 3.7666 3.55172 3.68584 4.56057 2.91073C5.53348 2.16065 6.0768 0.394446 7.33579 0.057115C8.59479 -0.280228 9.94981 0.980128 11.1661 1.14084C12.4274 1.30769 14.0601 0.4605 15.1471 1.08584C16.2341 1.71117 16.3148 3.55206 17.0899 4.56089C17.8364 5.53056 19.6046 6.07334 19.9428 7.33556Z" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" stroke="#111111" stroke-width="1.36364" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg> </span> <span class="feature-text"> Customizable Accounting </span> </li>
                                                    <li class="feature-list-item"> <span> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                                <path d="M19.9428 7.33556C20.2803 8.59518 19.0204 9.94926 18.8596 11.1655C18.6928 12.4268 19.54 14.0595 18.9147 15.1464C18.2894 16.2334 16.4484 16.3141 15.4396 17.0893C14.4672 17.8391 13.9233 19.6055 12.6643 19.9429C11.4054 20.2802 10.051 19.0196 8.83403 18.8591C7.57279 18.6923 5.94002 19.5394 4.85305 18.9141C3.76609 18.2888 3.68532 16.4479 2.91085 15.4389C2.16092 14.4667 0.394673 13.9234 0.0571579 12.6638C-0.28037 11.4042 0.980371 10.0505 1.14109 8.83424C1.30729 7.5732 0.460077 5.94048 1.08543 4.85354C1.71078 3.7666 3.55172 3.68584 4.56057 2.91073C5.53348 2.16065 6.0768 0.394446 7.33579 0.057115C8.59479 -0.280228 9.94981 0.980128 11.1661 1.14084C12.4274 1.30769 14.0601 0.4605 15.1471 1.08584C16.2341 1.71117 16.3148 3.55206 17.0899 4.56089C17.8364 5.53056 19.6046 6.07334 19.9428 7.33556Z" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" stroke="#111111" stroke-width="1.36364" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg> </span> <span class="feature-text"> No Training Or Maintenance </span> </li>
                                                    <li class="feature-list-item"> <span> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                                <path d="M19.9428 7.33556C20.2803 8.59518 19.0204 9.94926 18.8596 11.1655C18.6928 12.4268 19.54 14.0595 18.9147 15.1464C18.2894 16.2334 16.4484 16.3141 15.4396 17.0893C14.4672 17.8391 13.9233 19.6055 12.6643 19.9429C11.4054 20.2802 10.051 19.0196 8.83403 18.8591C7.57279 18.6923 5.94002 19.5394 4.85305 18.9141C3.76609 18.2888 3.68532 16.4479 2.91085 15.4389C2.16092 14.4667 0.394673 13.9234 0.0571579 12.6638C-0.28037 11.4042 0.980371 10.0505 1.14109 8.83424C1.30729 7.5732 0.460077 5.94048 1.08543 4.85354C1.71078 3.7666 3.55172 3.68584 4.56057 2.91073C5.53348 2.16065 6.0768 0.394446 7.33579 0.057115C8.59479 -0.280228 9.94981 0.980128 11.1661 1.14084C12.4274 1.30769 14.0601 0.4605 15.1471 1.08584C16.2341 1.71117 16.3148 3.55206 17.0899 4.56089C17.8364 5.53056 19.6046 6.07334 19.9428 7.33556Z" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" fill="#B8E900"></path>
                                                                <path d="M12.8509 8.18213L8.30543 12.7276L6.23932 10.6615" stroke="#111111" stroke-width="1.36364" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg> </span> <span class="feature-text"> Innovative Services </span> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="section">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-xl-6">
                                        <div class="heading-section text-center">
                                            <span class="heading-subtitle mx-auto justify-content-center border-0 text-gradient wow fadeInUp" data-wow-delay=".3s">
                                                <i class="ri-checkbox-blank-circle-fill"></i>
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
                                                        <a href="servicesdetails-01.html">
                                                            Software Development
                                                        </a>
                                                    </h3>
                                                    <p class="service-card-description">
                                                        Custom business software and portal solutions designed for scalability and reliability, built around the way your team actually works.
                                                    </p>
                                                    <div class="service-card__btn">
                                                        <a class="btn-anim d-flex align-items-center text-gradient gap-1 btn-double-effect" href="services-01.html">
                                                            <span class="btn__text">
                                                                Read More
                                                            </span>
                                                            <span class="btn__icon">
                                                                <i class="ri-arrow-right-line"></i>
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
                                                        <a href="servicesdetails-01.html">
                                                            UI/UX Design
                                                        </a>
                                                    </h3>
                                                    <p class="service-card-description">
                                                        Deliver seamless and enjoyable digital experiences. Our designs prioritize clarity, ease of use, and attractive interfaces for both web and mobile platforms.
                                                    </p>
                                                    <div class="service-card__btn">
                                                        <a class="btn-anim d-flex align-items-center gap-1 text-gradient btn-double-effect" href="services-01.html">
                                                            <span class="btn__text">
                                                                Read More
                                                            </span>
                                                            <span class="btn__icon">
                                                                <i class="ri-arrow-right-line"></i>
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
                                                        <a href="servicesdetails-01.html">
                                                            Mobile App Development
                                                        </a>
                                                    </h3>
                                                    <p class="service-card-description">
                                                        Native and cross-platform app experiences with smooth performance and clean UX. We turn ideas into high-performing mobile apps tailored to your users’ needs.
                                                    </p>
                                                    <div class="service-card__btn">
                                                        <a class="btn-anim d-flex align-items-center gap-1 text-gradient btn-double-effect" href="services-01.html">
                                                            <span class="btn__text">
                                                                Read More
                                                            </span>
                                                            <span class="btn__icon">
                                                                <i class="ri-arrow-right-line"></i>
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
                                                        <a href="servicesdetails-01.html">
                                                            Website Development
                                                        </a>
                                                    </h3>
                                                    <p class="service-card-description">
                                                        Modern, responsive, and conversion-focused websites tailored to your business goals — from marketing sites to complex web platforms and e-commerce stores.
                                                    </p>
                                                    <div class="service-card__btn">
                                                        <a class="btn-anim d-flex align-items-center gap-1 text-gradient btn-double-effect" href="services-01.html">
                                                            <span class="btn__text">
                                                                Read More
                                                            </span>
                                                            <span class="btn__icon">
                                                                <i class="ri-arrow-right-line"></i>
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
                                                        <a href="servicesdetails-01.html">
                                                            SEO & Marketing
                                                        </a>
                                                    </h3>
                                                    <p class="service-card-description">
                                                        Search visibility, content strategy, and growth campaigns that drive quality traffic and turn visitors into customers.
                                                    </p>
                                                    <div class="service-card__btn">
                                                        <a class="btn-anim d-flex align-items-center gap-1 text-gradient btn-double-effect" href="services-01.html">
                                                            <span class="btn__text">
                                                                Read More
                                                            </span>
                                                            <span class="btn__icon">
                                                                <i class="ri-arrow-right-line"></i>
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
                                                        <a href="servicesdetails-01.html">
                                                            AI/ML
                                                        </a>
                                                    </h3>
                                                    <p class="service-card-description">
                                                        We build intelligent features — from automation and predictive models to AI-powered integrations — that give your product a competitive edge.
                                                    </p>
                                                    <div class="service-card__btn">
                                                        <a class="btn-anim d-flex align-items-center gap-1 text-gradient btn-double-effect" href="services-01.html">
                                                            <span class="btn__text">
                                                                Read More
                                                            </span>
                                                            <span class="btn__icon">
                                                                <i class="ri-arrow-right-line"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a class="btn btn-primary-gradient landing-custom-button me-3 mb-0 mt-2" href="servicesdetails-01.html" style="overflow: hidden;">
                                        See All Services
                                        <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>
                            </div>
                        </section> <!-- top / primary band -->
                        <div class="swiper marquee-section about-marquee bg-primary mb-5 page-marquee-section">
                            <div class="swiper-wrapper marquee-container">
                                <div class="swiper-slide d-flex align-items-center gap-5 marquee-item"> <span class="marquee-text stroke">UI/UX Desing</span> <i class="ri-asterisk fs-1 lh-1"></i> </div>
                                <div class="swiper-slide d-flex align-items-center gap-5 marquee-item"> <span class="marquee-text">Branding Design</span> <i class="ri-asterisk fs-1 lh-1"></i> </div>
                                <div class="swiper-slide d-flex align-items-center gap-5 marquee-item"> <span class="marquee-text stroke">10+ Years Experience</span> <i class="ri-asterisk fs-1 lh-1"></i> </div>
                                <div class="swiper-slide d-flex align-items-center gap-5 marquee-item"> <span class="marquee-text">User Experience</span> <i class="ri-asterisk fs-1 lh-1"></i> </div>
                                <div class="swiper-slide d-flex align-items-center gap-5 marquee-item"> <span class="marquee-text stroke">Digital Marketing Strategy</span> <i class="ri-asterisk fs-1 lh-1"></i> </div>
                                <div class="swiper-slide d-flex align-items-center gap-5 marquee-item"> <span class="marquee-text">Professional</span> <i class="ri-asterisk fs-1 lh-1"></i> </div>
                                <div class="swiper-slide d-flex align-items-center gap-5 marquee-item"> <span class="marquee-text stroke">Digital Marketing</span> <i class="ri-asterisk fs-1 lh-1"></i> </div>
                            </div>
                        </div>
                        <section class="section founder-section">
                            <div class="container">
                                <div class="row align-items-center gy-5">
                                    <div class="col-xl-5">
                                        <div class="founder-photo-card">
                                            <div class="founder-photo-frame">
                                                <img src="{{ asset('FrontendAssets/images/profile/founder.png')}}" alt="Syed Sabeer Faisal — Founder & CEO of Deveon Inc" class="founder-photo">
                                                <div class="founder-badge">
                                                    <div class="founder-badge__number-wrap">
                                                        <span class="odometer" data-count="10"></span><span class="suffix">+</span>
                                                    </div>
                                                    <span class="founder-badge__label">Years</span>
                                                </div>
                                            </div>
                                            <ul class="founder-social">
                                                <li><a href="https://facebook.com/" target="_blank" rel="noopener" aria-label="Facebook"><i class="ri-facebook-circle-fill"></i></a></li>
                                                <li><a href="https://twitter.com/" target="_blank" rel="noopener" aria-label="Twitter"><i class="ri-twitter-x-line"></i></a></li>
                                                <li><a href="https://linkedin.com/" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="ri-linkedin-box-fill"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <div class="heading-section text-start mb-4">
                                            <span class="heading-subtitle rounded-pill border px-3 py-2 d-inline-flex wow fadeInUp" data-wow-delay=".3s"> <i class="ri-star-fill"></i> Leadership </span>
                                            <h2 class="heading-title mt-4 text-animated-slider"> Meet Our <span class="text-primary">Visionary Founder</span> </h2>
                                        </div>
                                        <div class="founder-quote">
                                            <p>&ldquo;At Deveon Inc, we don't just build software — we craft digital experiences that transform businesses and empower brands to thrive in an ever-evolving digital landscape.&rdquo;</p>
                                        </div>
                                        <div class="founder-bio">
                                            <p class="op-7 mb-3">
                                                Since founding this company, my vision has been clear: to deliver world-class digital solutions that combine cutting-edge technology with strategic creativity. From <strong>custom software development</strong> and <strong>mobile applications</strong> to <strong>graphic design</strong>, <strong>branding</strong>, and <strong>digital marketing</strong> — we bring ideas to life with precision, passion, and purpose.
                                            </p>
                                            <p class="op-7 mb-4">
                                                Our team doesn't just meet expectations — we exceed them. We build lasting partnerships with clients, understanding their unique challenges and delivering solutions that drive real, measurable results.
                                            </p>
                                        </div>
                                        <div class="row gy-3">
                                            <div class="col-sm-6">
                                                <div class="founder-stat">
                                                    <i class="ri-checkbox-circle-fill"></i>
                                                    <div>
                                                        <h3><span class="odometer" data-count="200"></span>+</h3>
                                                        <p>Projects Delivered</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="founder-stat">
                                                    <i class="ri-global-line"></i>
                                                    <div>
                                                        <h3><span class="odometer" data-count="10"></span>+</h3>
                                                        <p>Countries Reached</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="founder-signature">
                                            <div>
                                                <h4>Syed Sabeer Faisal</h4>
                                                <span>Founder & CEO, Deveon Inc</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                      
                        <section class="section section-devider">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-xl-6">
                                        <div class="heading-section mb-5 pb-4 text-center"> <span class="heading-subtitle rounded-pill border px-3 py-1 d-inline-flex wow fadeInUp" data-wow-delay=".3s"> Testimonials </span>
                                            <h2 class="heading-title mt-4 text-animated-slider"> What They Say! </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper freelancer-testimonials-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="testimonial-card">
                                                <div class="testimonial-content"> <span class="testimonial-rating">“Outstanding Experience!”</span>
                                                    <p class="testimonial-text"> <span>Aexora</span> truly gets the challenges startups face. Thanks to their guidance, our user engagement tripled in just three months! </p>
                                                </div>
                                                <div class="testimonial-author">
                                                    <div class="author-avatar"> <img src="{{ asset('FrontendAssets/images/profile/1.jpg')}}" alt="Sarah Lee"> </div>
                                                    <div class="author-info">
                                                        <h3 class="author-name">Sarah Lee</h3> <span class="author-role">Product Manager</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="testimonial-card dark mt-4">
                                                <div class="testimonial-content"> <span class="testimonial-rating">“Truly Transformative!”</span>
                                                    <p class="testimonial-text"> Their insight into scaling small businesses is unmatched. Our app downloads skyrocketed by <span>180%</span> after their strategy. </p>
                                                </div>
                                                <div class="testimonial-author">
                                                    <div class="author-avatar"> <img src="{{ asset('FrontendAssets/images/profile/2.jpg')}}" alt="Raj Patel"> </div>
                                                    <div class="author-info">
                                                        <h4 class="author-name">Raj Patel</h4> <span class="author-role">Software Engineer</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="testimonial-card">
                                                <div class="testimonial-content"> <span class="testimonial-rating">“Highly Recommended!”</span>
                                                    <p class="testimonial-text"> Aexora helped us refine our growth strategy, leading to a <span>2.5x </span>increase in active users. Their approach is both practical and innovative. </p>
                                                </div>
                                                <div class="testimonial-author">
                                                    <div class="author-avatar"> <img src="{{ asset('FrontendAssets/images/profile/1.jpg')}}" alt="Emily Wong"> </div>
                                                    <div class="author-info">
                                                        <h3 class="author-name">Emily Wong</h3> <span class="author-role">Marketing Lead</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="testimonial-card dark mt-4">
                                                <div class="testimonial-content"> <span class="testimonial-rating">“Game Changer!”</span>
                                                    <p class="testimonial-text"> Working with Aexora boosted our conversion rates tremendously. Their understanding of startup dynamics is phenomenal. </p>
                                                </div>
                                                <div class="testimonial-author">
                                                    <div class="author-avatar"> <img src="{{ asset('FrontendAssets/images/profile/2.jpg')}}" alt="Michael Turner"> </div>
                                                    <div class="author-info">
                                                        <h3 class="author-name">Michael Turner</h3> <span class="author-role">Founder & CEO</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

@endsection

@section('script')

@endsection
