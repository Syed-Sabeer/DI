@extends('layouts.frontend.master')

@section('title', 'About Avrio Global | Software Development Company in Ontario, Canada')
@section('meta_description', 'Avrio Global Inc. is a software development company based in Ontario, Canada, building secure, scalable digital products — including fintech, banking, and insurance software — for ambitious businesses since 2020.')
@section('meta_keywords', 'about avrio global, software development company canada, software company ontario, fintech software development company, banking software solutions, insurance software solutions')

@push('schema')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'About', 'item' => url('/about')],
    ],
], JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush

@section('css')

@endsection

@section('content')


              <!-- Breadcrumb Section Start -->
                    <div class="breadcrumb-wrapper light-theme-breadcrumb bg-cover" style="background-image: url('{{ asset('FrontendAssets//img/inner-page/bread-line.png') }}');">
                        <div class="light-bg">
                            <img src="{{ asset('FrontendAssets/img/inner-page/light.png')}}" alt="img">
                        </div>
                        <div class="container">
                            <div class="page-heading">
                                <div class="breadcrumb-sub-title">
                                    <h1 class="about-page-heading-title"><span>Empowering</span> Your Business With Smart Solutions
                                    </h1>
                                </div>
                                <div class="breadcrumb-items">
                                    <ul>
                                        <li>
                                            <span class="about-page-heading-meta">Based in Ontario, Canada</span>
                                        </li>
                                       <li>
    (&copy;2020 — {{ date('Y') }})
</li>
                                    </ul>
                                    <h2 class="title wa_title_spilt_1">
                                        About Avrio
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- About Video Section Start -->
                    <div class="about-video-banner-about-page fix wow fadeInUp" data-wow-delay=".7s">
                        <img data-speed=".8" src="{{ asset('FrontendAssets/img/home-2/about-video-banner.jpg')}}" alt="About Avrio Global software development company">
                        <div class="video-circle">
                                <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-btn ripple video-popup">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                                <div class="text-circle">
                                    <img src="{{ asset('FrontendAssets/img/home-2/video-text.png')}}" alt="img">
                                </div>
                        </div>
                        <div class="incrase-box float-bob-y">
                            <span>Business Increase</span>
                            <p>3X</p>
                        </div>
                    </div>

                    <!-- Work Process Section Start -->
                    <section class="work-process-section-3 fix section-padding">
                        <div class="container">
                            <div class="about-wrapper-2 about-page-style-3">
                                <div class="section-title-area">
                                    <div class="about-info wow fadeInUp" data-wow-delay=".3s">
                                        <img src="{{ asset('FrontendAssets/img/home-2/about-info.png')}}" alt="Avrio Global satisfied members">
                                        <p>
                                            <b>Join 5,000+ </b>
                                            satisfied members
                                        </p>
                                    </div>
                                    <div class="section-title mb-0">
                                        <h2 class="split-title">
                                            <span class="style-font">Avrio Global Inc is a software company based </span> in Ontario, Canada. We build <span class="style-color"> secure digital products for</span> ambitious businesses.
                                        </h2>
                                        <div class="sec-content">
                                            <a class="theme-btn-main style-2 bg-white-style" href="{{ url('/contact') }}">
                                                <span class="theme-btn-arrow-left"> <i class="fa-solid fa-arrow-up-right"></i> </span>
                                                <span class="theme-btn">Get In Touch</span>
                                                <span class="theme-btn-arrow-right"> <i class="fa-solid fa-arrow-up-right"></i> </span>
                                            </a>
                                            <p>
                                                We help ambitious businesses solve complex challenges through thoughtful software and smart digital strategies. Our experienced team delivers secure, scalable products that improve operations, engage customers, and create measurable growth for startups and enterprises.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="work-process-wrapper-3">
                                <div class="line-1">
                                    <img src="{{ asset('FrontendAssets/img/home-3/line.png')}}" alt="img">
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

                    <section class="testimonial-section-about section-padding tp-project-5-2-area bg-cover" style="background-image: url('assets/img/inner-page/testimonial-bg2.jpg');">
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
                 
                    <!-- Why Choose Us Section Start -->
                    <section class="why-choose-us-section-5 fix section-padding">
                        <div class="container">
                            <div class="why-choose-us-wrapper-5">
                                <div class="section-title">
                                    <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                        <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> Why choose us
                                    </span>
                                    <h2 class="rr_title_anim">
                                        <span class="style-font">Transforming Modern Business </span> Ideas Into Innovative Global <br>  Solutions That Inspire Long-Term Success Through <br> Business Collaboration.
                                    </h2>
                                </div>
                                <div class="row g-4">
                                    <div class="col-xl-5 col-lg-6">
                                        <div class="thumb wow fadeInUp" data-wow-delay=".3s">
                                            <img src="{{ asset('FrontendAssets/img/inner-page/choose-us.jpg')}}" alt="Why choose Avrio Global">
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-lg-6">
                                        <div class="choose-us-content">
                                            <p class="text wow fadeInUp" data-wow-delay=".3s">
                                                We help ambitious businesses break barriers with secure software and smart digital strategies. Our engineering team is driven by innovation and fueled by expertise, delivering solutions that improve operations and drive growth. Whether you're a startup or an established business, we bring your vision to life.
                                            </p>
                                            <a class="theme-btn-main style-2 wow fadeInUp" data-wow-delay=".5s" href="{{ url('/contact') }}">
                                                <span class="theme-btn-arrow-left"> <i class="fa-solid fa-arrow-up-right"></i> </span>
                                                <span class="theme-btn">let’s talk</span>
                                                <span class="theme-btn-arrow-right"> <i class="fa-solid fa-arrow-up-right"></i> </span>
                                            </a>
                                            <div class="about-conter-items">
                                            <div class="counter-box wow fadeInUp active" data-wow-delay=".3s">
                                                <span class="sub-text">Corporate</span>
                                                <h2><span class="count">80</span>+</h2>
                                                <p>
                                                    We provide innovative and reliable solutions.
                                                </p>
                                            </div>
                                            <div class="counter-box wow fadeInUp" data-wow-delay=".5s">
                                                <span class="sub-text">Business</span>
                                                <h2><span class="count">100</span>%</h2>
                                                <p>
                                                    We provide innovative and reliable solutions.
                                                </p>
                                            </div>
                                            <div class="about-vide-bg wow fadeInUp" data-wow-delay=".7s">
                                                <img src="{{ asset('FrontendAssets/img/home-2/choose-us-small.jpg')}}" alt="Avrio Global development team">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                     <div class="sec-line-shape">
                        <img src="{{ asset('FrontendAssets/img/home-1/line-shape.png')}}" alt="img">
                    </div>

                    <!-- Team Section Start -->
                    <section class="team-section-5 fix section-padding">
                        <div class="container">
                            <div class="section-title-area">
                                <div class="section-title mb-0">
                                    <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                        <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> Our best teams
                                    </span>
                                    <h2 class="wa_title_spilt_1">
                                        <span class="style-font">Our Creative</span> Minds <br> Behind Our Bold Ideas
                                    </h2>
                                </div>
                                <div class="content wow fadeInUp" data-wow-delay=".3s">
                                    <p>
                                        Meet the software experts who turn complex ideas into reliable digital products.
                                    </p>
                                    <a href="{{ url('/about') }}" class="news-btn">
                                        <span class="text">
                                            <span class="text-default">Join Our Team  <i class="fa-regular fa-arrow-up-right"></i></span>
                                            <span class="text-hover">Join Our Team  <i class="fa-regular fa-arrow-up-right"></i></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="row design-choose-item-wrap">
                                

                                <div class="col-lg-6 col-md-6">
                                    <div class="team-image-items-5 design-choose-item-1">
                                        <img src="{{ asset('FrontendAssets/img/inner-page/Mazhar.png')}}" alt="Mazhar — Avrio Global team">
                                        <img src="{{ asset('FrontendAssets/img/inner-page/Mazhar.png')}}" alt="Mazhar — Avrio Global team">
                                        <div class="team-content">
                                            <div class="content">
                                                 <p>
                                                   Founder & CCO
                                                </p>
                                                <h3 class="title">
                                                    <a >Mazhar Abbas Khan</a>
                                                </h3>
                                                
                                            </div>
                                            <div class="left-items">
                                                <div class="social-icon d-flex align-items-center">
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                    <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                                </div>
                                                <a  class="icon">
                                                    <i class="fa-regular fa-arrow-up-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                                   <div class="col-lg-6 col-md-6">
                                    <div class="team-image-items-5 design-choose-item-2">
                                        <img src="{{ asset('FrontendAssets/img/inner-page/Mutahir.png')}}" alt="Mutahir — Avrio Global team">
                                        <img src="{{ asset('FrontendAssets/img/inner-page/Mutahir.png')}}" alt="Mutahir — Avrio Global team">
                                        <div class="team-content">
                                            <div class="content">
                                               <p>
                                                  Technical Lead - Software Division
                                                </p>
                                                <h3 class="title">
                                                    <a>Mutahir Hussain</a>
                                                </h3>
                                            </div>
                                            <div class="left-items">
                                                <div class="social-icon d-flex align-items-center">
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                    <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                                </div>
                                                <a  class="icon">
                                                    <i class="fa-regular fa-arrow-up-right"></i>
                                                </a>
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
                                     <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> Software
                                </div>
                                <div class="text-4">
                                     <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> Innovation
                                </div>
                                <div class="text-4">
                                     <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> Cloud
                                </div>
                                <div class="text-4">
                                     <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> AI Solutions
                                </div>
                            </div>
                            <div class="marquee-group">
                                <div class="text-4">
                                     <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> Software
                                </div>
                                <div class="text-4">
                                     <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> Innovation
                                </div>
                                <div class="text-4">
                                     <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> Cloud
                                </div>
                                <div class="text-4">
                                     <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> AI Solutions
                                </div>
                            </div>
                            <div class="marquee-group">
                                <div class="text-4">
                                     <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> Software
                                </div>
                                <div class="text-4">
                                     <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> Innovation
                                </div>
                                <div class="text-4">
                                     <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> Cloud
                                </div>
                                <div class="text-4">
                                     <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> AI Solutions
                                </div>
                            </div>
                            <div class="marquee-group">
                                <div class="text-4">
                                    <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> Software
                                </div>
                                <div class="text-4">
                                    <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> Innovation
                                </div>
                                <div class="text-4">
                                    <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> Cloud
                                </div>
                                <div class="text-4">
                                    <img src="{{ asset('FrontendAssets/img/home-3/star.png')}}" alt="img"> AI Solutions
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lets Deal Section Start -->
                    <section class="lets-deal-section fix section-padding fix section-padding">
                        <div class="container">
                            <div class="lets-deal-wrapper">
                                 <div class="section-title text-center mb-0">
                                    <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                        <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> Let’s make a deal
                                    </span>
                                    <h2 class="wa_title_spilt_1">
                                        <span class="style-font">Let's Create The</span> Best Product <br> Experience For Your Next Project
                                    </h2>
                                </div>
                                <a class="theme-btn-main style-2 mt-4 wow fadeInUp" data-wow-delay=".3s" href="{{ url('/contact') }}">
                                    <span class="theme-btn-arrow-left"> <i class="fa-solid fa-arrow-up-right"></i> </span>
                                    <span class="theme-btn">Get In Touch</span>
                                    <span class="theme-btn-arrow-right"> <i class="fa-solid fa-arrow-up-right"></i> </span>
                                </a>
                            </div>
                        </div>
                    </section>

@endsection

@section('script')

@endsection
