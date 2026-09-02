<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-hover" data-theme-mode="light"
  data-loader="disable" data-menu-position="scrollable">

<head>
  <!-- Google Tag Manager -->
  <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W2T37667');
  </script>
  <!-- End Google Tag Manager -->



  @include('layouts.frontend.meta')
  @include('layouts.frontend.css')
  @yield('css')

  <!-- RESPONSIVE CSS - mobile / tablet refinements.
         Deliberately the LAST stylesheet in the head so its media-query
         scoped rules win over both the theme and per-page <style> blocks.
         It contains no desktop rules, so laptop/desktop output is unchanged. -->
  <link
    href="{{ asset('FrontendAssets/css/responsive.css') }}?v={{ @filemtime(public_path('FrontendAssets/css/responsive.css')) ?: 1 }}"
    rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="main-body light-theme">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W2T37667" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  @include('layouts.frontend.preheader')
  <div class="page home-page-01">
    @include('layouts.frontend.header')
    <div class="main-content app-content">
      <div class="banner-section section banner-1 banner-1-image3 cover-image">
        <!-- Smooth Scroll Shell -->
        <div id="scroll-shell">
          <div id="scroll-stage">
            <main id="main-area" class="main-area">
              @yield('content')
              @include('layouts.frontend.footer')
            </main>

          </div>
        </div>
      </div>
    </div>
  </div>

  @include('layouts.frontend.postfooter')



  @include('layouts.frontend.script')

  @yield('script')
  @yield('js')

</body>

</html>