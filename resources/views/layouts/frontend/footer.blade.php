<!-- Footer Section Start -->
<footer class="footer-section-4">
    <div class="section-animation-shape1-1 animation-infinite-test gt-line-shape-animation animation-infinite"
        style="background-image: url('{{ asset('FrontendAssets/img/home-4/footer-line.png') }}');"></div>
    <div class="container">
        <div class="footer-top-wrapper-4">
            <div class="footer-left wow fadeInUp" data-wow-delay=".3s">
                <a href="{{ url('/') }}" class="footer-logo">
                    <img src="{{ asset('FrontendAssets/img/white-file/avrio-logo.png') }}" alt="img">
                </a>
              <p>
    Copyright <span id="currentYear"></span> <b>AVRIO GLOBAL INC.</b> | All Rights Reserved.
</p>

<script>
    document.getElementById("currentYear").textContent = new Date().getFullYear();
</script>
            </div>
            <div class="content">
                <h2 class="title split-title">
                    Join Our Team To Create <br> The <span>Best Digital Solutions.</span>
                </h2>
                <a class="theme-btn-main style-2 wow fadeInUp" data-wow-delay=".3s" href="{{ url('/contact') }}">
                    <span class="theme-btn-arrow-left"> <i class="fa-solid fa-arrow-up-right"></i>
                    </span>
                    <span class="theme-btn">Let’s Talk</span>
                    <span class="theme-btn-arrow-right"> <i class="fa-solid fa-arrow-up-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="footer-widget-wrapper-4">
            <div class="row g-4">
                <div class="col-xl-8 col-lg-5 col-md-8 wow fadeInUp" data-wow-delay=".3s">
                    <div class="footer-content">
                        <div class="contact-details-items">
                            <div class="content">
                                <span>Canada Office</span>
                                <p style="color:#2a2a2a !important; font-size:15px;">
                                    349 Beechlawn Drive Waterloo<br class="d-block"> ON N2L 5L8, <br class="d-block">CANADA
                                </p>
                            </div>
                            <div class="content">
                                <span>Hong Kong Office</span>
                                <p style="color:#2a2a2a !important; font-size:15px;">Unit 1406B, Belgian Bank Building, <br class="d-block"> Nathan Road,
MongKok, Kowloon,<br class="d-block"> HONG KONG</p>
                            </div>

                              <div class="content">
                                <span>Pakistan Office</span>
                                <p style="color:#2a2a2a !important; font-size:15px;">Plot No. A-26/1, Block 8, K.A.E.C.H.S, <br class="d-block">Karachi - 75460,<br class="d-block"> PAKISTAN</p>
                            </div>

                        </div>
                        <div class="footer-newsletter-intro">
                            <span>Avrio newsletter</span>
                            {{-- <h3>Ideas for what you’ll build next.</h3> --}}
                            <p>Monthly software, product, and growth insights — straight to your inbox.</p>
                        </div>
                        <form action="#">
                            <input type="email" placeholder="Enter your email address" aria-label="Email address">
                            <button class="email-btn" type="submit">
                                <i class="fa-solid fa-envelope"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="footer-widget-items">
                        <div class="widget-head">
                            <h3>Contact Us</h3>
                        </div>
                        <div class="footer-contact">
                            <ul>
                                <li>
                                    <a href="tel:+15485732018" style="color:#2a2a2a !important;"><i class="fa-solid fa-phone"></i>
                                        +1 548 573 2018</a>
                                </li>
                                <li>
                                    <a href="mailto:info@avrioglobal.io" style="color:#2a2a2a !important;"><i class="fa-solid fa-envelope"></i>info@avrioglobal.io</a>
                                </li>
                            </ul>
                            <div class="social-icon d-flex align-items-center">
                                <a href="facebook.com"><i class="fab fa-facebook-f"></i></a>
                                <a href="instagram.com"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/company/avrio-global/"><i class="fab fa-linkedin-in"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 ps-xxl-5 col-sm-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="footer-widget-items">
                        <div class="widget-head">
                            <h3>Useful Link</h3>
                        </div>
                        <div class="gt-list-wrap">
                            <ul class="gt-list-area">
                                <li>
                                    <a href="{{ url('/contact') }}">
                                        Contact us
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/about') }}">
                                        Our teams
                                    </a>
                                </li>
                                
                                
                                <li>
                                    <a href="{{ url('/contact') }}">
                                        Feedback
                                    </a>
                                </li>
                                
                            </ul>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>
</div>
</div>



</div>
