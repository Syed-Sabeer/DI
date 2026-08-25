   <div class="page-wrapper">
        <!-- ================= PRELOADER (DISABLED) =================
        <div id="preloader">
            <div class="bracket tl"></div>
            <div class="bracket tr"></div>
            <div class="bracket bl"></div>
            <div class="bracket br"></div>

            <div class="pre-logo">
                AVRIO GLOBAL
                <div class="pre-logo-fill" id="logoFill">AVRIO GLOBAL </div>
            </div>

            <div class="loader-ring">
                <svg viewBox="0 0 72 72">
                    <circle class="ring-track" cx="36" cy="36" r="32" />
                    <circle class="ring-arc a2" cx="36" cy="36" r="32" />
                    <circle class="ring-arc a1" cx="36" cy="36" r="32" />
                </svg>
                <div class="ring-center-dot"></div>
            </div>

            <div class="pre-count">Loading <span id="pct">0</span>%</div>
        </div>
        -->

        <div id="page">
            <header class="header-section header-1" id="sticky-header">
                <div class="header-main">

                    <!-- ===================== DESKTOP NAVBAR ===================== -->
                    <nav class="navbar p-0 navbar-expand-xl d-none d-xl-flex">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img style="width: 200px; height: auto;" src="{{ asset('FrontendAssets/img/white-file/avrio-logo.png')}}" alt="logo">
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <ul class="navbar-nav mx-auto mb-lg-0">

                                <!-- HOME -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                                </li>

                                <!-- ABOUT -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/about') }}">About Us</a>
                                </li>

                                <!-- SERVICES -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/service') }}">Services</a>
                                </li>



                                <!-- BLOG -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                                </li>


                                <!-- CONTACT -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                                </li>

                            </ul>

                            <div class="menu-right-info">
                                {{-- <a href="#" class="main-header__search search-toggler">
                                    <i class="fa-regular fa-magnifying-glass"></i>
                                </a> --}}
                                <div class="sidebar__toggle offcanvas-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>

                        </div>
                    </nav>

                </div>

                <div class="offcanvas-overlay position-fixed top-0 start-0 w-100 h-100"></div>
                <div class="offcanvas-menu position-fixed">
                    <div class="header-top d-flex align-items-center justify-content-between gap-4">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img  src="{{ asset('FrontendAssets/img/white-file/darklogo.png')}}" alt="logo">
                            </a>
                        </div>
                        <button
                            class="offcasvas-close black-bg border-0 text-white d-flex align-items-center justify-content-center rounded-pill">
                            <i class="fa-regular fa-xmark"></i>
                        </button>
                    </div>
                    <span class="action-title">Happy You’re Here</span>
                    <a href="{{ url('/contact') }}" class="news-btn">
                        <span class="text">
                            <span class="text-default">Know more us <i class="fa-regular fa-arrow-up-right"></i></span>
                            <span class="text-hover">Know more us <i class="fa-regular fa-arrow-up-right"></i></span>
                        </span>
                    </a>
                    <div class="offcanvas_gallery d-none d-lg-block">
                        <img class="gallery_img" src="{{ asset('FrontendAssets/img/header/offcanvas1.jpg')}}" alt="gallery">
                        <img class="gallery_img" src="{{ asset('FrontendAssets/img/header/offcanvas2.jpg')}}" alt="gallery">
                        <img class="gallery_img" src="{{ asset('FrontendAssets/img/header/offcanvas3.jpg')}}" alt="gallery">
                        <img class="gallery_img" src="{{ asset('FrontendAssets/img/header/offcanvas4.jpg')}}" alt="gallery">
                    </div>
                    <div class="off-contact-info">
                        <span class="info-title">Contact Info</span>
                        <div class="contact-details">
                            <span class="sub-info">Phone</span>
                            <p>
                                <a href="tel:+15485732018">+1 (548) 573-2018</a>
                            </p>
                        </div>
                        <div class="contact-details">
                            <span class="sub-info">Email</span>
                            <p>
                                <a href="mailto:info@avrioglobal.io">info@avrioglobal.io</a>
                            </p>
                        </div>
                        <div class="contact-details">
                            <span class="sub-info">Location</span>
                            <p>
        349 Beechlawn Drive Waterloo
ON N2L 5L8,
CANADA
                            </p>
                        </div>
                    </div>
                    <div class="social-icon-list">
                        <span class="follow-title">
                            Follow us:
                        </span>
                        <div class="social-icon d-flex align-items-center">
                            <a href="facebook.com"><i class="fab fa-facebook-f"></i></a>
                                <a href="instagram.com"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/company/avrio-global/"><i class="fab fa-linkedin-in"></i></a>
                        </div>

                    </div>
                </div>

                <!-- ===================== MOBILE MENU ===================== -->
                <div class="mobile-menu-area d-block d-xl-none">

                    <div class="container">
                        <div class="mobile-topbar">
                            <div class="d-flex justify-content-between align-items-center">

                                <div class="logo">
                                    <a href="{{ url('/') }}">
                                        <img style="width: 80px; height: auto;" src="{{ asset('FrontendAssets/img/white-file/avrio-logo.png')}}" alt="logo">
                                    </a>
                                </div>

                                <div class="menu-search d-flex align-items-center gap-4">
                                    <a href="#" class="main-header__search search-toggler">
                                        <i class="fa-regular fa-magnifying-glass"></i>
                                    </a>
                                    <div class="bars">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="mobile-menu-overlay"></div>

                    <div class="mobile-menu-main">

                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img style="width: 60px; height: auto;" src="{{ asset('FrontendAssets/img/white-file/avrio-logo.png')}}" alt="logo">
                            </a>
                        </div>

                        <div class="close-mobile-menu">
                            <i class="fas fa-times"></i>
                        </div>

                        <div class="menu-body">
                            <div class="menu-list">
                                <ul class="list-unstyled">

                                   
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ url('/about') }}">About Us</a></li>
                                    <li><a href="{{ url('/service') }}">Services</a></li>
                                    <li><a href="{{ url('/blog') }}">Blogs</a></li>

                                
                                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="off-contact-area">
                            <div class="off-contact-info">
                                <span class="info-title">Contact Info</span>
                                <div class="contact-details">
                                    <span class="sub-info">Phone</span>
                                    <p>
                                        <a href="tel:+15485732018">+1 (548) 573-2018</a>
                                    </p>
                                </div>
                                <div class="contact-details">
                                    <span class="sub-info">Email</span>
                                    <p>
                                        <a href="mailto:info@avrioglobal.io">info@avrioglobal.io</a>
                                    </p>
                                </div>
                                <div class="contact-details">
                                    <span class="sub-info">Location</span>
                                    <p>
                                        Plot No. A-26/1, Block 8, K.A.E.C.H.S,
Karachi - 75460,
PAKISTAN
                                    </p>
                                </div>
                            </div>
                            <div class="social-icon-list">
                                <span class="follow-title">
                                    Follow us:
                                </span>
                                <div class="social-icon d-flex align-items-center">
                                        <a href="facebook.com"><i class="fab fa-facebook-f"></i></a>
                                <a href="instagram.com"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/company/avrio-global/"><i class="fab fa-linkedin-in"></i></a>
                                    
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- ===================== MOBILE MENU END ===================== -->

            </header>

            <!-- Search Start -->
            <div class="search-popup">
                <div class="search-popup__overlay search-toggler"></div>
                <div class="search-popup__content">
                    <form role="search" method="get" class="search-popup__form" action="#">
                        <input type="text" id="search" name="search" placeholder="Search Here...">
                        <button type="submit" aria-label="search submit" class="search-btn">
                            <span><i class="fa-regular fa-magnifying-glass"></i></span>
                        </button>
                    </form>
                </div>
            </div>

            <div id="smooth-wrapper">
                <div id="smooth-content">
