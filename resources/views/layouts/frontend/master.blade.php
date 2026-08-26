<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-hover" data-theme-mode="light" data-loader="disable" data-menu-position="scrollable">

<head>

    @include('layouts.frontend.meta')
    @include('layouts.frontend.css')
    @yield('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="main-body light-theme">

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
