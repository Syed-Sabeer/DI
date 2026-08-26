    <!-- Start Switcher -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="switcher-canvas">
      <div class="offcanvas-header justify-content-between border-bottom-0">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">
          Switcher
        </h5>
        <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon custom-canvas-close" data-bs-dismiss="offcanvas">
          <i class="fe fe-x fs-4 lh-1">
          </i>
        </a>
      </div>
      <div class="offcanvas-body">
        <div class="">
          <p class="switcher-style-head">
            Theme Color Mode:
          </p>
          <div class="row switcher-style">
            <div class="col-5">
              <div class="form-check switch-select">
                <label class="form-check-label" for="switcher-light-theme">
                  Light
                </label>
                <input class="form-check-input form-checked-dark" type="radio" name="theme-style" id="switcher-light-theme" checked>
              </div>
            </div>
            <div class="col-5">
              <div class="form-check switch-select">
                <label class="form-check-label" for="switcher-dark-theme">
                  Dark
                </label>
                <input class="form-check-input form-checked-dark" type="radio" name="theme-style" id="switcher-dark-theme">
              </div>
            </div>
          </div>
        </div>
        <div class="">
          <p class="switcher-style-head">
            Directions:
          </p>
          <div class="row switcher-style">
            <div class="col-5">
              <div class="form-check switch-select">
                <label class="form-check-label" for="switcher-ltr">
                  LTR
                </label>
                <input class="form-check-input form-checked-dark" type="radio" name="direction" id="switcher-ltr" checked>
              </div>
            </div>
            <div class="col-5">
              <div class="form-check switch-select">
                <label class="form-check-label" for="switcher-rtl">
                  RTL
                </label>
                <input class="form-check-input form-checked-dark" type="radio" name="direction" id="switcher-rtl">
              </div>
            </div>
          </div>
        </div>
        <div class="">
          <p class="switcher-style-head">
            Layout Width Styles:
          </p>
          <div class="row switcher-style">
            <div class="col-6 col-xl-5">
              <div class="form-check switch-select">
                <label class="form-check-label" for="switcher-full-width">
                  Full Width
                </label>
                <input class="form-check-input form-checked-dark" type="radio" name="layout-width" id="switcher-full-width" checked>
              </div>
            </div>
            <div class="col-6 col-xl-5">
              <div class="form-check switch-select">
                <label class="form-check-label" for="switcher-boxed">
                  Boxed
                </label>
                <input class="form-check-input form-checked-dark" type="radio" name="layout-width" id="switcher-boxed">
              </div>
            </div>
          </div>
        </div>
        <div class="theme-colors">
          <p class="switcher-style-head">
            Theme Primary:
          </p>
          <div class="d-flex align-items-center switcher-style">
            <div class="form-check switch-select me-3">
              <input class="form-check-input color-input color-primary-1" type="radio" name="theme-primary" id="switcher-primary">
            </div>
            <div class="form-check switch-select me-3">
              <input class="form-check-input color-input color-primary-2" type="radio" name="theme-primary" id="switcher-primary1">
            </div>
            <div class="form-check switch-select me-3">
              <input class="form-check-input color-input color-primary-3" type="radio" name="theme-primary" id="switcher-primary2">
            </div>
            <div class="form-check switch-select me-3">
              <input class="form-check-input color-input color-primary-4" type="radio" name="theme-primary" id="switcher-primary3">
            </div>
            <div class="form-check switch-select me-3">
              <input class="form-check-input color-input color-primary-5" type="radio" name="theme-primary" id="switcher-primary4">
            </div>
            <div class="form-check switch-select me-3 ps-0 mt-1 color-primary-light">
              <div class="theme-container-primary">
              </div>
              <div class="pickr-container-primary">
              </div>
            </div>
          </div>
        </div>
        <div class="theme-colors">
          <p class="switcher-style-head">
            Theme Background:
          </p>
          <div class="d-flex align-items-center switcher-style">
            <div class="form-check switch-select me-3">
              <input class="form-check-input color-input color-bg-1" type="radio" name="theme-background" id="switcher-background" checked>
            </div>
            <div class="form-check switch-select me-3">
              <input class="form-check-input color-input color-bg-2" type="radio" name="theme-background" id="switcher-background1">
            </div>
            <div class="form-check switch-select me-3">
              <input class="form-check-input color-input color-bg-3" type="radio" name="theme-background" id="switcher-background2">
            </div>
            <div class="form-check switch-select me-3">
              <input class="form-check-input color-input color-bg-4" type="radio" name="theme-background" id="switcher-background3">
            </div>
            <div class="form-check switch-select me-3">
              <input class="form-check-input color-input color-bg-5" type="radio" name="theme-background" id="switcher-background4">
            </div>
            <div class="form-check switch-select me-3 ps-0 mt-1 color-bg-transparent">
              <div class="theme-container-background">
              </div>
              <div class="pickr-container-background">
              </div>
            </div>
          </div>
        </div>
        <div class="">
          <p class="switcher-style-head">
            Loader:
          </p>
          <div class="row switcher-style gx-0">
            <div class="col-4">
              <div class="form-check switch-select">
                <label class="form-check-label" for="switcher-loader-enable">
                  Enable
                </label>
                <input class="form-check-input form-checked-dark" type="radio" name="page-loader" id="switcher-loader-enable" checked="">
              </div>
            </div>
            <div class="col-4">
              <div class="form-check switch-select">
                <label class="form-check-label" for="switcher-loader-disable">
                  Disable
                </label>
                <input class="form-check-input form-checked-dark" type="radio" name="page-loader" id="switcher-loader-disable" checked="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between canvas-footer">
        <a href="https://themeforest.net/user/spruko/portfolio" target="_blank" class="btn btn-success">
          Buy Now
        </a>
        <a href="https://themeforest.net/user/spruko/portfolio" target="_blank" role="button" class="btn btn-warning">
          Our Portfolio
        </a>
        <button id="reset-all" class="btn btn-danger">
          Reset
        </button>
      </div>
    </div>
    <!-- End Switcher -->
    <div class="">
      {{-- <a class="cart-icon" href="cart.html">
        <i class="ri-shopping-cart-line">
        </i>
        <span class="cart-badge">
          5
        </span>
      </a> --}}
      <!-- Start Switcher-Icon -->
      {{-- <a aria-label="anchor" class="switcher-icon" data-bs-toggle="offcanvas" href="#switcher-canvas" aria-controls="switcher-canvas">
        <i class="ri-settings-2-line">
        </i>
      </a> --}}
      <!-- End Switcher-Icon -->
    </div>
    <!-- Start loader-Icon -->
    <div class="page-loader">
      <div class="page-loader__wrapper">
        <div class="page-loader__spinner">
        </div>
        <div class="page-loader__brand">
          <img src="{{ asset('FrontendAssets/images/brand/loader.png')}}" alt="Loading">
        </div>
      </div>
    </div>
    <!-- End loader-Icon -->
    <!-- Back-to-top -->
    <a aria-label="anchor" href="#top" id="back-to-top" class="back-to-top rounded-circle shadow all-ease-03 fade-in">
      <i class="fe fe-arrow-up">
      </i>
    </a>
