 <!-- Favicon -->
    <link rel="icon" href="{{ asset('FrontendAssets/images/brand/favicon.ico')}}" type="image/x-icon">
    <!-- Choices JS -->
    <script src="{{ asset('FrontendAssets/libs/choices.js/public/assets/scripts/choices.min.js')}}">
    </script>
    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('FrontendAssets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- STYLE CSS -->
    <link href="{{ asset('FrontendAssets/css/styles.css')}}" rel="stylesheet">
    <!-- Typing CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js" integrity="sha512-BdHyGtczsUoFcEma+MfXc71KJLv/cd+sUsUaYYf2mXpfG/PtBjNXsPo78+rxWjscxUYN2Qr2+DbeGGiJx81ifg==" crossorigin="anonymous">
    </script>
    <!-- Simonwep-picker CSS -->
    <link href="{{ asset('FrontendAssets/libs/@simonwep/pickr/themes/classic.min.css')}}" rel="stylesheet">
    <link href="{{ asset('FrontendAssets/libs/@simonwep/pickr/themes/monolith.min.css')}}" rel="stylesheet">
    <link href="{{ asset('FrontendAssets/libs/@simonwep/pickr/themes/nano.min.css')}}" rel="stylesheet">
    <!-- ICONS CSS -->
    <link href="{{ asset('FrontendAssets/css/icons.css')}}" rel="stylesheet">
    <!-- Choices Css -->
    <link rel="stylesheet" href="{{ asset('FrontendAssets/libs/choices.js/public/assets/styles/choices.min.css')}}">
    <link rel="stylesheet" href="{{ asset('FrontendAssets/libs/animate.css/animate.min.css')}}">
    <script>
      if (localStorage.Aexoradarktheme) {
        document.documentElement.setAttribute("data-theme-mode", "dark");
      }

      if (localStorage.Aexorartl) {
        document.documentElement.setAttribute("dir", "rtl");
        document
          .querySelector("#style")
          ?.setAttribute(
            "href",
            "{{ asset('FrontendAssets/libs/bootstrap/css/bootstrap.rtl.min.css')}}"
          );
      }
    </script>
    <!-- Swiper CSS-->
    <link rel="stylesheet" href="{{ asset('FrontendAssets/libs/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{ asset('FrontendAssets/libs/odometer/themes/odometer-theme-default.css')}}">


<link rel="stylesheet" href="{{ asset('AdminAssets/css/vendors/sweetalert2.css') }}">
@yield('css')
