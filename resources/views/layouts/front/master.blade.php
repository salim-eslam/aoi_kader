<!DOCTYPE html>
<html lang="ar"  class="no-js">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="Replace_with_your_PAGE_URL" />

    <link rel="stylesheet" href="{{ URL::asset('assets/slider/css/plugins/swiper.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/slider/css/style.css ')}}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/slider/css/custom.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="icon" type="image/png" href="{{ URL::asset('images/logo/icon.png') }}"/>
    <title>{{ MetaTag::get('title') }}</title>
    {!! MetaTag::tag('description') !!}
    {!! MetaTag::tag('image') !!}
    @yield('meta')


{{--
    <link rel="icon" href="https://hasthemes.com/wp-content/uploads/2019/04/cropped-favicon-32x32.png"
        sizes="32x32" />
    <link rel="icon" href="https://hasthemes.com/wp-content/uploads/2019/04/cropped-favicon-192x192.png"
        sizes="192x192" />
    <link rel="apple-touch-icon" href="https://hasthemes.com/wp-content/uploads/2019/04/cropped-favicon-180x180.png" /> --}}

     <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400&display=swap" rel="stylesheet">

    {{-- <meta name="msapplication-TileImage"
        content="https://hasthemes.com/wp-content/uploads/2019/04/cropped-favicon-270x270.png" /> --}}

    <!-- CSS
    ========================= -->
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/slider/css/vendor/bootstrap.min.css')}}"> --}}


    <!-- Main Style CSS -->
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/slider/css/style.css')}}"> --}}

    <!--modernizr min js here-->
    <script src="{{ URL::asset('assets/slider/js/vendor/modernizr-3.7.1.min.js')}}"></script>

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
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/slider/css/main.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/slider/css/custom.css')}}"> --}}

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/front/css/style.css') }}">
    @endif

    <!--modernizr min js here-->
    {{-- <script src="{{ URL::asset('assets/js/vendor/modernizr-3.7.1.min.js') }}"></script> --}}

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


        <!-- Vendor JS-->
        {{-- <script src="{{ URL::asset('assets/slider/js/vendor/modernizr-3.6.0.min.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/vendor/jquery-3.6.0.min.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/vendor/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/slick.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/jquery.syotimer.min.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/wow.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/jquery-ui.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/perfect-scrollbar.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/magnific-popup.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/select2.min.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/waypoints.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/counterup.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/jquery.countdown.min.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/images-loaded.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/isotope.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/scrollup.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/jquery.vticker-min.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/jquery.theia.sticky.js')}}"></script>
        <script src="{{ URL::asset('assets/slider/js/plugins/jquery.elevatezoom.js')}}"></script> --}}


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


{{-- ffffffffffffffffffff --}}


  <!-- Js
    ========================= -->


    <script src="{{ URL::asset('assets/slider/js/plugins/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('assets/slider/js/plugins/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ URL::asset('assets/slider/js/plugins/bootstrap-slider.min.js')}}"></script>
    <script src="{{ URL::asset('assets/slider/js/plugins/swiper.min.js')}}"></script>
    <script src="{{ URL::asset('assets/slider/js/plugins/countdown.js')}}"></script>
    <script src="{{ URL::asset('assets/slider/js/theme.js')}}"></script>

<!-- Template  JS -->
{{-- <script src="{{ URL::asset('assets/slider/js/main.js?v=3.3')}}"></script> --}}
{{-- <script src="{{ URL::asset('assets/slider/js/shop.js?v=3.3')}}"></script> --}}

</html>
