<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- This layout was missing a viewport tag, so the sign-in screens rendered
         at a 980px desktop width and had to be pinch-zoomed on a phone. --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sign in')</title>
    @include('layouts.app.css')
    @yield('css')

    <style>
      /* Mobile-only sign-in refinements. iOS zooms the viewport whenever a
         focused field is under 16px, which is what made these screens jump
         about on a phone. Desktop rendering is untouched. */
      @media (max-width: 767.98px) {
        .form-control,
        input[type="text"],
        input[type="email"],
        input[type="password"] {
          font-size: 16px !important;
          min-height: 48px;
        }

        .btn { min-height: 46px; }

        .login-card,
        .login-main { padding-inline: 18px; }
      }
    </style>

</head>

<body>

    {{-- <div class="page-wrapper compact-wrapper" id="pageWrapper"> --}}

    <!-- header area -->
    {{-- @include('admin.layouts.header') --}}
    <!-- header area end -->

     {{-- <div class="page-body-wrapper"> --}}


    <!-- sidebar-popup -->
    {{-- @include('admin.layouts.sidebar') --}}
    <!-- sidebar-popup end -->


     <div class="page-body">
        <!-- Breadcrumb -->
        {{-- @yield('breadcrumbs') --}}
        <!-- / Breadcrumb -->

        @yield('content')
     </div>



    <!-- footer area -->
    {{-- @include('layouts.app.footer') --}}
    <!-- footer area end -->

{{-- </div>
    </div> --}}


    <!-- scroll-top -->
    {{-- <div class="tap-top"><i data-feather="chevrons-up"></i></div> --}}
    <!-- scroll-top end -->


    <!-- js -->
    {{-- @include('layouts.app.script') --}}


      <script src="{{asset('AdminAssets/js/jquery.min.js')}}"></script>
      <script src="{{asset('AdminAssets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('AdminAssets/js/icons/feather-icon/feather.min.js')}}"></script>
      <script src="{{asset('AdminAssets/js/icons/feather-icon/feather-icon.js')}}"></script>
      <script src="{{asset('AdminAssets/js/config.js')}}"></script>
      <script src="{{asset('AdminAssets/js/script.js')}}"></script>
      <script src="{{asset('AdminAssets/js/script1.js')}}"></script>

</body>

</html>
