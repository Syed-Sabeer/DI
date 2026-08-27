@extends('layouts.frontend.master')




@section('css')

@endsection

@section('content')

    <div class="section-spacer"></div>
            <!-- Hero -->
            <section class="hero pages-banner overflow-hidden">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <div class="hero-banner-content text-center">
                      <h1 class="hero__title text-dark text-center text-animated-slider">
                        Contact Us
                      </h1>
                      <div class="glow-border-container">
                        <ul class="pagebreadcrumb-list">
                          <li class="pagebreadcrumb-item">
                            <a href="javascript:void(0);">Pages</a>
                          </li>
                          <li>
                            <i class="ri-expand-horizontal-s-fill"></i>
                          </li>
                          <li class="active">
                            Contact Us
                          </li>
                        </ul>
                        <div class="glow-border-card">
                          <div class="glow-border-inner"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-image-shape">
                <img src="{{ asset('FrontendAssets/images/shapes/33.png') }}" alt="" class="banner-light">
                <img src="{{ asset('FrontendAssets/images/shapes/7.png') }}" alt="" class="banner-dark d-none">
              </div>
            </section>
            <!-- /Hero -->

            <section class="section team-page-section section-gap">
              <div class="container">
                <div class="row gy-4">
                  <div class="col-xl-6">
                    <div class="heading-section mb-5 text-start">
                      <span class="heading-subtitle rounded-pill border px-3 py-2 d-inline-flex wow fadeInUp"
                        data-wow-delay=".3s">
                        Let’s Collaborate
                      </span>
                      <h2 class="heading-title  split-title">
                        Let’s Build Something Great Togather!
                      </h2>
                    </div>
                    <ul class="contact-cards">
                      <li class="contact-card">
                        <div class="contact-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M29.9433 27.4831L27.9032 29.523L27.8549 29.5532C26.7825 30.225 25.452 30.5619 23.94 30.5619C22.5064 30.5619 20.9107 30.2594 19.2159 29.6544C15.7851 28.4287 12.182 26.0407 9.07006 22.9287C5.95843 19.8168 3.56987 16.2137 2.34487 12.7831C1.10112 9.30061 1.13712 6.23249 2.44593 4.14367L2.47581 4.09567L4.51612 2.05561C4.91412 1.65749 5.44481 1.43811 6.01087 1.43811C6.57668 1.43811 7.10762 1.65749 7.50562 2.05561L12.4034 6.95311C12.8014 7.35123 13.0205 7.88249 13.0205 8.44817C13.0205 9.0143 12.8014 9.54505 12.4034 9.94311L10.4579 11.8887C10.1291 12.5574 10.2008 13.5687 10.6627 14.7475C11.174 16.0531 12.1252 17.4418 13.3412 18.6575C14.5574 19.8737 15.9462 20.825 17.2514 21.3362C18.4305 21.798 19.442 21.8699 20.1106 21.5412L22.0558 19.5955C22.4538 19.1974 22.9854 18.9787 23.5509 18.9787C24.117 18.9787 24.6476 19.1975 25.0456 19.5955L29.9434 24.493C30.7674 25.3174 30.7674 26.6587 29.9433 27.4831Z">
                            </path>
                          </svg>
                        </div>
                        <div class="contact-content">
                          <span class="contact-label">Contact Number</span>
                          <a class="contact-link" href="tel:1234567890">+1 (234) 567-890</a>
                        </div>
                      </li>

                      <li class="contact-card">
                        <div class="contact-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                            <path
                              d="M30.1738 3.70665L25.1605 27C25.0538 27.5066 24.7205 27.9333 24.2538 28.16C23.7872 28.3866 23.2538 28.3866 22.7738 28.16L19.0405 26.3466C19.0405 26.3466 14.2672 29.8 13.2938 30.2533C13.1072 30.3466 13.0272 30.3333 12.8938 30.3333C12.6307 30.334 12.3779 30.2307 12.1906 30.0459C12.0033 29.8611 11.8966 29.6098 11.8938 29.3466V22.2666C11.8805 22.12 11.8938 21.9733 11.9738 21.8266C12.0538 21.68 11.9872 21.8 12.0005 21.7866C12.0405 21.72 12.0805 21.6533 12.1338 21.5866L24.4138 8.14665L9.14716 20.7066C8.98293 20.8748 8.76503 20.9802 8.53125 21.0046C8.29746 21.0289 8.06252 20.9707 7.86716 20.84L2.73382 18.52C2.16049 18.24 1.80049 17.68 1.77382 17.04C1.76049 16.4133 2.09382 15.8266 2.65382 15.52L27.7205 1.87998C28.3072 1.55998 29.0005 1.61332 29.5472 2.01332C30.0805 2.41332 30.3205 3.06665 30.1872 3.70665H30.1738Z">
                            </path>
                          </svg>
                        </div>
                        <div class="contact-content">
                          <span class="contact-label">Email Address</span>
                          <a class="contact-link" href="mailto:info@aexoraexample.com">info@aexoraexample.com</a>
                        </div>
                      </li>
                    </ul>
                    <div class="mb-4 contact-devider">
                    </div>
                    <div>
                      <p>
                        Address: 2750 Maplewood Avenue, San Jose
                      </p>
                      <p>
                        CA 95112, United States
                      </p>
                      <h2 class="mb-2">
                        <a class="text-dark fs-5" href="#"> 12:00 pm GMT+2</a>
                      </h2>
                      <p class="mb-0">
                        <a class="text-dark text-decoration-underline"
                          href="javascript:void(0);">hello@yourcompany.com</a>
                      </p>
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <aside class="aside-panel">
                      <div class="side-card mb-4 side-nav wow fadeInUp" data-wow-delay=".1s">
                        <h2 class="side-title">Get In Touch</h2>
                        <form id="team-contact-form" method="POST">
                          <div class="row gy-3">
                            <div class="col-sm-6">
                              <div class="field">
                                <input type="text" class="form-control" name="conName" id="conName"
                                  placeholder="Full Name*" required>
                              </div>
                            </div>

                            <div class="col-sm-6">
                              <div class="field">
                                <input type="email" class="form-control" name="conEmail" id="conEmail"
                                  placeholder="Email Address*" required>
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="field">
                                <input type="text" class="form-control" name="conSubject" id="conSubject"
                                  placeholder="Subject*" required>
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="field">
                                <input class="form-control" type="text" name="conPhone" placeholder="Subject*" required>
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="field field--message">
                                <textarea class="form-control" rows="5" name="conMessage" id="message"
                                  placeholder="Type message*"></textarea>
                              </div>
                            </div>

                            <div class="col-12">
                              <button type="submit" class="header-button">
                                <span class="resume-icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                      d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                  </svg>
                                </span>
                                <span>Submit Now</span>
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </aside>
                  </div>
                  <div class="col-xl-12">
                    <div class="map-frame wow fadeInUp" data-wow-delay=".3s">
                      <iframe title="Google Map"
                        src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d316440.5712687838!2d-74.01091796224334!3d40.67186885683901!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1745918398047!5m2!1sen!2sbd"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </section>


@endsection

@section('script')

@endsection
