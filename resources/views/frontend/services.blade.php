@extends('layouts.frontend.master')

@section('title', 'IT & Software Development Services | Avrio Global Inc.')
@section('meta_description', 'Explore Avrio Global\'s full range of software development services — mobile app development, web development, AI/ML, fintech, banking, and insurance software, UI/UX design, digital marketing, staff augmentation, and more.')
@section('meta_keywords', 'software development services, it services company, mobile app development, web app development, ai ml development, fintech software development, banking software solutions, insurance software solutions, digital marketing services')

@push('schema')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => url('/service')],
    ],
], JSON_UNESCAPED_SLASHES) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'ItemList',
    'itemListElement' => collect($services)->values()->map(function ($service, $i) {
        return [
            '@type' => 'ListItem',
            'position' => $i + 1,
            'name' => $service['title'],
            'url' => url('/service-detail/'.$service['slug']),
        ];
    })->all(),
], JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush

@section('css')
{{-- <style>
  .service-catalog-grid { --accent: #cf1f42; background:transparent; padding:0; border-radius:0; }
  .service-catalog-heading { max-width: 720px; margin: 0 auto 48px; text-align: center; }
  .service-catalog-heading span { color: var(--accent); font-size: 13px; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; }
  .service-catalog-heading h2 { color: #161616; font-size: clamp(34px, 4vw, 56px); line-height: 1.05; margin: 12px 0 0; }
  .service-catalog-grid .avrio-service-card { min-height:250px; position:relative; overflow:hidden; padding:31px 34px; border:0; border-radius:18px; background:#202020!important; box-shadow:none; transition:transform .35s ease,background .35s ease; }
  .service-catalog-grid .avrio-service-card:after{content:'';position:absolute;inset:0;background:linear-gradient(135deg,transparent 62%,rgba(255,255,255,.05) 62%,rgba(255,255,255,.05) 63%,transparent 63%);pointer-events:none}
  .service-catalog-grid .avrio-service-card:hover { transform:translateY(-7px); background:#cf1f42!important; }
  .avrio-service-card .service-icon{width:58px;height:58px;position:absolute;right:28px;top:27px;border-radius:50%;border:1px solid rgba(255,255,255,.25);color:#fff;display:flex;align-items:center;justify-content:center;font-size:20px;transition:background .25s ease}
  .avrio-service-card .service-number { position:relative; margin:0 0 42px; color:#ff718a!important; font-size:12px; letter-spacing:.14em; font-weight:800; }
  .avrio-service-card .service-content { position:relative; z-index:1; display:flex; flex-direction:column; height:100%; padding-right:58px; }
  .avrio-service-card .title { font-size:28px; line-height:1.08; margin:0 0 14px; max-width:420px; }
  .avrio-service-card .title a { color:#fff!important; transition:opacity .25s ease; }
  .avrio-service-card .title a:hover{opacity:.78}
  .avrio-service-card .service-summary { color:rgba(255,255,255,.74)!important; font-size:14px; line-height:1.7; margin:0 0 20px; max-width:440px; }
  .avrio-service-card .service-link { margin-top:auto; width:auto; height:auto; border-radius:0; display:inline-flex; align-items:center; gap:10px; border:0; color:#fff!important; font-size:13px; font-weight:700; text-transform:uppercase; letter-spacing:.06em; transition:all .25s ease; }
  .avrio-service-card .service-link span { position:absolute; width:1px; height:1px; padding:0; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0; }
  .avrio-service-card:hover .service-number{color:#fff!important}.avrio-service-card:hover .service-icon{background:rgba(255,255,255,.18)}.avrio-service-card:hover .service-link { color:#fff!important; transform:translateX(5px); }
  @media (max-width:575px) { .service-catalog-grid .avrio-service-card { min-height:245px;padding:25px; }.avrio-service-card .service-number { margin-bottom:34px; } }
</style> --}}

@endsection

@section('content')

     <!-- Breadcrumb Section Start -->
                    <div class="breadcrumb-wrapper light-theme-breadcrumb bg-cover" style="background-image: url('{{ asset('FrontendAssets/img/inner-page/bread-line.png') }}');">
                        <div class="light-bg">
                            <img src="{{ asset('FrontendAssets/img/inner-page/light.png')}}" alt="img">
                        </div>
                        <div class="container">
                            <div class="page-heading">
                                <div class="breadcrumb-sub-title">
                                    <h1 class="rr_title_anim"><span>Software Services</span> Built Around Your Business Goals
                                    </h1>
                                </div>
                                <div class="breadcrumb-items">
                                    <ul>
                                        <li>
                                           12+ years of experience
                                        </li>
                                        <li>
                                            (&copy;2020 — {{ date('Y') }})
                                        </li>
                                    </ul>
                                    <h2 class="title wa_title_spilt_1">
                                        Our service
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- About Section Start -->
                    <section class="about-section-2 fix section-padding pt-0">
                        <div class="container">
                            <div class="about-wrapper-2">
                                <div class="about-video-banner mt-0 fix wow fadeInUp" data-wow-delay=".7s">
                                    <img data-speed=".8" src="{{ asset('FrontendAssets/img/home-2/about-video-banner.jpg')}}" alt="img">
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
                            </div>
                            <div class="counter-wrapper section-padding pb-0">
    
                                <div class="counter-box service-box-1 mt-0 wow fadeInUp" data-wow-delay=".2s">
                                    <span class="text">Completed Projects</span>
                                    <h2><span class="count">100</span>+</h2>
                                    <p>
                                        We provide innovative and reliable solutions.
                                    </p>
                                </div>

                                <div class="counter-box service-box-1 mt-0 wow fadeInUp" data-wow-delay=".4s">
                                    <span class="text">Total Team Members</span>
                                    <h2><span class="count">50</span>+</h2>
                                    <p>
                                       We provide innovative and reliable solutions.
                                    </p>
                                </div>

                                <div class="counter-box service-box-1 mt-0 wow fadeInUp" data-wow-delay=".6s">
                                    <span class="text">Success Ratio</span>
                                    <h2><span class="count">99</span>%</h2>
                                    <p>
                                        We provide innovative and reliable solutions.
                                    </p>
                                </div>

                                <div class="counter-box service-box-1 mt-0 wow fadeInUp" data-wow-delay=".8s">
                                    <span class="text">Awards Winning</span>
                                    <h2><span class="count">5</span>+</h2>
                                    <p>
                                       We provide innovative and reliable solutions.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </section>

                    <div class="sec-line-shape">
                        <img src="{{ asset('FrontendAssets/img/home-1/line-shape.png')}}" alt="img">
                    </div>

                    <!-- Service Section Start -->
                    <section class="service-section-2 pt-5 mt-3 section-padding fix">
                        <div class="container">
                            {{-- Replaced card catalog: use the original full-width service panels below. --}}
                            {{-- <div class="service-catalog-heading"><span>What we build</span><h2>Services that move your business forward.</h2></div>
                            <div class="row g-4 service-catalog-grid mb-5">
                            @foreach($services as $service)
                              <div class="col-lg-6"><article class="avrio-service-card"><div class="service-icon"><i class="fa-solid fa-{{ $service['icon'] }}"></i></div><p class="service-number">{{ $service['number'] }} / Service</p><div class="service-content"><h3 class="title"><a href="{{ route('service.detail', $service['slug']) }}">{{ $service['title'] }}</a></h3><p class="service-summary">{{ $service['short'] }}</p><a class="service-link" href="{{ route('service.detail', $service['slug']) }}"><span>Explore {{ $service['title'] }}</span><i class="fa-solid fa-arrow-up-right"></i></a></div></article></div>
                            @endforeach
                            </div> --}}
                            <div class="legacy-service-catalog">
                            <div class="des-portfolio-wrap">
                                @foreach($services as $service)
                                <div class="service-box-items-2 pt-0 des-portfolio-panel">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-content">
                                                <p>{{ $service['number'] }}. / service</p>
                                                <h3 class="title"><a href="{{ route('service.detail', $service['slug']) }}">{{ $service['title'] }}</a></h3>
                                                <div class="service-list">
                                                    <ul>
                                                        <li>
                                                            + strategy & discovery
                                                        </li>
                                                        <li>
                                                            + tailored solution design
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            + expert implementation
                                                        </li>
                                                        <li>
                                                            + continuous support
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-2">
                                                    {{ $service['description'] }}
                                                </h4>
                                                <ul class="list-items">
                                                    <li>
                                                        <a href="{{ route('service.detail', $service['slug']) }}">Discover</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('service.detail', $service['slug']) }}">Build</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('service.detail', $service['slug']) }}">Grow</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-thumb">
                                                <img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }}">
                                                <img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                          
                            </div>
                        </div>
                        </div>
                    </section>

              

                    <!-- Faq Section Start -->
                    <section class="faq-section-2 fix section-padding">
                        <div class="container">
                            <div class="faq-wrapper-2">
                                <div class="row g-4">
                                    <div class="col-xl-4 col-lg-4">
                                        <div class="faq-content">
                                            <div class="section-title mb-0">
                                                <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                                    <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img">Faq
                                                </span>
                                                <h2 class="rr_title_anim">
                                                    <span class="style-font">Frequently</span> Ask Questions
                                                </h2>
                                            </div>   
                                            <p class="text wow fadeInUp" data-wow-delay=".3s">
                                                We are a results-driven IT consulting team helping businesses unlock efficiency.
                                            </p>
                                            <a href="{{ url('/contact') }}" class="news-btn wow fadeInUp" data-wow-delay=".5s">
                                            <span class="text">
                                                <span class="text-default">Contact us  <i class="fa-regular fa-arrow-up-right"></i></span>
                                                <span class="text-hover">Contact us  <i class="fa-regular fa-arrow-up-right"></i></span>
                                            </span>
                                        </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8">
                                        <ul class="accordion-box wow fadeInUp" data-wow-delay=".3s">
                                            <!--Block-->
                                            <li class="accordion block active-block">
                                                <div class="acc-btn active">
                                                   1.  What services does an IT solutions company provide?
                                                    <div class="icon fa-regular fa-plus"></div>
                                                </div>
                                                <div class="acc-content current">
                                                    <div class="content">
                                                        <div class="text">
                                                            IT solution companies offer services like software development, website design, cloud solutions, cybersecurity, IT consulting, network setup, server management, and ongoing technical support. IT solution companies offer services like software development, website design, cloud solutions, cybersecurity.
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <!--Block-->
                                            <li class="accordion block">
                                                <div class="acc-btn active">
                                                   2. Why does my business need IT support?
                                                    <div class="icon fa-regular fa-plus"></div>
                                                </div>
                                                <div class="acc-content">
                                                    <div class="content">
                                                        <div class="text">
                                                           IT solution companies offer services like software development, website design, cloud solutions, cybersecurity, IT consulting, network setup, server management, and ongoing technical support. IT solution companies offer services like software development, website design, cloud solutions, cybersecurity.
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                             <!--Block-->
                                            <li class="accordion block">
                                                <div class="acc-btn active">
                                                   3. How can IT solutions improve my business productivity?
                                                    <div class="icon fa-regular fa-plus"></div>
                                                </div>
                                                <div class="acc-content">
                                                    <div class="content">
                                                        <div class="text">
                                                           IT solution companies offer services like software development, website design, cloud solutions, cybersecurity, IT consulting, network setup, server management, and ongoing technical support. IT solution companies offer services like software development, website design, cloud solutions, cybersecurity.
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <!--Block-->
                                            <li class="accordion block">
                                                <div class="acc-btn active">
                                                   4. What is cloud computing, and how can it help my business?
                                                    <div class="icon fa-regular fa-plus"></div>
                                                </div>
                                                <div class="acc-content">
                                                    <div class="content">
                                                        <div class="text">
                                                            IT solution companies offer services like software development, website design, cloud solutions, cybersecurity, IT consulting, network setup, server management, and ongoing technical support. IT solution companies offer services like software development, website design, cloud solutions, cybersecurity.
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <!--Block-->
                                            <li class="accordion block">
                                                <div class="acc-btn active">
                                                   5. How do you protect my business from cyber threats?
                                                    <div class="icon fa-regular fa-plus"></div>
                                                </div>
                                                <div class="acc-content">
                                                    <div class="content">
                                                        <div class="text">
                                                            IT solution companies offer services like software development, website design, cloud solutions, cybersecurity, IT consulting, network setup, server management, and ongoing technical support. IT solution companies offer services like software development, website design, cloud solutions, cybersecurity.
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="sec-line-shape">
                        <img src="{{ asset('FrontendAssets/img/home-1/line-shape.png')}}" alt="img">
                    </div>

              


@endsection

@section('script')

@endsection
