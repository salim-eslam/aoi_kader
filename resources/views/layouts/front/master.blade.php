<!DOCTYPE html>
<html lang="ar"  class="no-js">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="Replace_with_your_PAGE_URL" />

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
      href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&amp;display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="{{ URL::asset('assets/slider/css/plugins/swiper.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/slider/css/style.css ')}}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/slider/css/custom.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="icon" type="image/png" href="{{ URL::asset('images/logo/icon.png') }}"/>
    <title>kader</title>
    {!! MetaTag::tag('description') !!}
    {!! MetaTag::tag('image') !!}
    @yield('meta')



     <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400&display=swap" rel="stylesheet">


    <!--modernizr min js here-->
    {{-- <script src="{{ URL::asset('assets/slider/js/vendor/modernizr-3.7.1.min.js')}}"></script> --}}

    <!-- CSS
    ========================= -->
    @if (app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css-rtl/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css-rtl/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css-rtl/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css-rtl/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css-rtl/font.awesome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css-rtl/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css-rtl/elegant-icons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css-rtl/animate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css-rtl/nice-select.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css-rtl/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css-rtl/jquery-ui.min.css') }}">

    <!-- Font awesome -->
    <link href="{{ URL::asset('assets/product_details/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    {{-- <link href="{{ URL::asset('assets/product_details/css/bootstrap.css')}}" rel="stylesheet"> --}}
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/product_details/css/slick.css')}}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/product_details/css/nouislider.css')}}">
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="{{ URL::asset('assets/product_details/css/jquery.fancybox.css')}}" type="text/css" media="screen" />
    <!-- Theme color -->
    <link id="switcher" href="{{ URL::asset('assets/product_details/css/theme-color/default-theme.css')}}" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="{{ URL::asset('assets/product_details/css/style.css')}}" rel="stylesheet">

   {{--  --}}
   {{--  --}}
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css-rtl/style.css') }}">

    @else

    <link rel="stylesheet" href="{{ URL::asset('assets/front/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css/font.awesome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css/elegant-icons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css/animate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css/jquery-ui.min.css') }}">




    <!-- Font awesome -->
    {{-- <link href="{{ URL::asset('assets/product_details/css/font-awesome.css')}}" rel="stylesheet"> --}}
    <!-- Bootstrap -->
    {{-- <link href="{{ URL::asset('assets/product_details/css/bootstrap.css')}}" rel="stylesheet"> --}}
    <!-- slick slider -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/product_details/css/slick.css')}}"> --}}
    <!-- price picker slider -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/product_details/css/nouislider.css')}}"> --}}
    <!-- Fancybox slider -->
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/product_details/css/jquery.fancybox.css')}}" type="text/css" media="screen" /> --}}
    <!-- Theme color -->
    {{-- <link id="switcher" href="{{ URL::asset('assets/product_details/css/theme-color/default-theme.css')}}" rel="stylesheet"> --}}

    <!-- Main style sheet -->
    {{-- <link href="{{ URL::asset('assets/product_details/css/style.css')}}" rel="stylesheet"> --}}

   {{--  --}}

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css/style.css') }}">
    @endif

    <!--modernizr min js here-->

    <!-- Structured Data  -->
    <script type="application/ld+json">
        {
        "@context": "http://schema.org",
        "@type": "WebSite",
        "name": "Replace_with_your_site_title",
        "url": "Replace_with_your_site_URL"
        }
    </script>


</head>

<body>


    @include('includes.front.canvas_menu')

     @include('includes.front.header')
    @yield('content')
    @include('includes.front.footer')

    @yield('scripts')

</body>

<script src="{{ URL::asset('assets/front/js/vendor/jquery-3.4.1.min.js') }}"></script>
<script src="{{ URL::asset('assets/front/js/vendor/popper.js') }}"></script>
<script src="{{ URL::asset('assets/front/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/front/js/swiper-bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/front/js/slick.min.js') }}"></script>
<script src="{{ URL::asset('assets/front/js/wow.min.js') }}"></script>
<script src="{{ URL::asset('assets/front/js/jquery.scrollup.min.js') }}"></script>
<script src="{{ URL::asset('assets/front/js/images-loaded.min.js') }}"></script>
<script src="{{ URL::asset('assets/front/js/jquery.nice-select.js') }}"></script>
<script src="{{ URL::asset('assets/front/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ URL::asset('assets/front/js/mailchimp-ajax.js') }}"></script>
<script src="{{ URL::asset('assets/front/js/jquery.counterup.min.js') }}"></script>
<script src="{{ URL::asset('assets/front/js/jquery-waypoints.js') }}"></script>
<script src="{{ URL::asset('assets/front/js/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('assets/front/js/gallery.js') }}"></script>

<!-- Main JS -->
<script src="{{ URL::asset('assets/front/js/main.js') }}"></script>

  <!-- Js
    ========================= -->
    <script src="{{ URL::asset('assets/slider/js/plugins/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('assets/slider/js/plugins/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ URL::asset('assets/slider/js/plugins/bootstrap-slider.min.js')}}"></script>
    <script src="{{ URL::asset('assets/slider/js/plugins/swiper.min.js')}}"></script>
    <script src="{{ URL::asset('assets/slider/js/plugins/countdown.js')}}"></script>
    <script src="{{ URL::asset('assets/slider/js/theme.js')}}"></script>



{{-- dddddddddddd --}}

<!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="{{ URL::asset('assets/product_details/js/jquery.min.js')}}"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ URL::asset('assets/product_details/js/bootstrap.js')}}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{ URL::asset('assets/product_details/js/slick.js')}}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{ URL::asset('assets/product_details/js/nouislider.js')}}"></script>
   <!-- mixit slider -->
  <script type="text/javascript" src="{{ URL::asset('assets/product_details/js/jquery.mixitup.js')}}"></script>
  <!-- Add fancyBox -->
  <script type="text/javascript" src="{{ URL::asset('assets/product_details/js/jquery.fancybox.pack.js')}}"></script>
  <!-- Custom js -->
  <script src="{{ URL::asset('assets/product_details/js/custom.js')}}"></script>



</html>
