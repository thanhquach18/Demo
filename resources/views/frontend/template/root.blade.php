<html lang="en" class="nivo-lightbox-notouch">
    <html lang="zxx">
        <head>
          <!-- Required meta tags -->
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <meta http-equiv="X-UA-Compatible" content="ie=edge" />
          <title>News</title>
          <!-- plugin css for this page -->
          
          <link  rel="stylesheet"href="{{ URL::asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}" />
          <link rel="stylesheet" href="{{ URL::asset('assets/vendors/aos/dist/aos.css/aos.css') }}" />
          <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png') }}" />
          <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
          
        </head>
<body>
    @yield('content')
    {{-- @include('frontend.template.footer') --}}
    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
        <i class="lni-chevron-up"></i>
    </a> 

    <!-- Preloader -->
    <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <script src="{{ URL::asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/aos/dist/aos.js/aos.js') }}"></script>
    <script src="{{ URL::asset('./assets/js/demo.js') }}"></script>
    <script src="{{ URL::asset('./assets/js/jquery.easeScroll.js') }}"></script>
    <!-- End custom js for this page-->
  </body>
</html>
    
