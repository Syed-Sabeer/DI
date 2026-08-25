@extends('layouts.frontend.master')

@section('title', 'Avrio Global Inc. | Custom Software Development Company')
@section('meta_description', 'Avrio Global Inc. is a custom software development company building mobile apps, web applications, AI/ML solutions, and fintech, banking, and insurance software for ambitious businesses in Canada and worldwide.')
@section('meta_keywords', 'software development company, custom software development company Canada, mobile app development company, web app development company, AI ML development company, fintech software development company, banking software solutions, insurance software solutions, financial technology solutions, digital marketing agency')
@section('og_type', 'website')

@push('schema')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    'name' => config('seo.site_name'),
    'url' => config('seo.domain'),
], JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush

@section('css')
<style>
    .industries-section { position: relative; overflow: hidden; background: #f7f7f7; }
    .industries-section::before { content: ''; position: absolute; width: 560px; height: 560px; top: 58%; left: 50%; border: 1px solid rgba(207,31,66,.09); border-radius: 50%; transform: translate(-50%,-50%); box-shadow: 0 0 0 70px rgba(207,31,66,.025), 0 0 0 140px rgba(207,31,66,.018); }
    .industries-heading { position: relative; z-index: 1; max-width: 820px; margin: 0 auto 55px; text-align: center; }
    .industries-heading h2 { display: block; color: #161616; font-size: clamp(38px,5vw,68px); line-height: 1.08; letter-spacing: -.035em; }
    .industries-heading h2 span { display: inline; position: static; transform: none; white-space: normal; }
    .industries-heading h2 .style-font { color: #cf1f42; }
    .industries-heading p { max-width: 650px; margin: 20px auto 0; color: #626262; font-size: 17px; line-height: 1.7; }
    .industries-map { position: relative; z-index: 1; display: grid; grid-template-columns: minmax(210px,1fr) minmax(420px,1.8fr) minmax(210px,1fr); gap: 45px; align-items: center; }
    .industry-list { display: flex; flex-direction: column; gap: 22px; }
    .industry-item { position: relative; min-height: 88px; display: flex; align-items: center; gap: 16px; padding: 16px 18px; border: 1px solid #e6e6e6; border-radius: 14px; background: rgba(255,255,255,.92); box-shadow: 0 8px 25px rgba(22,22,22,.04); transition: transform .3s ease, border-color .3s ease; }
    .industry-item:hover { transform: translateY(-4px) scale(1.015); border-color: rgba(207,31,66,.45); }
    .industry-item::after { content: ''; position: absolute; top: 50%; width: 46px; border-top: 1px dashed rgba(207,31,66,.5); }
    .industry-list-left .industry-item::after { left: 100%; }
    .industry-list-right .industry-item::after { right: 100%; }
    .industry-icon { flex: 0 0 46px; width: 46px; height: 46px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; background: #cf1f42; color: #fff; font-size: 17px; transition: transform .35s ease, box-shadow .35s ease; }
    .industry-item:hover .industry-icon { transform: rotate(8deg) scale(1.1); box-shadow: 0 8px 20px rgba(207,31,66,.3); }
    .industry-item h3 { margin: 0 0 4px; color: #161616; font-size: 18px; line-height: 1.2; }
    .industry-item p { margin: 0; color: #777; font-size: 12px; line-height: 1.45; }
    .industries-center { position: relative; padding: 34px; border: 1px solid rgba(207,31,66,.24); border-radius: 50%; background: rgba(255,255,255,.7); }
    .industries-center::before { content: ''; position: absolute; inset: 18px; z-index: -1; border: 1px dashed rgba(207,31,66,.35); border-radius: 50%; animation: industryOrbit 24s linear infinite; }
    .industries-center-image { position: relative; overflow: hidden; aspect-ratio: 1/1; border-radius: 50%; background: #202020; box-shadow: 0 25px 60px rgba(22,22,22,.18); }
    .industries-center-image img { width: 100%; height: 100%; object-fit: cover; animation: industryImageFloat 6s ease-in-out infinite; }
    .industries-center-label { position: absolute; left: 50%; bottom: 16px; width: calc(100% - 80px); padding: 18px 20px; transform: translateX(-50%); border-radius: 14px; background: rgba(20,20,20,.9); text-align: center; backdrop-filter: blur(8px); }
    .industries-center-label h3 { margin: 0 0 4px; color: #fff; font-size: 22px; }
    .industries-center-label span { color: rgba(255,255,255,.7); font-size: 12px; letter-spacing: .08em; text-transform: uppercase; }
    @keyframes industryOrbit { to { transform: rotate(360deg); } }
    @keyframes industryImageFloat { 0%,100% { transform: scale(1.01); } 50% { transform: scale(1.06); } }
    @keyframes industryConnector { 0%,100% { opacity: .35; } 50% { opacity: 1; } }
    .industry-item::after { animation: industryConnector 2.4s ease-in-out infinite; }
    @media (max-width: 1199px) { .industries-map { grid-template-columns: 1fr 1.45fr 1fr; gap: 28px; }.industry-item::after { width: 29px; }.industry-item { padding: 13px; }.industry-item p { display: none; } }
    @media (max-width: 991px) { .industries-map { grid-template-columns: 1fr 1fr; }.industries-center { grid-column: 1/-1; grid-row: 1; width: min(520px,100%); margin: 0 auto 15px; }.industry-item::after { display: none; } }
    @media (max-width: 575px) { .industries-map { grid-template-columns: 1fr; gap: 16px; }.industries-center { padding: 20px; }.industries-center-label { width: calc(100% - 55px); bottom: 8px; }.industry-list { gap: 16px; }.industries-heading { margin-bottom: 35px; }.industry-item p { display: block; } }
    @media (prefers-reduced-motion: reduce) { .industries-center::before,.industries-center-image img,.industry-item::after { animation: none; }.industry-item,.industry-icon { transition: none; } }
</style>
@endsection

@section('content')


  <!-- Hero Section Start -->
                    <section class="hero-section-4 hero-4">
                        <div class="rain front-row"></div>
                        <div class="rain back-row"></div>
                        <div class="container">
                            <div class="row g-4 align-items-center" style="margin-top: 0%;">
                                <div class="col-lg-8">
                                    <div class="hero-content">
                                        <span class="hero-sub">Avrio Global Inc</span>
                                        <h1 class="title">
                                            <b> Bridging the Gap between</b> People & Technology
                                        </h1>
                                        <p>
                                            <b>Avrio Global Inc is a creative studio based in London. We think like</b>
                                            an agency and produce like a visuals for brands & agencies.
                                        </p>
                                        <div class="hero-button">
                                            <a class="theme-btn-main style-2 bg-white-style" href="{{ url('/contact') }}">
                                                <span class="theme-btn-arrow-left"> <i
                                                        class="fa-solid fa-arrow-up-right"></i> </span>
                                                <span class="theme-btn">let’s talk</span>
                                                <span class="theme-btn-arrow-right"> <i
                                                        class="fa-solid fa-arrow-up-right"></i> </span>
                                            </a>
                                            <a class="theme-btn-main style-2 border-style" href="{{ url('/service') }}">
                                                <span class="theme-btn-arrow-left"> <i
                                                        class="fa-solid fa-arrow-up-right"></i> </span>
                                                <span class="theme-btn">view Services</span>
                                                <span class="theme-btn-arrow-right"> <i
                                                        class="fa-solid fa-arrow-up-right"></i> </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="hero-image">
                                        <img src="{{ asset('FrontendAssets/img/home-4/hero-image.png')}}" alt="Avrio Global custom software development illustration" class="float-bob-y">
                                        <div class="bg-circle">
                                            <img src="{{ asset('FrontendAssets/img/home-4/bg-circle.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-animation-shape1-1 animation-infinite-test gt-line-shape-animation animation-infinite"
                            style="background-image: url('{{ asset('FrontendAssets/img/home-4/hero-shape.png') }}');"></div>
                        <div class="line-2 animation-infinite-rtl"
                            style="background-image: url('{{ asset('FrontendAssets/img/home-4/line-shape-2.png') }}');"></div>
                    </section>

                    <!-- Brand Section Start -->
                    <div class="brand-section">
                        <div class="container">
                            <h2 class="title wa_title_spilt_1">
                                The Visionaries and <span><span class="font-style">Industry Leaders</span> We’ve</span>
                                <br> Proudly Partnered.
                            </h2>
                        </div>
                        <div class="swiper brand-slider wow fadeInUp" data-wow-delay=".3s">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/11.jpeg')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/11.jpeg')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/2.avif')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/2.avif')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/3.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/3.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/4.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/4.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/5.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/5.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/6.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/6.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/7.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/7.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/8.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/8.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                  <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/9.jpg')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/9.jpg')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/10.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/10.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/11.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/11.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- About Section Start -->
                    <section class="about-section section-padding pt-0">
                        <div class="container">
                            <div class="about-wrapper">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="about-image wow fadeInUp">
                                            <div class="about-circle">
                                                <img src="{{ asset('FrontendAssets/img/home-1/about-circle.png')}}" alt="img">
                                            </div>
                                            <img src="{{ asset('FrontendAssets/img/home-1/about-image.png')}}" alt="About Avrio Global software development company">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="about-content">
                                            <div class="section-title mb-0">
                                                <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                                    <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> About us
                                                </span>
                                                <h2 class="wa_title_spilt_1">
    <span class="style-font">Building Innovative </span> Software
    Solutions
</h2>
                                            </div>
                                           <p class="text wow fadeInUp" data-wow-delay=".3s">
    We help businesses accelerate growth through innovative software
    development and smart digital solutions. Our experienced team combines
    creativity with cutting-edge technology to build secure, scalable
    applications that solve real-world challenges. From startups to
    enterprises, we transform ideas into successful digital products.
</p>
                                            <a class="theme-btn-main style-2 bg-white-style wow fadeInUp"
                                                data-wow-delay=".5s" href="{{ url('/about') }}">
                                                <span class="theme-btn-arrow-left"> <i
                                                        class="fa-solid fa-arrow-up-right"></i> </span>
                                                <span class="theme-btn">Know more us</span>
                                                <span class="theme-btn-arrow-right"> <i
                                                        class="fa-solid fa-arrow-up-right"></i> </span>
                                            </a>
                                            <div class="about-counter-items">
                                                <div class="content wow fadeInUp" data-wow-delay=".3s">
                                                    <h2>
                                                        <span class="count">100</span><span class="plus">+</span>
                                                    </h2>
                                                    <p>
                                                        Trusted Experience Built on <br class="d-block"> Successful
                                                        Projects.
                                                    </p>
                                                </div>
                                                <div class="about-small wow fadeInUp" data-wow-delay=".5s">
                                                    <img src="{{ asset('FrontendAssets/img/home-1/about-small.jpg')}}" alt="Avrio Global software engineers at work">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>



                    <!-- Service Section Start -->
                    <section class="service-section-2 section-padding fix">
                        <div class="container">
                            <div class="section-title mb-0">
                                <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                    <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> Our services
                                </span>
                                <h2 class="wa_title_spilt_1">
                                    <span class="style-font">Our Creative Services</span> That Deliver <br> Innovation,
                                    <span class="style-color">& Measurable Results</span>
                                </h2>
                            </div>
                            <div class="des-portfolio-wrap">
                                <div class="service-box-items-2 des-portfolio-panel">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-content">
                                                <p>001. / service</p>
                                                <h3 class="title"><a href="{{ route('service.detail', 'website-app-development') }}">Web App Development</a></h3>
                                                <div class="service-list">
                                                    <ul>
                                                        <li>
                                                            + responsive web apps
                                                        </li>
                                                        <li>
                                                            + custom dashboards
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            + API integrations
                                                        </li>
                                                        <li>
                                                            + scalable architecture
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-2">
                                                    We build fast, secure web applications that turn your ideas into
                                                    reliable digital products designed to grow with your business.
                                                </h4>
                                                <ul class="list-items">
                                                    <li>
                                                        <a href="{{ route('service.detail', 'website-app-development') }}">Plan</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('service.detail', 'website-app-development') }}">Execute</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('service.detail', 'website-app-development') }}">Succeed</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-thumb">
                                                <img src="{{ asset('FrontendAssets/img/services/website-app-development.png')}}" alt="Web app development services">
                                                <img src="{{ asset('FrontendAssets/img/services/website-app-development.png')}}" alt="Web app development services">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-box-items-2 des-portfolio-panel">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-content">
                                                <p>002. / service</p>
                                                <h3 class="title"><a href="{{ route('service.detail', 'mobile-app-development') }}">Mobile App Development</a></h3>
                                                <div class="service-list">
                                                    <ul>
                                                        <li>
                                                            + iOS & Android apps
                                                        </li>
                                                        <li>
                                                            + cross-platform development
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            + intuitive UI/UX
                                                        </li>
                                                        <li>
                                                            + app maintenance
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-2">
                                                    From concept to launch, we create high-performing mobile apps that
                                                    deliver seamless experiences on every device.
                                                </h4>
                                                <ul class="list-items">
                                                    <li>
                                                        <a href="{{ route('service.detail', 'mobile-app-development') }}">Plan</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('service.detail', 'mobile-app-development') }}">Execute</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('service.detail', 'mobile-app-development') }}">Succeed</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-thumb">
                                                <img src="{{ asset('FrontendAssets/img/services/mobile-app-development.png')}}" alt="Mobile app development services">
                                                <img src="{{ asset('FrontendAssets/img/services/mobile-app-development.png')}}" alt="Mobile app development services">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-box-items-2 des-portfolio-panel">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-content">
                                                <p>003. / service</p>
                                                <h3 class="title"><a href="{{ route('service.detail', 'ai-ml-development') }}">AI/ML Development</a></h3>
                                                <div class="service-list">
                                                    <ul>
                                                        <li>
                                                            + machine learning models
                                                        </li>
                                                        <li>
                                                            + predictive analytics
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            + intelligent automation
                                                        </li>
                                                        <li>
                                                            + AI integrations
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-2">
                                                    Turn data into smarter decisions with practical AI and machine-learning
                                                    solutions tailored to your workflows and business goals.
                                                </h4>
                                                <ul class="list-items">
                                                    <li>
                                                        <a href="{{ route('service.detail', 'ai-ml-development') }}">Plan</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('service.detail', 'ai-ml-development') }}">Execute</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('service.detail', 'ai-ml-development') }}">Succeed</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-thumb">
                                                <img src="{{ asset('FrontendAssets/img/services/ai-ml-development.png')}}" alt="AI and machine learning development services">
                                                <img src="{{ asset('FrontendAssets/img/services/ai-ml-development.png')}}" alt="AI and machine learning development services">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-box-items-2 des-portfolio-panel">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-content">
                                                <p>004. / service</p>
                                                <h3 class="title"><a href="{{ route('service.detail', 'ui-ux-design') }}">UI/UX DESIGN</a></h3>
                                                <div class="service-list">
                                                    <ul>
                                                        <li>+ user research</li>
                                                        <li>+ wireframing</li>
                                                    </ul>
                                                    <ul>
                                                        <li>+ interface design</li>
                                                        <li>+ usability testing</li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-2">
                                                    We create interfaces that are intuitive, visually appealing, and aligned
                                                    with your brand identity.
                                                </h4>
                                                <ul class="list-items">
                                                    <li><a href="{{ route('service.detail', 'ui-ux-design') }}">Research</a></li>
                                                    <li><a href="{{ route('service.detail', 'ui-ux-design') }}">Design</a></li>
                                                    <li><a href="{{ route('service.detail', 'ui-ux-design') }}">Test</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-thumb">
                                                <img src="{{ asset('FrontendAssets/img/services/ui-ux-design.png')}}" alt="UI/UX design">
                                                <img src="{{ asset('FrontendAssets/img/services/ui-ux-design.png')}}" alt="UI/UX design">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-box-items-2 des-portfolio-panel">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-content">
                                                <p>005. / service</p>
                                                <h3 class="title"><a href="{{ route('service.detail', 'staff-augmentation') }}">STAFF AUGMENTATION</a></h3>
                                                <div class="service-list">
                                                    <ul>
                                                        <li>+ dedicated engineers</li>
                                                        <li>+ flexible engagement</li>
                                                    </ul>
                                                    <ul>
                                                        <li>+ rapid team scaling</li>
                                                        <li>+ seamless integration</li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-2">
                                                    Extend your team with dependable engineers and specialists who integrate
                                                    with your process and culture.
                                                </h4>
                                                <ul class="list-items">
                                                    <li><a href="{{ route('service.detail', 'staff-augmentation') }}">Identify</a></li>
                                                    <li><a href="{{ route('service.detail', 'staff-augmentation') }}">Integrate</a></li>
                                                    <li><a href="{{ route('service.detail', 'staff-augmentation') }}">Scale</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-thumb">
                                                <img src="{{ asset('FrontendAssets/img/services/staff-augmentation.png')}}" alt="Staff augmentation">
                                                <img src="{{ asset('FrontendAssets/img/services/staff-augmentation.png')}}" alt="Staff augmentation">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Choose Us Section Start -->
                    <section class="choose-us-section-3 fix section-padding">
                        <div class="container">
                            <div class="choose-us-wrapper-3">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="about-left-items">
                                            <div class="about-thumb fix wow fadeInUp" data-wow-delay=".3s">
                                                <img data-speed=".8" src="{{ asset('FrontendAssets/img/home-3/choose-us.jpg')}}" alt="Why choose Avrio Global for software development">
                                            </div>
                                            <div class="about-bottom-content wow fadeInUp" data-wow-delay=".5s">
                                                <div class="about-counter">
                                                    <div class="sub-text">More than</div>
                                                    <h2>
                                                        <span class="count">30</span>%
                                                    </h2>
                                                    <p>Focused on outcome</p>
                                                </div>
                                                <div class="about-line"></div>
                                                <div class="content">
                                                    <p>
                                                        We empower businesses with custom software, web, mobile, and
                                                        cloud solutions designed for efficiency and growth. By combining
                                                        cutting-edge technology with industry expertise, we deliver
                                                        exceptional results that exceed expectations.
                                                    </p>
                                                    <a class="theme-btn-main style-2 bg-white-style"
                                                        href="{{ url('/contact') }}">
                                                        <span class="theme-btn-arrow-left"> <i
                                                                class="fa-solid fa-arrow-up-right"></i> </span>
                                                        <span class="theme-btn">Get In Touch</span>
                                                        <span class="theme-btn-arrow-right"> <i
                                                                class="fa-solid fa-arrow-up-right"></i> </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="choose-us-content">
                                            <div class="section-title mb-0">
                                                <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                                    <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> Why choose us
                                                </span>
                                                <h2 class="wa_title_spilt_1">
                                                    <span class="style-font">From Challenge Our</span> Best
                                                    Opportunities Expertise & Real Success.
                                                </h2>
                                            </div>
                                            <div class="choose-icon-items">
                                                <div class="icon-items wow fadeInUp" data-wow-delay=".3s">
                                                    <div class="icon">
                                                        <img src="{{ asset('FrontendAssets/img/home-3/feature-icon-1.svg')}}" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="title">Our mission</h3>
                                                        <p>
                                                            Deliver innovative solutions that empower businesses through
                                                            technology.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="icon-items wow fadeInUp" data-wow-delay=".5s">
                                                    <div class="icon">
                                                        <img src="{{ asset('FrontendAssets/img/home-3/feature-icon-2.svg')}}" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="title">Our vision</h3>
                                                        <p>
                                                            Become a trusted global technology partner driving
                                                            innovation.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-4 align-items-center">
                                                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                                                    <div class="award-items-box">
                                                        <img src="{{ asset('FrontendAssets/img/white-file/award.png')}}" alt="img">
                                                        <p>
                                                            <b>20+ Awards</b> of our <br class="d-block"> Consulting
                                                            Experiences.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                                                    <div class="about-small-image">
                                                        <img src="{{ asset('FrontendAssets/img/home-3/about-small.jpg')}}" alt="Avrio Global software development team">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                 <!-- Marque Section Start -->
<div class="marque-section">
    <div class="marquee">
        <div class="marquee-group">
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Software
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Innovation
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Cloud
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> AI Solutions
            </div>
        </div>

        <div class="marquee-group">
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Software
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Innovation
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Cloud
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> AI Solutions
            </div>
        </div>

        <div class="marquee-group">
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Software
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Innovation
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Cloud
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> AI Solutions
            </div>
        </div>

        <div class="marquee-group">
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Software
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Innovation
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Cloud
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> AI Solutions
            </div>
        </div>
    </div>
</div>
                    <!-- Industries Section Start -->
                    <section class="industries-section section-padding">
                        <div class="container">
                            <div class="industries-heading scroll-anim">
                                <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                    <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt=""> Industries we serve
                                </span>
                                <h2><span>Technology built for</span> <span class="style-font">your industry</span></h2>
                                <p>We combine deep domain understanding with modern engineering to solve the operational, customer, and growth challenges unique to every sector.</p>
                            </div>
                            <div class="industries-map">
                                <div class="industry-list industry-list-left">
                                    <article class="industry-item wow fadeInLeft" data-wow-delay=".1s"><span class="industry-icon"><i class="fa-solid fa-heart-pulse"></i></span><div><h3>Healthcare</h3><p>Connected care and secure health platforms.</p></div></article>
                                    <article class="industry-item wow fadeInLeft" data-wow-delay=".2s"><span class="industry-icon"><i class="fa-solid fa-building-columns"></i></span><div><h3>Finance & Fintech</h3><p>Banking, payments, analytics, and compliance.</p></div></article>
                                    <article class="industry-item wow fadeInLeft" data-wow-delay=".3s"><span class="industry-icon"><i class="fa-solid fa-cart-shopping"></i></span><div><h3>Retail & Commerce</h3><p>Connected, intelligent buying experiences.</p></div></article>
                                    <article class="industry-item wow fadeInLeft" data-wow-delay=".4s"><span class="industry-icon"><i class="fa-solid fa-gears"></i></span><div><h3>Manufacturing</h3><p>Smart operations, IoT, and automation.</p></div></article>
                                </div>
                                <div class="industries-center wow zoomIn" data-wow-delay=".2s">
                                    <div class="industries-center-image">
                                        <img src="{{ asset('FrontendAssets/img/services/data-analytics.png') }}" alt="Technology solutions across industries">
                                        <div class="industries-center-label"><h3>Industry Intelligence</h3><span>Strategy &bull; Technology &bull; Growth</span></div>
                                    </div>
                                </div>
                                <div class="industry-list industry-list-right">
                                    <article class="industry-item wow fadeInRight" data-wow-delay=".1s"><span class="industry-icon"><i class="fa-solid fa-graduation-cap"></i></span><div><h3>Education</h3><p>Engaging and connected learning platforms.</p></div></article>
                                    <article class="industry-item wow fadeInRight" data-wow-delay=".2s"><span class="industry-icon"><i class="fa-solid fa-truck-fast"></i></span><div><h3>Logistics</h3><p>Tracking, fleet intelligence, and optimization.</p></div></article>
                                    <article class="industry-item wow fadeInRight" data-wow-delay=".3s"><span class="industry-icon"><i class="fa-solid fa-house-signal"></i></span><div><h3>Real Estate</h3><p>Digital properties and smart buildings.</p></div></article>
                                    <article class="industry-item wow fadeInRight" data-wow-delay=".4s"><span class="industry-icon"><i class="fa-solid fa-tower-broadcast"></i></span><div><h3>Media & Telecom</h3><p>Scalable content and subscriber platforms.</p></div></article>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Work Process Section Start -->
                    <section class="work-process-section-3 fix section-padding">
                        <div class="container">
                            <div class="section-title-area">
                                <div class="section-title">
                                    <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                        <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> Our working process
                                    </span>
                                    <h2 class="split-title">
                                        <span class="style-font">A Streamlined Process,</span> <br> Built For Clarity,
                                        Creativity, <br> And Results
                                    </h2>
                                </div>
                                <div class="text-items wow fadeInUp" data-wow-delay=".3s">
                                    <p>
                                        See what clients worldwide are saying about our team <br> and software solutions
                                        we proudly deliver.
                                    </p>
                                </div>
                            </div>
                            <div class="work-process-wrapper-3">
                                <div class="line-1">
                                    <img src="{{ asset('FrontendAssets/img/white-file/line.png')}}" alt="img">
                                </div>
                                <div class="work-process-items-3 active wow fadeInUp">
                                    <div class="icon">
                                        <img src="{{ asset('FrontendAssets/img/home-3/icon1.svg')}}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Discover</h3>
                                        <p>Understand your business, <br>
                                            users, & goals </p>
                                    </div>
                                </div>
                                <div class="work-process-items-3 wow fadeInUp" data-wow-delay=".2s">
                                    <div class="icon">
                                        <img src="{{ asset('FrontendAssets/img/home-3/icon2.svg')}}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Define</h3>
                                        <p>
                                            Align on strategy, structure, <br>
                                            and scope
                                        </p>
                                    </div>
                                </div>
                                <div class="work-process-items-3 wow fadeInUp" data-wow-delay=".4s">
                                    <div class="icon">
                                        <img src="{{ asset('FrontendAssets/img/home-3/icon3.svg')}}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Design</h3>
                                        <p>
                                            Visualize the solution and bring <br>
                                            ideas to life
                                        </p>
                                    </div>
                                </div>
                                <div class="work-process-items-3 wow fadeInUp" data-wow-delay=".6s">
                                    <div class="icon">
                                        <img src="{{ asset('FrontendAssets/img/home-3/icon4.svg')}}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Develop</h3>
                                        <p>
                                            Build high-performing <br>
                                            digital products
                                        </p>
                                    </div>
                                </div>
                                <div class="work-process-items-3 wow fadeInUp" data-wow-delay=".8s">
                                    <div class="icon">
                                        <img src="{{ asset('FrontendAssets/img/home-3/icon5.svg')}}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Deploy & Market</h3>
                                        <p>
                                            Launch, optimize, <br>
                                            and scale
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Choose Us Section Start -->
                    <section class="choose-us-section-33 fix section-padding section-bg">
                        <div class="container">
                            <div class="choose-us-wrapper-33">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="choose-us-content">
                                            <div class="section-title style-3 mb-0">
                                                <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                                    <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> AI solutions
                                                </span>
                                                <h2 class="wa_title_spilt_1">
                                                    <span class="style-font">Trusted Solutions </span>For Your <br> AI
                                                    Digital Services
                                                </h2>

                                            </div>
                                            <ul class="choose-list">
                                                <li class="active wow fadeInUp" data-wow-delay=".3s">
                                                    <div class="icon">
                                                        <img src="{{ asset('FrontendAssets/img/home-3/icon5.svg')}}" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h3>
                                                            Innovative solutions
                                                        </h3>
                                                        <p>
                                                            Our team is always available to address your concerns,
                                                            providing quick and effective solution to keep your business
                                                            expert option.
                                                        </p>
                                                    </div>
                                                </li>
                                                
                                                <li class="wow fadeInUp" data-wow-delay=".5s">
                                                    <div class="icon">
                                                        <img src="{{ asset('FrontendAssets/img/home-3/icon6.svg')}}" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h3>
                                                            Winning expertise
                                                        </h3>
                                                        <p>
                                                            Our team is always available to address your concerns,
                                                            providing quick and effective solution to keep your business
                                                            expert option.
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="wow fadeInUp" data-wow-delay=".7s">
                                                    <div class="icon">
                                                        <img src="{{ asset('FrontendAssets/img/home-3/icon7.svg')}}" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h3>
                                                            Dedicated support
                                                        </h3>
                                                        <p>
                                                            Our team is always available to address your concerns,
                                                            providing quick and effective solution to keep your business
                                                            expert option.
                                                        </p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="choose-us-image fix">
                                            <img data-speed=".8" src="{{ asset('FrontendAssets/img/home-3/choose-us-2.jpg')}}" alt="AI solutions built by Avrio Global">
                                            <div class="grap-shape">
                                                <img src="{{ asset('FrontendAssets/img/home-3/grap.png')}}" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <!-- Testimonial Section Start -->
                     <section class="testimonial-section-about section-padding tp-project-5-2-area bg-cover" >
                        <div class="container">
                            <div class="section-title text-center tp-project-5-2-title">
                                <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                    <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> Our testimonials
                                </span>
                                <h2 class="wa_title_spilt_1">
                                    <span class="style-font">Our Valued Clients Trust Us</span> To <br>
                                    Innovative <span class="testi-iimg"><img class="img-custom-anim-left" src="{{ asset('FrontendAssets/img/home-1/client-info-2.png')}}" alt="img"></span> <span class="style-color">Solutions And <br> Outstanding Results.</span>
                                </h2>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="testimonial-box-style-5 bg-cover" style="background-image: url('{{ asset('FrontendAssets/img/home-1/process-shape.png') }}');">
                                        <div class="quote-icon">
                                            <img src="{{ asset('FrontendAssets/img/home-1/quote.png')}}" alt="img">
                                        </div>
                                        <h3>
                                            “From the outset, we provid expectations and regular updates our progress. You’ll receive comprehensive reports outline. From the outset, we pro expectations and regular updates our progress.
                                        </h3>
                                        <div class="client-info-item">
                                        <div class="client-info">
                                                <h4>Rizwan Bukhari</h4>
                                                <span>BankIslami Pakistan Limited</span>
                                        </div>
                                        <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial-box-style-5 style-2 bg-cover" style="background-image: url('{{ asset('FrontendAssets/img/home-1/process-shape.png') }}');">
                                        <div class="quote-icon">
                                            <img src="{{ asset('FrontendAssets/img/home-1/quote.png')}}" alt="img">
                                        </div>
                                        <h3>
                                            “From the outset, we provid expectations and regular updates our progress. You’ll receive comprehensive reports outline. From the outset, we pro expectations and regular updates our progress.
                                        </h3>
                                        <div class="client-info-item">
                                        <div class="client-info">
                                                <h4>Ahmar Hasan</h4>
                                                <span>EFU Life Assurance Ltd.</span>
                                        </div>
                                        <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="testimonial-box-style-5 style-2 bg-cover" style="background-image: url('{{ asset('FrontendAssets/img/home-1/process-shape.png') }}');">
                                        <div class="quote-icon">
                                            <img src="{{ asset('FrontendAssets/img/home-1/quote.png')}}" alt="img">
                                        </div>
                                        <h3>
                                            “From the outset, we provid expectations and regular updates our progress. You’ll receive comprehensive reports outline. From the outset, we pro expectations and regular updates our progress.
                                        </h3>
                                        <div class="client-info-item">
                                        <div class="client-info">
                                                <h4>Farhan Arif</h4>
                                                <span>Medics Laboratories (Pvt.) Ltd.</span>
                                        </div>
                                        <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial-box-style-5 style-3 bg-cover" style="background-image: url('{{ asset('FrontendAssets/img/home-1/process-shape.png') }}');">
                                        <div class="quote-icon">
                                            <img src="{{ asset('FrontendAssets/img/home-1/quote.png')}}" alt="img">
                                        </div>
                                        <h3>
                                            “From the outset, we provid expectations and regular updates our progress. You’ll receive comprehensive reports outline. From the outset, we pro expectations and regular updates our progress.
                                        </h3>
                                        <div class="client-info-item">
                                        <div class="client-info">
                                                <h4>Daniele Cagnazzo</h4>
                                                <span>Aroundrs</span>
                                        </div>
                                        <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- News Section Start -->
                    <section class="news-section fix section-padding section-bg oit-panel-pin-area">
                        <div class="container">
                            <div class="section-title-area mb-0">
                                <div class="text-items wow fadeInUp" data-wow-delay=".3s">
                                    <p>
                                        See how Avrio Global helps businesses grow with practical software, digital
                                        experiences, and technology solutions.
                                    </p>
                                    <a href="{{ route('blog') }}" class="news-btn">
                                        <span class="text">
                                            <span class="text-default">Explore More <i
                                                    class="fa-regular fa-arrow-up-right"></i></span>
                                            <span class="text-hover">Explore More <i
                                                    class="fa-regular fa-arrow-up-right"></i></span>
                                        </span>
                                    </a>
                                </div>
                                <div class="section-title">
                                    <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                        <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> Our insights
                                    </span>
                                    <h2 class="wa_title_spilt_1">
                                        <span class="style-font">Latest</span> From Avrio
                                    </h2>
                                </div>
                            </div>
                            @forelse($latestBlogs as $blog)
                            <div class="news-box-items oit-panel-pin">
                                <div class="row">
                                    <div class="col-lg-6"><div class="thumb"><img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('FrontendAssets/img/home-1/news-01.jpg') }}" alt="{{ $blog->title }}"><img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('FrontendAssets/img/home-1/news-01.jpg') }}" alt="{{ $blog->title }}"></div></div>
                                    <div class="col-lg-6"><div class="content"><h3 class="title"><a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a></h3><ul><li><div class="client-info"><div class="client-content"><p class="name">Avrio Global</p><p>Software insights</p></div></div></li><li><div class="news-line"></div></li><li><span>{{ $blog->category ?: 'Technology' }}</span><span class="color-2">{{ optional($blog->created_at)->format('M d, Y') }}</span></li></ul></div></div>
                                </div>
                            </div>
                            @empty
                            <div class="news-box-items oit-panel-pin"><div class="row"><div class="col-12"><p>No blog insights published yet.</p></div></div></div>
                            @endforelse
                            {{-- Legacy static news cards retained for reference. --}}
                            @if(false)
                            <div class="news-box-items oit-panel-pin">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="thumb">
                                            <img src="{{ asset('FrontendAssets/img/home-1/news-01.jpg')}}" alt="img">
                                            <img src="{{ asset('FrontendAssets/img/home-1/news-01.jpg')}}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="content">
                                            <h3 class="title">
                                                <a href="news-details.html">Unlocking the future of business how smart
                                                    innovation creates lasting impact</a>
                                            </h3>
                                            <ul>
                                                <li>
                                                    <div class="client-info">
                                                        <div class="client-image">
                                                            <img src="{{ asset('FrontendAssets/img/home-1/news-client-1.png')}}" alt="img">
                                                        </div>
                                                        <div class="client-content">
                                                            <p class="name">Pixelone</p>
                                                            <p>Composed by</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="news-line"></div>
                                                </li>
                                                <li>
                                                    <span>web design</span>
                                                    <span class="color-2">Aug 27, 2026</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="news-box-items oit-panel-pin">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="thumb">
                                            <img src="{{ asset('FrontendAssets/img/home-1/news-02.jpg')}}" alt="img">
                                            <img src="{{ asset('FrontendAssets/img/home-1/news-02.jpg')}}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="content">
                                            <h3 class="title">
                                                <a href="news-details.html">Unlocking the future of business how smart
                                                    innovation creates lasting impact</a>
                                            </h3>
                                            <ul>
                                                <li>
                                                    <div class="client-info">
                                                        <div class="client-image">
                                                            <img src="{{ asset('FrontendAssets/img/home-1/news-client-2.png')}}" alt="img">
                                                        </div>
                                                        <div class="client-content">
                                                            <p class="name">Pixelone</p>
                                                            <p>Composed by</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="news-line"></div>
                                                </li>
                                                <li>
                                                    <span>web design</span>
                                                    <span class="color-2">Aug 27, 2026</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="news-box-items oit-panel-pin">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="thumb">
                                            <img src="{{ asset('FrontendAssets/img/home-1/news-03.jpg')}}" alt="img">
                                            <img src="{{ asset('FrontendAssets/img/home-1/news-03.jpg')}}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="content">
                                            <h3 class="title">
                                                <a href="news-details.html">Unlocking the future of business how smart
                                                    innovation creates lasting impact</a>
                                            </h3>
                                            <ul>
                                                <li>
                                                    <div class="client-info">
                                                        <div class="client-image">
                                                            <img src="{{ asset('FrontendAssets/img/home-1/news-client-3.png')}}" alt="img">
                                                        </div>
                                                        <div class="client-content">
                                                            <p class="name">Pixelone</p>
                                                            <p>Composed by</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="news-line"></div>
                                                </li>
                                                <li>
                                                    <span>web design</span>
                                                    <span class="color-2">Aug 27, 2026</span>
                                                </li>
                                             </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </section>

@endsection

@section('script')

@endsection
