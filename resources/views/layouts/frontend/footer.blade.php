<style>
  .footer-career-link{display:inline-flex!important;align-items:center;gap:9px;flex-wrap:wrap}
  .footer-career-badge{display:inline-flex;align-items:center;justify-content:center;min-height:22px;padding:3px 8px;border-radius:5px;background:linear-gradient(to right, var(--primary-color) 0%, rgb(var(--secondary-rgb)) 100%);color:black;font-size:11px;font-weight:bold;line-height:1;letter-spacing:.01em;box-shadow:0 5px 14px rgba(103,70,245,.28);white-space:nowrap}
</style>
<!-- Start::footer -->
                <div class="cta-section-3">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-lg-6">
                        <div class="cta-info">
                          <ul class="cta-contact-list">
                            <li class="cta-item">
                              <a href="tel:+19055148474" class="cta-link">
                                <i class="ri-phone-line">
                                </i>
                                <span class="cta-text">
                                  +1 (905) 514-8474
                                </span>
                              </a>
                            </li>
                            <li class="cta-item">
                              <a href="mailto:info@deveoninc.com" class="cta-link">
                                <i class="ri-mail-send-line">
                                </i>
                                <span class="cta-text">
                                  info@deveoninc.com
                                </span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-6 d-lg-block d-none">
                        <div class="cta-info">
                          <ul class="cta-contact-list cta-list-style2">
                            <li class="cta-item">
                              <span class="work-title">
                                Let's Build Something Great
                              </span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <footer class="footer-section">
                  <div class="container">
                    <div class="footer-inner">
                      <!-- Footer Logo + Description + Social -->
                      <div class="footer-column footer-about">
                        <div class="footer-logo">
                          <a href="{{ route('contact') }}" class="logo-link">
                            <img src="{{ asset('FrontendAssets/images/brand/logo-white.png')}}" alt="Deveon Inc Logo">
                          </a>
                        </div>
                        <p class="footer-desc">
                          We help startups and enterprises build software, apps, and digital experiences that scale.
                        </p>
                        <div class="footer-social">
                          <h3 class="social-title">
                            Follow us
                          </h3>
                          <ul class="social-links">
                            <li>
                              <a href="javascript:void(0);" class="social-link">
                                <i class="ri-facebook-circle-fill">
                                </i>
                              </a>
                            </li>
                            <li>
                              <a href="javascript:void(0);" class="social-link">
                                <i class="ri-instagram-fill">
                                </i>
                              </a>
                            </li>
                            <li>
                              <a href="javascript:void(0);" class="social-link">
                                <i class="ri-twitter-x-line">
                                </i>
                              </a>
                            </li>
                            <li>
                              <a href="javascript:void(0);" class="social-link">
                                <i class="ri-linkedin-box-fill">
                                </i>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <!-- Footer Resources Menu -->
                      <div class="footer-column footer-menu">
                        <h3 class="footer-title">
                          Resources
                        </h3>
                        <ul class="menu-list">
                          <li>
                            <a href="{{ route('contact') }}">
                              Contact us
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('about') }}">
                              About Us
                            </a>
                          </li>
                          
                          <li>
                            <a href="{{ route('careers') }}" class="footer-career-link">
                              Careers
                              @if($activeCareerCount > 0)
                                <span class="footer-career-badge">{{ $activeCareerCount }} {{ \Illuminate\Support\Str::plural('job', $activeCareerCount) }}</span>
                              @endif
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('about') }}">
                              Team
                            </a>
                          </li>
                          {{-- <li>
                            <a href="{{ route('blog') }}">
                              Blog & News
                            </a>
                          </li> --}}
                        </ul>
                      </div>
                      <!-- Footer Services Menu -->
                      <div class="footer-column footer-services">
                        <h3 class="footer-title">
                          Quick Links
                        </h3>
                        <ul class="menu-list">
                          {{-- <li>
                            <a href="javascript:void(0);">
                              How It Works
                            </a>
                          </li> --}}
                          <li>
                            <a href="{{ route('careers') }}">
                             Join Our Team
                            </a>
                          </li>
                          {{-- <li>
                            <a href="javascript:void(0);">
                              Pricing Plans
                            </a>
                          </li> --}}
                          <li>
                            <a href="{{ route('service') }}">
                              Services We Offer
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('portfolio') }}">
                              Our Recent Work
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('blog') }}">
                              Our Blog & News
                            </a>
                          </li>
                        </ul>
                      </div>
                      <!-- Newsletter Subscription -->
                      <div class="footer-column footer-newsletter mb-0">
                        <h3 class="newsletter-title">
                          Subscribe to our newsletter
                        </h3>
                        <form class="newsletter-form mb-5" id="footer-newsletter-form" method="POST" action="{{ route('newsletter.subscribe') }}" novalidate>
                          @csrf
                          <label class="visually-hidden" for="footer-newsletter-email">Email address</label>
                          <input type="email" name="email" id="footer-newsletter-email" class="newsletter-input" placeholder="Enter email" autocomplete="email" required>
                          <button type="submit" class="btn newsletter-btn" data-newsletter-submit aria-label="Subscribe to newsletter">
                            <i class="ri-send-plane-2-line" data-newsletter-icon></i>
                          </button>
                        </form>
                        <h3 class="footer-title mb-3">
                          Availability
                        </h3>
                        <p class="text-fixed-white op-7">
                          Remote-first, serving clients
                          <br>
                          across North America & worldwide
                        </p>
                      </div>
                    </div>
                  </div>
                </footer>
                <div class="footer-bottom">
                  <div class="container">
                    <div class="footer-bottom-inner">
                      <!-- Copyright Text -->
                      <div class="footer-bottom-item">
                        <p class="copyright-text">
                          Copyright © 2026
                          <a href="{{ route('home') }}">
                            Deveon Inc
                          </a>
                          All rights reserved.
                        </p>
                      </div>
                      <!-- Footer Bottom Menu -->
                      <div class="footer-bottom-item">
                        <ul class="footer-bottom-menu">
                          <li>
                            <a href="{{ route('privacy') }}">
                              Policy &amp; Privacy
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('terms') }}">
                              Terms &amp; Conditions
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('legal') }}">
                              Legal
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End::footer -->
<style>
  #footer-newsletter-form .newsletter-btn:disabled { cursor: wait; opacity: .72; }
  #footer-newsletter-form .newsletter-spinner { animation: newsletter-spin .75s linear infinite; }
  #footer-newsletter-form .newsletter-input.is-invalid { border-color: #ff5b5b !important; box-shadow: 0 0 0 3px rgba(255,91,91,.12); }
  .newsletter-swal-popup { border: 1px solid rgba(184,233,0,.32); border-radius: 18px; }
  .newsletter-swal-confirm { border-radius: 8px !important; padding: .75rem 1.5rem !important; color: #080b09 !important; font-weight: 700 !important; }
  @keyframes newsletter-spin { to { transform: rotate(360deg); } }
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('footer-newsletter-form');
  if (!form) return;
  const button = form.querySelector('[data-newsletter-submit]');
  const icon = form.querySelector('[data-newsletter-icon]');
  const email = form.querySelector('[name="email"]');

  const swalTheme = () => {
    const dark = document.documentElement.getAttribute('data-theme-mode') === 'dark';
    return {
      background: dark ? '#101311' : '#ffffff',
      color: dark ? '#f5f7f5' : '#161816',
      confirmButtonColor: '#b8e900',
      customClass: { popup: 'newsletter-swal-popup', confirmButton: 'newsletter-swal-confirm' }
    };
  };

  const loading = state => {
    button.disabled = state;
    email.readOnly = state;
    icon.className = state ? 'ri-loader-4-line newsletter-spinner' : 'ri-send-plane-2-line';
    button.setAttribute('aria-label', state ? 'Subscribing, please wait' : 'Subscribe to newsletter');
  };

  form.addEventListener('submit', async function (event) {
    event.preventDefault();
    email.classList.remove('is-invalid');
    if (!form.checkValidity()) { email.classList.add('is-invalid'); form.reportValidity(); return; }
    loading(true);

    try {
      const response = await fetch(form.action, {
        method: 'POST',
        headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
        body: new FormData(form)
      });
      const data = await response.json().catch(() => ({}));
      if (!response.ok) {
        email.classList.add('is-invalid');
        const throttled = response.status === 429;
        await Swal.fire({ ...swalTheme(), icon: throttled ? 'warning' : (data.icon || 'error'), title: throttled ? 'Please slow down' : (data.title || 'Unable to subscribe'), text: throttled ? 'Too many attempts were made. Please wait one minute and try again.' : (data.message || 'Please enter a valid email address.'), confirmButtonText: 'Got it' });
        return;
      }
      form.reset();
      await Swal.fire({ ...swalTheme(), icon: data.icon || 'success', title: data.title, text: data.message, confirmButtonText: 'Done', timer: 6000, timerProgressBar: true });
    } catch (error) {
      await Swal.fire({ ...swalTheme(), icon: 'error', title: 'Connection problem', text: 'We could not reach the server. Please check your connection and try again.', confirmButtonText: 'Try again' });
    } finally {
      loading(false);
    }
  });
});
</script>
