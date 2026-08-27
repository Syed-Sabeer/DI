 <div class="head_menu_container header_default">
        <header class="main-header" id="stickyHeader">
          <!-- Start::main-brand-header -->
          <div class="main-brand-header d-lg-none">
            <div class="ms-4 me-3 brand-header-container">
              <div>
                <!-- End::header-element -->
                <a href="index.html" class="brand-main">
                  <img src="{{ asset('FrontendAssets/images/brand/logo-white.png')}}" alt="Deveon Inc" class="desktop-logo logo-white">
                  <img src="{{ asset('FrontendAssets/images/brand/logo-dark.png')}}" alt="Deveon Inc" class="desktop-logo logo-dark">
                  <img src="{{ asset('FrontendAssets/images/brand/logo-light.png')}}" alt="Deveon Inc" class="desktop-logo logo-light">
                  <img src="{{ asset('FrontendAssets/images/brand/toggle-dark.png')}}" alt="Deveon Inc" class="mobile-logo mobile-dark">
                  <img src="{{ asset('FrontendAssets/images/brand/logo-color.png')}}" alt="Deveon Inc" class="desktop-logo logo-color">
                  <img src="{{ asset('FrontendAssets/images/brand/toggle-color.png')}}" alt="Deveon Inc" class="mobile-logo mobile-color">
                </a>
              </div>
              <!-- Start::header-element -->
              <div class="d-flex align-items-center gap-1">
                <button type="button" class="header-theme-toggle header-link" aria-label="Switch to dark mode" title="Switch to dark mode">
                  <i class="ri-moon-line header-link-icon theme-icon-dark" aria-hidden="true"></i>
                  <i class="ri-sun-line header-link-icon theme-icon-light" aria-hidden="true"></i>
                </button>
                <div class="header-element me-1">
                  <!-- Start::header-link -->
                  <a aria-label="anchor" href="javascript:void(0);" class="sidemenu-toggle1 header-link" data-bs-toggle="sidebar">
                    <span class="open-toggle">
                      <i class="ri-menu-3-line header-link-icon">
                      </i>
                    </span>
                  </a>
                  <!-- End::header-link -->
                </div>
              </div>
            </div>
          </div>
          <!-- End::main-brand-header -->
        </header>
        <div class="sticky">
          <!-- Start::app-sidebar -->
          <aside class="app-sidebar" id="sidebar">
            <div class="app-toggle-header">
              <a href="index.html" class="brand-main">
                <img src="{{ asset('FrontendAssets/images/brand/logo-white.png')}}" alt="Deveon Inc" class="desktop-logo logo-dark">
                <img src="{{ asset('FrontendAssets/images/brand/logo-dark.png')}}" alt="Deveon Inc" class="desktop-logo logo-color">
              </a>
              <div class="header-element">
                <!-- Start::header-link -->
                <a aria-label="anchor" href="javascript:void(0);" class="sidemenu-toggle header-link" data-bs-toggle="sidebar">
                  <span class="close-toggle">
                    <i class="bi bi-x header-link-icon">
                    </i>
                  </span>
                </a>
                <!-- End::header-link -->
              </div>
              <!-- End::header-element -->
            </div>
            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll">
              <!-- Start::nav -->
              <nav class="main-menu-container nav nav-pills sub-open align-items-center">
                <!-- Start::main-brand-header -->
                <div class="main-brand-header">
                  <div class="container brand-header-container d-none d-lg-flex">
                    <div class="d-flex align-items-center">
                      <!-- Start::header-element -->
                      <div class="header-element me-1">
                        <!-- Start::header-link -->
                        <a aria-label="anchor" href="javascript:void(0);" class="sidemenu-toggle1 header-link" data-bs-toggle="sidebar">
                          <span class="open-toggle">
                            <i class="bi bi-text-indent-left header-link-icon">
                            </i>
                          </span>
                        </a>
                        <!-- End::header-link -->
                      </div>
                      <!-- End::header-element -->
                      <a href="index.html" class="brand-main">
                        <img src="{{ asset('FrontendAssets/images/brand/logo-white.png')}}" alt="Deveon Inc" class="desktop-logo logo-white">
                        <img src="{{ asset('FrontendAssets/images/brand/logo-dark.png')}}" alt="Deveon Inc" class="desktop-logo logo-dark">
                        <img src="{{ asset('FrontendAssets/images/brand/logo-light.png')}}" alt="Deveon Inc" class="desktop-logo logo-light">
                        <img src="{{ asset('FrontendAssets/images/brand/toggle-dark.png')}}" alt="Deveon Inc" class="mobile-logo mobile-dark">
                        <img src="{{ asset('FrontendAssets/images/brand/logo-color.png')}}" alt="Deveon Inc" class="desktop-logo logo-color">
                        <img src="{{ asset('FrontendAssets/images/brand/toggle-color.png')}}" alt="Deveon Inc" class="mobile-logo mobile-color">
                      </a>
                    </div>
                  </div>
                </div>
                <!-- End::main-brand-header -->
                <ul class="main-menu">
     <!-- Start::slide -->
                  <li class="slide d-xl-block d-none">
                    <a href="{{ route('home') }}" class="side-menu__item">
                      <span class="side-menu__label">
                       Home
                      </span>
                    </a>
                  </li>
                  <!-- End::slide -->

                       <!-- Start::slide -->
                  <li class="slide d-xl-block d-none">
                    <a href="{{ route('about') }}" class="side-menu__item">
                      <span class="side-menu__label">
                        About
                      </span>
                    </a>
                  </li>
                  <!-- End::slide -->

                        <!-- Start::slide -->
                  <li class="slide d-xl-block d-none">
                    <a href="{{ route('careers') }}" class="side-menu__item">
                      <span class="side-menu__label">
                        Careers
                      </span>
                    </a>
                  </li>
                  <!-- End::slide -->

                  <!-- Start::slide -->
                  <li class="slide d-xl-block d-none">
                    <a href="{{ route('contact') }}" class="side-menu__item">
                      <span class="side-menu__label">
                        Contact Us
                      </span>
                    </a>
                  </li>
                  <!-- End::slide -->
                </ul>
                <div>
                  <ul class="header-actions list-unstyled d-flex align-items-center mb-0">
                    <li class="d-flex align-items-center">
                      <button type="button" class="header-theme-toggle header-link" aria-label="Switch to dark mode" title="Switch to dark mode">
                        <i class="ri-moon-line header-link-icon theme-icon-dark" aria-hidden="true"></i>
                        <i class="ri-sun-line header-link-icon theme-icon-light" aria-hidden="true"></i>
                      </button>
                    </li>
                    <li class="d-flex align-items-center text-lg-start text-center">
                      <div class="btn-list">
                        <a href="contact-us.html" class="btn btn-primary-gradient landing-custom-button">
                          <span class="btn__text">
                            Get In Touch
                          </span>
                          <span class="btn__icon">
                            <i class="ri-arrow-right-long-line">
                            </i>
                          </span>
                        </a>
                      </div>
                    </li>
                  </ul>
                </div>
              </nav>
              <!-- End::nav -->
            </div>
            <!-- End::main-sidebar -->
          </aside>
          <!-- End::app-sidebar -->
        </div>
      </div>
