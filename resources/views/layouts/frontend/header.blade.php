<style>
  /* ---------- Theme switcher: smooth crossfade instead of an abrupt swap ----------
     The base theme ships this as a plain circle with display:none/block icon
     swapping, which can't be animated. Overriding to an absolutely-positioned
     opacity + rotate crossfade, plus a softer glow and press feedback, so the
     moon/sun morph into each other instead of flicking on and off. Global,
     since the toggle lives in the shared header on every page. */
  .header-theme-toggle {
      position: relative;
      overflow: hidden;
      width: 2.75rem !important;
      height: 2.75rem !important;
      flex: 0 0 2.75rem !important;
      background: linear-gradient(160deg, #12181f, #0a0e13) !important;
      border: 1px solid color-mix(in srgb, var(--primary-color) 22%, rgba(255, 255, 255, 0.1)) !important;
      box-shadow: 0 8px 18px -10px rgba(0, 0, 0, 0.5), inset 0 0 0 1px rgba(255, 255, 255, 0.03);
      transition: background 0.35s ease, border-color 0.35s ease, box-shadow 0.3s ease, transform 0.2s ease;
  }

  .header-theme-toggle::before {
      content: "";
      position: absolute;
      inset: -35%;
      background: radial-gradient(circle at 30% 30%, color-mix(in srgb, var(--primary-color) 38%, transparent), transparent 62%);
      opacity: 0.5;
      pointer-events: none;
      transition: opacity 0.35s ease, transform 0.6s ease;
  }

  .header-theme-toggle:hover::before {
      opacity: 0.9;
      transform: rotate(35deg);
  }

  .header-theme-toggle:active {
      transform: scale(0.9) !important;
  }

  .header-theme-toggle .header-link-icon {
      position: absolute;
      inset: 0;
      margin: auto;
      display: flex !important;
      align-items: center;
      justify-content: center;
      width: 1.1rem;
      height: 1.1rem;
      font-size: 1.05rem !important;
      transition: opacity 0.45s cubic-bezier(0.22, 1, 0.36, 1), transform 0.5s cubic-bezier(0.22, 1, 0.36, 1);
  }

  .header-theme-toggle .theme-icon-dark {
      opacity: 1;
      transform: rotate(0deg) scale(1);
      color: var(--primary-color) !important;
      fill: var(--primary-color) !important;
  }

  .header-theme-toggle .theme-icon-light {
      opacity: 0;
      transform: rotate(-90deg) scale(0.4);
      color: #ffcf4d !important;
      fill: #ffcf4d !important;
  }

  .header-theme-toggle:hover .theme-icon-dark {
      transform: rotate(15deg) scale(1.08);
  }

  [data-theme-mode=dark] .header-theme-toggle {
      background: linear-gradient(160deg, #1a1a12, #0d0d0a) !important;
      border-color: color-mix(in srgb, #ffcf4d 32%, rgba(255, 255, 255, 0.12)) !important;
  }

  [data-theme-mode=dark] .header-theme-toggle .theme-icon-dark {
      opacity: 0;
      transform: rotate(90deg) scale(0.4);
  }

  [data-theme-mode=dark] .header-theme-toggle .theme-icon-light {
      opacity: 1;
      transform: rotate(0deg) scale(1);
  }

  [data-theme-mode=dark] .header-theme-toggle:hover .theme-icon-light {
      transform: rotate(15deg) scale(1.08);
  }
</style>
 <div class="head_menu_container header_default">
        <header class="main-header" id="stickyHeader">
          <!-- Start::main-brand-header -->
          <div class="main-brand-header d-lg-none">
            <div class="ms-4 me-3 brand-header-container">
              <div>
                <!-- End::header-element -->
                <a href="{{ route('home') }}" class="brand-main">
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
              <a href="{{ route('home') }}" class="brand-main">
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
                      <a href="{{ route('home') }}" class="brand-main">
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
                    <a href="{{ route('service') }}" class="side-menu__item">
                      <span class="side-menu__label">
                        Services
                      </span>
                    </a>
                  </li>
                  <!-- End::slide -->

                       <!-- Start::slide -->
                  <li class="slide d-xl-block d-none">
                    <a href="{{ route('portfolio') }}" class="side-menu__item">
                      <span class="side-menu__label">
                        Portfolio
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
                        <a href="{{ route('contact') }}" class="btn btn-primary-gradient landing-custom-button">
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
